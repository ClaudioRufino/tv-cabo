<?php

namespace App\Http\Controllers;



use App\Models\Sistema;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemaController extends Controller
{
    public function index()
    {

        $sistema = Sistema::find(1);

        $clientesActivos = Cliente::all()->where('estado', '1')->count();
        $clientesInativos = Cliente::all()->where('estado', '0')->count();

        $sistema = (Object)[
            'multa' => $sistema->multa? $sistema->multa : "Não definido",
            'mensalidade' => $sistema->mensalidade? $sistema->mensalidade : "Não definido",
            'dia_significativo' => $sistema->dia_significativo? $sistema->dia_significativo : "Não definido",
            'ativos' => $clientesActivos,
            'inativos' => $clientesInativos,
            'descricao' => $sistema->descricao? "Sim" : "Não definido",
        ];

        return view('definicao', compact('sistema'));
    }


    public function update(Request $request, int $id)
    {
        $sistema = Sistema::find($id);

        if($request->multa){
            $sistema->multa = $request->multa; 
        }

        if($request->mensalidade){
            $sistema->mensalidade = $request->mensalidade; 
        }

        if($request->dia_significativo){
            $sistema->dia_significativo = $request->dia_significativo; 
        }
        
        $sistema->save();

        return redirect()->route('sistema.index');

    }

    public function show(Request $request, int $id)
    {
        return "Clicou em show";
    }
}
