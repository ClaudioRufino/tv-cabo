<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) 
    {

        if(!isset($request->foto)){
            $arquivo = "light/assets/avatars/admin/padrao.png";
        }
        else{

            $arquivo = time(). '.' . request()->foto->getClientOriginalExtension();

            $caminho = public_path('light/assets/avatars/admin');
            request()->foto->move($caminho, $arquivo);
            
        }

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $arquivo,
                'contacto' => $request->contacto
            ]);

            event(new Registered($user));

            // Auth::login($user);
            return view('admin.create', ['mensagem'=> 'Cadastrado com sucesso!']);
        }
        catch(\Exception $e){
            return view($e->getMessage());
            return view('admin.create');
        }
        
    }
    
}
