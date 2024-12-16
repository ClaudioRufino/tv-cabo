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
            $caminho = "light/assets/avatars/admin/padrao.png";
        }
        else{
            $caminho = time(). '.' . request()->foto->getClientOriginalExtension();
            request()->foto->move(public_path('light/assets/avatars/admin'), $caminho);
        }

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $caminho,
                'contacto' => $request->contacto
            ]);

            event(new Registered($user));

            // Auth::login($user);
            return view('admin.create', ['mensagem'=> 'Cadastrado com sucesso!']);
        }
        catch(\Exception $e){
            return view('admin.create');
        }
        
    }
    
}
