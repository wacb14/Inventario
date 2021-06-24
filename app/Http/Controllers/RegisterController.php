<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUsuarioRequest;
use App\Models\Usuario;

class RegisterController extends Controller
{
    public function create(){
        return view('auth/register');
    }
    public function store(SaveUsuarioRequest $request){
        $usuario=Usuario::create($request->validated());
        auth()->login($usuario);
        return redirect()->route('home');
    }
}
