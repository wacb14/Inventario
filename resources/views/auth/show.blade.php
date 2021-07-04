@extends('layout')
@section('title')
    Inventario | {{$user->nombres}}
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">{{$user->nombres}}</h1>
</div>
<div class="content">
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <a href="{{route('users.edit',$user)}}" class="btn btn-primary">Editar</a>
            {{-- <form action="{{route('users.destroy',$user)}}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-primary">Eliminar</button>
            </form> --}}
            <a href="{{route('passwords.edit',$user)}}" class="btn btn-primary">Cambiar contraseña</a>
        @endif
    @endif
    <div>
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <td class="col-header border-2">NOMBRES</td>
                <td class="border-2">{{$user->nombres}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">APELLIDOS</td>
                <td class="border-2">{{$user->apellidos}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">USUARIO</td>
                <td class="border-2">{{$user->usuario}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">TIPO DE USUARIO</td>
                <td class="border-2">{{$user->tipo_usuario}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">CONTRASEÑA</td>
                <td class="border-2">{{$user->password}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection