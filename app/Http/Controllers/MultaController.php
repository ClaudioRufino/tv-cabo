<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Multa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultaController extends Controller
{
    /**+
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listagem das multas de todos os clientes

        $clientes_multa = DB::table('clientes as c')
            ->join('multas as m', 'c.id', '=', 'm.cliente_id')
            ->select(DB::raw('c.id, c.nome, c.contacto, sum(m.valor) as multa'))
            ->where('m.estado', 1)
            ->groupBy('c.id', 'c.nome', 'c.contacto')
            ->get();

        // return $clientes_multa;

        return view('multa.index', ['clientes'=> $clientes_multa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('multa.create');
    }

    public function createId($cliente_id, $multa_id)
    {
        // Registo do pagamento da multa com o id já estampado
        $cliente = (Object) [
            'cliente_id' => $cliente_id,
            'multa_id' => $multa_id,
            'data_emissao' => Multa::find($multa_id)->data_emissao,
            'valor' => Multa::find($multa_id)->valor
        ];

        return view('multa.createid', ['cliente'=> $cliente]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        //Cadastramento da Multa
        if(!isset($request->descricao)){
            $descricao = "Sem descrição";
        }
        else{
            $descricao = $request->descricao;
        }
        $multa = Multa::create([
            'valor'=> $request->valor,
            'estado' => 1,
            'descricao' => $descricao,
            'data_emissao' => $request->data_emissao,
            'cliente_id' => $request->cliente_id
        ]);

        return redirect()->route('multa.index');;

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Mostrar As multas de um determinado cliente, com base ao seu id.
        $cliente = Cliente::find($id);
        $multas = Multa::all()->where('cliente_id', $id)->where('estado', '1');
        return view('multa.show', ['multas' => $multas, 'cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Multa $multa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $multa_id)
    {
        //
        $multa = Multa::find($multa_id);

        $multa->estado = 0;
        $multa->save();

        // return $multa->cliente_id;
        return redirect()->route('multa.show', $multa->cliente_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Multa $multa)
    {
        //
    }
}
