<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Divida;
use App\Models\Multa;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lista de todos os clientes que fizeram algum pedido

        $clientes_pedido = DB::table('clientes as c')
                        ->join('pedidos as p', 'c.id', '=', 'p.cliente_id')
                        ->select(DB::raw('c.nome, c.contacto, p.id, p.data, p.assunto, p.descricao'))
                        ->distinct()
                        ->get();

        return view('pedido.index', ['clientes'=> $clientes_pedido]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = explode('-', $request->data);

        if(!$request->descricao){
            $descricao = "Sem descrição.";
        }
        else{
            $descricao = $request->descricao;
        }

        $mes = $data[1];
        $ano = $data[0];

        try {
                $pedido = Pedido::create([
                    'ano' => $ano,
                    'mes' => $mes,
                    'data'=> $request->data,
                    'descricao' => $descricao,
                    'assunto' => $request->assunto,
                    'cliente_id' => $request->cliente_id
            ]);

            return redirect()->route('pedido.index');

        } catch (\Throwable $th) {
            echo "Erro ao cadastrar pedido $th";
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $cliente = Cliente::find($id);

        /** Pegando a linha do cliente */
        $linha = DB::table('enderecos')
                    ->join('linhas', 'enderecos.id', '=', 'linhas.id')
                    ->where('cliente_id', $id)
                    ->select('linhas.nome')
                    ->get()[0];

        /** Configuração da abreviação do nome */
        $nomes = explode(' ', $cliente->nome);
        $nome_abreviado = $nomes[0] . ", " . $nomes[sizeof($nomes)-1];

        /** Histórico de pagamento */
        $pagamentos = Pagamento::all()->where('cliente_id', $id);

        /* Dívida do cliente */
        $dividas_total = Divida::all()->where('cliente_id', $id)->where('estado', '1')->sum('valor');

         /* Dívida do cliente */
         $multa_do_cliente = Multa::all()->where('cliente_id', $id)->where('estado', '1')->sum('valor');

        $cliente = (Object)[
            'id'=>$cliente->id,
            'linha' => $linha->nome,
            'nome' => $cliente->nome,
            'foto' => $cliente->foto,
            'divida' => $dividas_total,
            'pagamentos' => $pagamentos,
            'multa' => $multa_do_cliente,
            'rua'=> $cliente->endereco->rua,
            'contacto' => $cliente->contacto,
            'nome_abreviado' => $nome_abreviado,
            'num_casa' => $cliente->endereco->num_casa,
            'data_contrato' => $cliente->ficha_contrato->data_contrato,
            'dia_pagamento' => $cliente->ficha_contrato->dia_pagamento
        ];
        return view('pedido.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pedido = Pedido::find($id);
        if($pedido){
            $pedido->delete();
        }
        return redirect()->route('pedido.index');
    }
}
