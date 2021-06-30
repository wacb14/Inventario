@extends('layout')
@section('title')
    Inventario | {{$servicio->nombre}}
@endsection
@section('content')
<div class="title-form">
    <h1>{{$servicio->nombre}}</h1>
</div>
<div class="content">
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <a href="{{route('servicios.edit',$servicio)}}" class="btn btn-primary">Editar</a>
            <form action="{{route('servicios.destroy',$servicio)}}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-primary">Eliminar</button>
            </form>
        @endif
    @endif
    <div>
        <table class="table-show table table-striped table-hover">
            <tr>
                <td>ID SERVICIO</td>
                <td>{{$servicio->idservicio}}</td>
            </tr>
            <tr>
                <td>NOMBRE</td>
                <td>{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td>RESPONSABLE</td>
                <td>
                {{$responsable->nombres.' '.$responsable->apellidos}}
                </td>
                
            </tr>
        </table>
    </div>
</div>
@endsection