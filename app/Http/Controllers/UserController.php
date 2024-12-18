<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\Ficha_Contrato;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = User::all();
        return view('admin.index', compact('administradores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return "Store errado";
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
    public function edit(int $id)
    {
         //Chamando a view Edit para editar os dados do Administrador
         $admin = User::find($id);

         $admin = (Object)[
             'id' => $admin->id,
             'name' => $admin->name,
             'email' => $admin->email,
            //  'password' => $admin->password,
             'foto' => $admin->foto,
             'contacto' =>$admin->contacto,
         ];
 
         return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $admin = User::find($id);

        if(!isset($request->foto)){
            $caminho = "padrao.jpg";
        }
        else{
            $caminho = time(). '.' . request()->foto->getClientOriginalExtension();
            request()->foto->move(public_path('light/assets/avatars/admin'), $caminho);
        }
        

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->contacto = $request->contacto;
        $admin->foto = $caminho;
        $admin->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $admin = User::find($id);
        if($admin){
            $admin->delete();
        }
        return redirect()->route('admin.index');
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
}
