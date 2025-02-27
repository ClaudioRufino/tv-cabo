<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Linha;
use App\Models\Multa;
use App\Models\Divida;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use App\Models\Ficha_Contrato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lista de todos clientes activos do sistema
        $clientes = Cliente::where('estado', '1')->paginate(9);
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cadastramento de clientes 
        return view('cliente.create');
    }

    public function pagina2(){
        $id_admin = Auth::id();
        $admin = User::find($id_admin);
        if($admin){
            $nome_admin = $admin->name;
            return "Nome: $nome_admin";
        }
       return $teste;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Cadastramento do cliente
        $cliente = Cliente::create([
                'nome'=> $request->nome,
                'genero' => $request->genero,
                'estado' => 1,
                'foto' => $request->avatar,
                'contacto' => $request->contacto
        ]);

        // Cadastramento da linha
        $linha = Linha::create([
            'nome' => $request->linha
        ]);

        // Cadastramento do endereço
        $endereco = Endereco::create([
            'num_casa' => $request->num_casa,
            'descricao' => $request->descricao,
            'linha_id' => Linha::latest()->value('id'),
            'cliente_id' => Cliente::latest()->value('id')
        ]);

        // Cadastramento da ficha

        /* O dia do pagamento tem que ser obtido a partir da data da ficha de contrato */
        $data = explode('-', $request->data_contrato);

        $ficha = Ficha_Contrato::create([
            'dia_pagamento' => (int) $data[2],
            'data_contrato' => $request->data_contrato, 
            'cliente_id' => Cliente::latest()->value('id')
        ]);

        $dados = (Object)[
            'id'=> Cliente::latest()->value('id'),
            'nome' => $request->nome,
            'contacto' => $request->contacto,
            'rua' => $request->descricao,
            'linha' => $request->linha,
            'dia_pagamento' => date('d'),
            'data_contrato' => $request->data_contrato
        ];

        /*Gera o comprovativo de cadastro */

        $pdf = Pdf::loadView('cliente.comprovativo', compact('dados'));
        return $pdf->stream('Ficha.pdf');

        return redirect()->route('cliente.show', Cliente::latest()->value('id'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        /** Pegando a linha do cliente */
        $linha = DB::table('enderecos')
                    ->join('linhas', 'enderecos.id', '=', 'linhas.id')
                    ->where('cliente_id', $id)
                    ->select('linhas.nome')
                    ->get()[0];

        /** Configuração da abreviação do nome */
        $nomeMinuscula = strtolower($cliente->nome);

        $nomes = explode(' ', $nomeMinuscula);
        $nomeAbreviado = ucwords($nomes[0] ) . ", " . ucwords($nomes[sizeof($nomes)-1]);

        /** Histórico de pagamento */
        $pagamentos = Pagamento::all()->where('cliente_id', $id);

        /* Dívida do cliente */
        $dividas_total = Divida::all()->where('cliente_id', $id)->where('estado', '1')->sum('valor');

         /* Multa do cliente */
         $multa_do_cliente = Multa::all()->where('cliente_id', $id)->where('estado', '1')->sum('valor');

        $cliente = (Object)[
            'id'=>$cliente->id,
            'linha' => $linha->nome,
            'nome' => $cliente->nome,
            'foto' => $cliente->foto,
            'divida' => $dividas_total,
            'pagamentos' => $pagamentos,
            'multa' => $multa_do_cliente,
            'rua'=> $cliente->endereco->descricao,
            'contacto' => $cliente->contacto,
            'nome_abreviado' => $nomeAbreviado,
            'num_casa' => $cliente->endereco->num_casa,
            'data_contrato' => $cliente->ficha_contrato->data_contrato,
            'dia_pagamento' => $cliente->ficha_contrato->dia_pagamento
        ];

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //Chamando a view Edit para editar os dados do cliente
        $cliente = Cliente::find($id);

        $linha = DB::table('enderecos')
                ->join('linhas', 'enderecos.id', '=', 'linhas.id')
                ->where('cliente_id', $id)
                ->select('linhas.nome')
                ->get()[0];

        $cliente = (Object)[
            'id' => $cliente->id,
            'linha' => $linha->nome,
            'foto' => $cliente->foto,
            'nome' => $cliente->nome,
            'contacto' =>$cliente->contacto,
            'rua' => $cliente->endereco->descricao,
            'num_casa' => $cliente->endereco->num_casa,
            'data_contrato' => $cliente->ficha_contrato->data_contrato
        ];

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Atualizando dados do cliente
        $cliente = Cliente::find($id);

        $cliente->nome = $request->nome;
        $cliente->genero = $request->genero;
        $cliente->estado = 1;
        $cliente->foto = $request->avatar;
        $cliente->contacto = $request->contacto;
        $cliente->save();
        
        // Atualizando dados do endereço
        $id_endereco = DB::table('enderecos')->select('id')->where('cliente_id', $id)->get()[0];
            
        $endereco = Endereco::find($id_endereco->id);
        $endereco->descricao = $request->rua;
        $endereco->num_casa = $request->num_casa;
        $endereco->save();

        $linha = Linha::find($endereco->linha_id);
        $linha->nome = $request->linha;
        $linha->save();

        // Atualizando dados da ficha
        $id_ficha = DB::table('ficha__contratos')->select('id')->where('cliente_id', $id)->get()[0]; // Pegando a linha do endereço a ser atualizada
        $ficha = Ficha_Contrato::find($id_ficha->id);
        $ficha->data_contrato = $request->data_contrato; 
        $ficha->save();

        return redirect()->route('cliente.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // return $id;
        $cliente = Cliente::find($id);
        $cliente->estado = 0;
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function ativar(int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->estado = 1;
        $cliente->save();
        return redirect()->route('cliente.show',$id);

    }

    public function inativos(){
        return view('cliente.inativos');
    }


}
