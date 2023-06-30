<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CuentasRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Gate;

class CuentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['autenticar','logout']);
    }

    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;

        if(Auth::attempt(['user'=>$user,'password'=>$password,'activo'=>true])){
            Auth::user()->registraUltimoLogin();
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales Incorrectas',
        ])->onlyInput('email');
    }
}
