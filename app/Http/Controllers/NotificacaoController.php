<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sabberworm\CSS\Value\Size;

class NotificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listando todas as notificações para o dia de hoje
        $clientes = DB::table('clientes as c')
        ->join('notificacaos as n', 'c.id', '=', 'n.cliente_id')
        ->select(DB::raw('c.id, c.nome, c.contacto, n.data'))
        ->where('n.data', '=', date('Y-m-d'))
        ->where('c.estado', 1)
        ->get();

        // return date('Y-m-d');
        return view('notificacao.index', ['clientes'=> $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Notificacao $notificacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notificacao $notificacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notificacao $notificacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notificacao $notificacao)
    {
        //
    }

    public function existeNotificacao(){

        // $clientes = DB::table('clientes as c')
        // ->join('notificacaos as n', 'c.id', '=', 'n.cliente_id')
        // ->select(DB::raw('c.id, c.nome, c.contacto, n.data'))
        // ->where('n.data', '=', date('Y-m-d'))
        // ->where('c.estado', 1)
        // ->get();

        // if(count($clientes) != 0){
             return response()->json(true);
            //  return response()->json(['existe' => true]);
        // } else {
            //  return response()->json(['existe' => false]);
        // }
    }
}
