<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\Ficha_Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = Admin::all();
        return view('admin.index', compact('administradores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return $request->foto;
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
        return "Clicaste em Editar";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
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

    public function teste(Request $request){
        return View('welcome');
    }
}
