<?php

namespace App\Http\Controllers;



use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemaController extends Controller
{
    public function index()
    {
        
    }


    public function update(Request $request, int $id)
    {
        $sistema = Sistema::find($id);
        $sistema->multa = $request->multa;
        $sistema->save();
        return view('definicao', compact('sistema'));
    }

    public function show(Request $request, int $id)
    {
        return "Clicou em show";
    }
}
