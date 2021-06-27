<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUsuarioRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth/register');
    }
    
    public function store(SaveUsuarioRequest $request){
        $usuario=User::create($request->validated());
        // auth()->login($usuario);
        return redirect()->route('register.index')->with('status','La información del usuario se registró exitosamente');
    }
}
