<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Linha;
use App\Models\Pagamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class ClienteAPIController extends Controller
{
    // Listagem dos clientes
    public function index()
    {
        $clientes = Cliente::where('estado', '1');
        return response()->json($clientes);
    }

    public function page(int $numPagina){

        $clientes = Cliente::where('estado', '1')->get();
        $totalClientes = $clientes->count();
        $grupos = $totalClientes / 10;
        
        $indice = $numPagina;
        if($indice <= $grupos){
            switch($indice){
                case 1:
                    $grupo = [];
                    for($i = 0; $i <= 9; $i++){
                        array_push($grupo, $clientes[$i]);
                    }
                break;
                case 2:
                    $grupo = [];
                    for($i = 0; $i <= 9; $i++){
                        array_push($grupo, $clientes[$i]); 
                    }
                break;
                case 3:
                    $grupo = [];
                    for($i = 10; $i < 13; $i++){
                        array_push($grupo, $clientes[$i]);
                    }
                break;
                case 4:
                    $grupo = array();
                    for($i = 30; $i < 39; $i++){
                        $grupo = $clientes[$i]; 
                    }
                break;
                case 5:
                    $grupo = array();
                    for($i = 40; $i < 49; $i++){
                        $grupo = $clientes[$i]; 
                    }
                break;
                case 6:
                    $grupo = array();
                    for($i = 50; $i < 59; $i++){
                        $grupo = $clientes[$i]; 
                    }
                break;
            }
        }
        else{
            $resto = $totalClientes % 10;
            $i = ($clientes->count()-1);
            $grupo = [];
            while($resto >= 0){
                array_push($grupo, $clientes[$i]); 
                $i--;
                $resto--;
            }
        }
    
        return response()->json($grupo);
        // return response()->json($num);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cadastramento de clientes 
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dados = json_decode($request->getContent(), true);

        try {
            Cliente::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => Hash::make($dados['password']),
                'telefone' => $dados['telefone'],
                'curso' => $dados['curso'],
                'data_nascimento' => $dados['data_nascimento'],
                'bi' => $dados['bi'],
                'sexo' => $dados['sexo'],
                'nacionalidade' => $dados['nacionalidade'],
                'qualidades' => $dados['qualidades'],
                'exame_id' => 1
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }

        return response()->json(['mensagem' => 'Dados enviado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cliente = Cliente::find($id); 

        if($cliente){  // Verifique a existência do cliente
            
            $activo =  Cliente::all()->where('id', $id)->where('estado', 1); // Verifique cliente activo
            if(sizeof($activo) != 0 ){
                return response()->json(['existe'=>1]);
            }
            else{
                return response()->json(['existe'=>0]);
            }
        }
    
        return response()->json(['existe'=>2]); // O valor real é 2
        
    }

    public function showInativo(int $id)
    {
        $cliente = Cliente::find($id); 

        if($cliente){  // Verifique a Inexistência do cliente
            
            $inativo =  Cliente::all()->where('id', $id)->where('estado', 0); // Verifique cliente é inativo
            if(sizeof($inativo) != 0 ){
                return response()->json(['existe'=>1, 'nome'=> $cliente->nome]);
            }
            else{
                return response()->json(['existe'=>0]);
            }
        }
    
        return response()->json(['existe'=>2]); // O valor real é 2
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
    public function update(int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->estado = 0;
        $cliente->save();
        return response()->json(['mensagem' => 'Dados Atualizados com sucesso!', 'id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $id;
    }

    public function ExisteValor($campo, $valor)
    {
        $valor = User::where($campo, $valor)->first();

        if ($valor) {
            return response()->json(['existe' => true]);
        } else {
            return response()->json(['existe' => false]);
        }
    }

    public function casa(int $num_casa)
    {
        $num_casa = Endereco::all()->where('num_casa', $num_casa); 
            
        if(sizeof($num_casa) != 0 )
            return response()->json(['existe'=>1]);
        else 
            return response()->json(['existe'=>0]);
    }

    public function ativar_cliente(int $senha){
        // $cliente = Cliente::find($senha);

        // $cliente->estado = 1;
        // $cliente->save();
        return response()->json(['estado' => 1]);
    }

    public function teste(){
        return response()->json('Sucesso!');
    }

    public function clientesPagandoHoje(){

        $clientes = DB::table('clientes as c')
        ->join('notificacaos as n', 'c.id', '=', 'n.cliente_id')
        ->select(DB::raw('c.id, c.nome, c.contacto, n.data'))
        ->where('n.data', '=', date('Y-m-d'))
        ->where('c.estado', 1)
        ->get();

        if(count($clientes) == 0){
            return response()->json(['estado' => false]);
        }
        else{
            return response()->json(['estado' => true]);
        }
    }
}
