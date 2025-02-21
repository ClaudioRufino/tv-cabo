<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Divida;
use App\Models\Ficha_Contrato;
use App\Models\Multa;
use App\Models\Sistema;
use App\Models\Notificacao;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;
use PhpParser\ErrorHandler\Collecting;
use Sabberworm\CSS\Value\Size;

use function Laravel\Prompts\alert;
use function PHPUnit\Framework\isEmpty;

use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $total_clientes_pagos = DB::table('pagamentos as p')
        ->select(DB::raw('count(p.cliente_id) as clientes_pago'))
        ->where('p.mes', '=', (int) date('m'))
        ->where('p.ano', (int) date('Y'))
        ->get();

        $mes_atual = (int)date('m');
        for ($i=1; $i <= 12; $i++) { 
            if($i > $mes_atual){
                $inscritos[$i-1] = 0;
                $total_inscritos[$i-1] = 0;
            }
            else{
                $inscritos[$i-1] = $this->inscritos_no_mes($i);
                $total_inscritos[$i-1] = $this->total_inscritos_no_mes($i);
            }
        }

        $mensalidade = DB::table('clientes as c')
        ->select(DB::raw('sum(p.valor) as total'))
        ->join('pagamentos as p', 'c.id', '=', 'p.cliente_id')
        ->where('c.estado', 1)
        ->where('p.mes', '=', (int) date('m'))
        ->where('p.ano', '=', (int) date('Y'))
        ->get()[0];

        if(is_null($mensalidade->total)){
            $mensalidade = 0;
        }
        else{
            $mensalidade = $mensalidade->total;
        }

        $clientes = (Object)[
            'total' => Cliente::count()?:1, Cliente::count(),
            'mensalidade' => $mensalidade,
            'inscritos_no_mes'=> $inscritos,
            'total_multas' => Multa::count(),
            'total_pedidos' => Pedido::count(),
            'total_inscritos'=>  $total_inscritos,
            'total_clientes_pagos' => $total_clientes_pagos[0]->clientes_pago,
        ];

        /* Atribuição de dívidas mensais - Todos os meses, no dia 1, o sistema deve atribuir dívida relativo
        ao mes corrente, com excepção dos clientes que pagaram meses adiantados. Daí, as dívidas poderão ser
        quitadas, quando os clientes realizarem o pagamento do mes em curso */

        // Assegura que se entra uma vez na atribuição da dívida
        $dividas = Divida::all()->where('mes', (int) date('m'))->where('ano', (int) date('Y')); 
        if($dividas->isEmpty()){
            $this->atribuirDivida();
        }

        /* Atribuição de multa diária por causa do atraso de pagamento */
        $dia_atual =  date('d');
        $mes_atual =  date('m');
        $ano_atual =  date('Y');

        $hoje = $ano_atual . "-" . $mes_atual . "-" . $dia_atual;

        $dia_atual = (int) $dia_atual;
        $mes_atual = (int) $mes_atual;
        $ano_atual = (int) $ano_atual;
        
        $hoje = date($hoje) ;

        $multas = Multa::all()->where('data_emissao', $hoje); // Assegura que se entra uma vez na atribuição da multa
        if($multas->isEmpty()){
            $this->atribuirMulta($dia_atual, $mes_atual, $ano_atual);
        }

        /*Cadastrar as notificações de forma automatica com base aos clientes que tem que pagar hoje */

        $notificacao = Notificacao::all()->where('data', $hoje); // Assegura que se entra uma vez no cadastro de notificação
        if($notificacao->isEmpty()){
            $this->cadastrarNotificacao();
        }

        return view('home', compact('clientes'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return "Destroy";
    }

    public function inscritos_no_mes(int $mes):int
    {
        $total = Ficha_Contrato::whereMonth('data_contrato', $mes)->whereYear('data_contrato', date('Y'))->count('id');
        return $total;
    }

    public function total_inscritos_no_mes(int $mes):int
    {
        $total = DB::table('clientes as c')
        ->select(DB::raw('count(c.id) as total'))
        ->join('ficha__contratos as f', 'c.id', '=', 'f.id')
        ->whereYear('f.data_contrato', '<=', date('Y'))
        ->whereMonth('f.data_contrato' , '<=', $mes)
        ->get();
        return $total[0]->total;
    }

    public function atribuirDivida(){
        
        $dia_atual = (int) date('d');
        if($dia_atual == 1){
            /* Pega todos os clientes activos */
            $clientes = Cliente::all()->where('estado', '1');

            /* Percorre todos os clientes activos  */
            foreach ($clientes as $cliente) {
                    $pagamento = DB::table('pagamentos')->select('valor')
                    ->where('cliente_id', $cliente->id)
                    ->where('ano', (int)date('Y'))
                    ->where('mes' , (int)date('m'))
                    ->get();

                /* Verificar se o cliente já pagou o mes em curso. No caso de ter pago, simplesmente não 
                   atribuir dívida*/

                if($pagamento->isEmpty()){ // Caso em que o cliente não pagou
                    Divida::create(
                        [
                        'ano'=>(int) date('Y'),
                        'mes' => (int) date('m'),
                        'valor' => 2000,
                        'estado'=> 1,
                        'cliente_id' => $cliente->id,
                    ]);
                }
                
            }
        }
    }

    public function atribuirMulta($dia, $mes, $ano){
        
        $dia_pagamento = $dia - 11; // Pegar todos os clientes que devem pagar nesse dia.

        if($mes == 1){
            $total_dias_do_mes = cal_days_in_month(CAL_GREGORIAN, 12, ($ano-1)); 
        }
        else{
            $total_dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes-1, $ano); // Total de dias do mes
        }
        
        // Criar uma variavel para determinar a verificação dos pedidos quanto ao mes.
        $pedidos_meses = 1;

        if($dia_pagamento < 0){
            $dia_pagamento = $dia;
            $cont = 0;
            while($cont <= 11){
                if($dia_pagamento > 0){
                    $dia_pagamento--;
                }
                else{
                    $dia_pagamento = $total_dias_do_mes;
                }
                $cont++;
            }
            $pedidos_meses = 2;
        }

        $clientes_a_pagarem = $this->busca_clientes($dia_pagamento);

        if( count($clientes_a_pagarem) != 0){

            for ($i = 0; $i < count($clientes_a_pagarem); $i++) { 
                $cliente = $clientes_a_pagarem[$i];
                $pagamento = $this->Verificar_Pagamento($cliente);
                $pedido = $this->verifica_Pedido($cliente, $pedidos_meses);

                if(!$pagamento && !$pedido){
                    $this->multa($cliente);
                }
            }
            
        }
        
    }

    public function busca_clientes($dia_pagamento){
        $clientes = DB::table('ficha__contratos as f')
        ->join('clientes as c', 'c.id', '=', 'f.cliente_id')
        ->select(DB::raw('cliente_id'))
        ->where('f.dia_pagamento', $dia_pagamento)
        ->where('c.estado', 1)
        ->get();

        return $clientes;
    }

    public function Verificar_Pagamento($cliente):bool
    {
        $cliente = DB::table('pagamentos as p')
        ->select(DB::raw('*'))
        ->where('p.cliente_id', $cliente->cliente_id)
        ->where('p.mes', (int)date('m'))
        ->where('ano', (int) date('Y'))
        ->get();

        return count($cliente) != 0;
        
    }

    public function verifica_Pedido($cliente, $numMeses){

        if($numMeses == 1){
            $pedido = DB::table('pedidos as p')
            ->select(DB::raw('*'))
            ->where('p.cliente_id', $cliente->cliente_id)
            ->where('p.mes', (int)date('m'))
            ->where('p.ano', (int) date('Y'))
            ->get();

            return count($pedido) != 0;
        }
        else{
                $pedido1 = DB::table('pedidos as p')
                ->select(DB::raw('*'))
                ->where('p.cliente_id', $cliente->cliente_id)
                ->where('p.mes', (int)date('m'))
                ->where('p.ano', (int) date('Y'))
                ->get();

                $pedido2 = DB::table('pedidos as p')
                ->select(DB::raw('*'))
                ->where('p.cliente_id', $cliente->cliente_id)
                ->where('p.mes', (int)date('m')-1)
                ->where('p.ano', (int) date('Y'))
                ->get();

                return count($pedido1) != 0 || count($pedido2) != 0;
        }
        
    }

    public function multa($cliente){

        //Cadastramento multa automaticamente
        $cliente = Multa::create([
            'valor'=> 500,
            'estado' => 1,
            'descricao' => "Excedeu 10 dias do dia do pagamento!",
            'data_emissao' => date('Y-m-d'),
            'cliente_id' => $cliente->cliente_id
        ]);
    }

    public function cadastrarNotificacao(){

        $dia_atual = (int) date('d');
        $clientes_a_pagarem = $this->busca_clientes($dia_atual); /* Busca todos os clientes cujo pagamento acontece hoje */

        /* Verifique se há clientes a serem pagos e consequentemente serem notificados também */
        if(count($clientes_a_pagarem) > 0){

            for ($i=0; $i < count($clientes_a_pagarem); $i++) { 
                
                $clienteNovo = $this->cadastradoHoje($clientes_a_pagarem[$i]);

                if($clienteNovo){
                    Notificacao::create([
                        'data'=> date('Y-m-d'),
                        'estado' => 1,
                        'assunto' => 'cliente',
                        'descricao' => 'Dia do pagamento do cliente',
                        'cliente_id' => $clientes_a_pagarem[$i]->cliente_id
                    ]);
                }

            }
        }
    }

    public function definicao(){
        $sistema = Sistema::find(1)->first();

        $sistema = (Object)[
            'multa' => $sistema->multa? "Sim" : "Não definido",
            'mensalidade' => $sistema->mensalidade? "Sim" : "Não definido",
            'ativos' => $sistema->ativos? "Sim" : "Não definido",
            'inativos' => $sistema->inativos? "Sim" : "Não definido",
            'descricao' => $sistema->descricao? "Sim" : "Não definido",
        ];
        return view('definicao', compact('sistema'));
    }

    public function cadastradoHoje($cliente){

        
        $ficha = DB::table('ficha__contratos as f')
        ->select(DB::raw('f.data_contrato'))
        ->where('f.cliente_id', $cliente->cliente_id)
        ->first();

        $data_contrato = $ficha->data_contrato;

        $dataCarbon = Carbon::parse($data_contrato);

        $mesCadastro = $dataCarbon->format('m');
        $anoCadastro = $dataCarbon->format('Y');
        if($mesCadastro == date('m') && $anoCadastro == date('Y')){
            return false;
        }
        else{
                return true;
        }
    }

    public function faqs(){
        return view('faqs');
    }
}
