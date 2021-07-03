@extends('layout')
@section('title')
    Inventario | {{$user->nombres}}
@endsection
@section('content')
<div class="title-form">
    <h1>{{$user->nombres}}</h1>
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
        <table class="table-show table table-striped table-hover">
            <tr>
                <td class="col-header">NOMBRES</td>
                <td>{{$user->nombres}}</td>
            </tr>
            <tr>
                <td class="col-header">APELLIDOS</td>
                <td>{{$user->apellidos}}</td>
            </tr>
            <tr>
                <td class="col-header">USUARIO</td>
                <td>{{$user->usuario}}</td>
            </tr>
            <tr>
                <td class="col-header">TIPO DE USUARIO</td>
                <td>{{$user->tipo_usuario}}</td>
            </tr>
            <tr>
                <td class="col-header">CONTRASEÑA</td>
                <td>{{$user->password}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection