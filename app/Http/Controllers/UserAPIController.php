<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Linha;
use App\Models\Pagamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller
{
    // Listagem dos clientes
    public function index()
    {
        // $clientes = Cliente::all();
        // return response()->json($clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cadastramento de clientes 
        // return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::find($id); 

        if($user){  // Verifique se o Administrador existe
            return response()->json(['senha'=>$user->password]);
        }

        return response()->json(['senha'=>0]); // Caso o administrador não exista
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id)
    {
        $user = User::find($id);
        $user->estado = 0;
        $user->save();
        return response()->json(['mensagem' => 'Dados Atualizados com sucesso!', 'id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['mensagem' => 'Eliminado com sucesso!']);
    }

    public function ExisteValor($campo, $valor)
    {
        $valor = User::where($campo, $valor)->first();

        if ($valor) {
            return response()->json(['existe' => true]);
        } else {
            return response()->json(['existe' => false]);
        }
    }

    public function casa(int $num_casa)
    {
        $num_casa = Endereco::all()->where('num_casa', $num_casa); 
            
        if(sizeof($num_casa) != 0 )
            return response()->json(['existe'=>1]);
        else 
            return response()->json(['existe'=>0]);
    }

    public function verifica_senha(String $senha = '0000')
    {
        $user = User::find(1); 

        if(Hash::check($senha, $user->password)){  // Verifique se o Administrador existe
            return response()->json(['senha'=>true]);
        }

        return response()->json(['senha'=>false]); // Caso o administrador não exista
        
    }
}
