<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use DB;

class RegisterController extends Controller
{
    public function index(){
        if(isset($_GET["busqueda"])){
            $busqueda=$_GET["busqueda"];
            $total = DB::select('CALL SP_contarBusquedaUsuarios(?)',array($busqueda))[0]->cantidad;
        }
        else{
            $busqueda="";
            $total = User::count();
        }
        /* Paginacion */
        $nroElement = 14;
        $nroPaginas = $total%$nroElement==0?intdiv($total,$nroElement):intdiv($total,$nroElement)+1;
        $cantidadReg = $nroElement;
        $pag=1;
        $inicio = 0; // El primer registro que se va a tomar para la paginacion
        /* En el caso que la pagina este determinada */
        if(isset($_GET["page"])){
            $pag=$_GET["page"];
            if($total%$nroElement!=0 && $pag==$nroPaginas){
                $cantidadReg = $total%$nroElement;
            }
            $inicio=($pag-1)*$nroElement;
        }
        $users = DB::select('CALL SP_listarBusquedaUsuarios(?,?,?)',array($busqueda, $inicio, $cantidadReg));           
        return view('auth/index',['users'=>$users, 'nroPaginas'=>$nroPaginas, 'pag'=>$pag, 'busqueda'=>$busqueda]);
    }
    public function create(){
        return view('auth/register');
    }
    
    public function store(SaveUsuarioRequest $request){
        $usuario=User::create($request->validated());
        // auth()->login($usuario);
        return redirect()->route('register.create')->with('status','La información del usuario se registró exitosamente');
    }

    public function show(User $user){
        // $user = User::where('id',$user->id)->get()[0];
        return view('auth/show',['user'=>$user]);
    }

    public function edit(User $user){
        return view('auth/edit',['user'=>$user]);
    }

    public function edit_pass(User $user){
        return view('auth/edit_pass',['user'=>$user]);
    }

    public function update(User $user, UpdateUsuarioRequest $request){
        $user->update($request->validated());
        return redirect()->route('users.show',$user)->with('status','La información del usuario se actualizó exitosamente');
    }

    public function update_pass(User $user, UpdatePasswordRequest $request){
        $user->update($request->validated());
        return redirect()->route('users.show',$user)->with('status','La contraseña se cambió correctamente');
    }
}
