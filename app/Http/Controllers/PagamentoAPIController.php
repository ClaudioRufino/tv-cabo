<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Linha;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagamentoAPIController extends Controller
{
    // Listagem dos clientes
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cadastramento de clientes 
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dados = json_decode($request->getContent(), true);

        try {
            Cliente::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => Hash::make($dados['password']),
                'telefone' => $dados['telefone'],
                'curso' => $dados['curso'],
                'data_nascimento' => $dados['data_nascimento'],
                'bi' => $dados['bi'],
                'sexo' => $dados['sexo'],
                'nacionalidade' => $dados['nacionalidade'],
                'qualidades' => $dados['qualidades'],
                'exame_id' => 1
            ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }

        return response()->json(['mensagem' => 'Dados enviado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, int $ano)
    {
        $pagamentos = Pagamento:: all()->where('cliente_id', $id)->where('ano', $ano);
        return response()->json($pagamentos);
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
        //
        $cliente = Cliente::find($id);
        $cliente->estado = 0;
        $cliente->save();
        return response()->json(['mensagem' => 'Dados Atualizados com sucesso!', 'id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $flight = Pagamento::find($id);
        $flight->delete();

        return response()->json(['mensagem'=>'Pagamento Apagado com sucesso!']);
    }

    public function existePagamento($id, $ano, $mes)
    {
        $valor = Pagamento::where('cliente_id', $id)->where('ano', $ano)->where('mes', $mes)->first();

        if ($valor) {
            return response()->json(['existe' => true]);
        } else {
            return response()->json(['existe' => false]);
        }
    }
}
