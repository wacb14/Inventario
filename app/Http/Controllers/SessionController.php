<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('auth/login');
    }

    public function store(){
        if(auth()->attempt(request(['usuario','password'])) == false){
            return back()->withErrors(['message'=>'El usuario o contraseña son incorrectos, por favor intentelo de nuevo']);
        }
        return redirect()->route('home');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->route('login.create');
    }
}
