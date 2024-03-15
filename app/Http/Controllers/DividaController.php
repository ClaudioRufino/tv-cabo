<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Divida;
use Illuminate\Http\Request;

class DividaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(int $id)
    {
        //
        $cliente = Cliente::find($id);
        $dividas = Divida::all()->where('cliente_id', $id)->where('estado', '1');
        return view('divida.show', ['dividas' => $dividas, 'cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divida $divida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divida $divida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divida $divida)
    {
        //
    }
}
