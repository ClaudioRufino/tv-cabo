<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Divida;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pagamento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Registo do pagamento da mensalidade
        return view('pagamento.create');
    }

    public function createId(int $id)
    {
        // Registo do pagamento da mensalidade com o id já estampado
        return view('pagamento.create', ['pagamentoId' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Armazenamento do Pagamento
        $pagamento = Pagamento::create(
            [
                'mes' => $request->mes,
                'ano' => $request->ano,
                'valor' => $request->valor,
                'user_id' => Auth::id(),
                'data_pagamento' => date('Y-m-d'),
                'cliente_id'=>$request->cliente_id,
            ]);

        /* Ao efectuar o pagamento, deve-se verificar se tem uma dívida vinculada a esse mes e ano */

        /* Pegar o id da dívida referente ao mes a ser pago  se houver */
        if($this->devendo($request->cliente_id, $request->mes, $request->ano)){
            $id_divida = DB::table('dividas')->select('id')->where('cliente_id', $request->cliente_id)->where('mes', $request->mes)->get()[0]->id;

            /* Apois o pagamento, deve-se liquidar a dívida do referente mes. Para tal, utualiza-se o estado da dívida */
            $divida = Divida::find($id_divida);
            $divida->estado = 0;
            $divida->save();
        }

        return redirect()->route('cliente.show', $request->cliente_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nome = Cliente::find($id)->nome;

        $mesesPago = Pagamento::all()->where('cliente_id', $id)->where('ano', 2023);
        return view('pagamento.show', ['id'=>$id, 'mesesPago'=> $mesesPago, 'nome'=> $nome]);
    }

    public function showP($id, $ano)
    {

        $nome = Cliente::find($id)->nome;

        $mesesPago = Pagamento::all()->where('cliente_id', $id)->where('ano', $ano);
        return view('pagamento.show', ['id'=>$id, 'mesesPago'=> $mesesPago, 'nome'=> $nome, 'ano'=>$ano]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, $mes)
    {
        //
        return "Editando Pagamento mes de $mes";
    }

    public function editar(int $id, $ano, $mes, $valor)
    {
        // Pegando o ano com base na data do pagamento

        // Pegar o id do pagamento com base no mes e ano de pagamento
        // $id_pagamento = Pagamento::all()->where('cliente_id', $id)->where('mes', $mes)->where('ano', $ano);

        $id_pagamento = DB::table('pagamentos')
            ->select('id')
            ->where('cliente_id', $id)
            ->where('ano', $ano)
            ->where('mes', $mes)
            ->get()[0]->id;

        $pagamento = (Object)[
            'id'=>$id,
            'ano'=>$ano,
            'mes' =>$mes,
            'valor' => $valor,
            'id_pagamento' => $id_pagamento
        ];

        return view('pagamento.edit', compact('pagamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::find($id);

        $pagamento->ano = $request->ano;
        $pagamento->mes = $request->mes;
        $pagamento->valor = $request->valor;
        $pagamento->save();

        return redirect()->route('cliente.show', $request->cliente_id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }

    private function devendo($id, $mes, $ano){
        $divida = Divida::all()->where('cliente_id', $id)->where('mes', $mes)->where('ano', $ano);
        if($divida->isEmpty()) return false;
        return true;
    }
}
