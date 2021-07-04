@extends('layout')
@section('title')
    Inventario | {{$servicio->nombre}}
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">{{$servicio->nombre}}</h1>
</div>
<div class="content">
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <a href="{{route('servicios.edit',$servicio)}}" class="btn btn-primary">Editar</a>
            {{-- <form action="{{route('servicios.destroy',$servicio)}}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-primary">Eliminar</button>
            </form> --}}
        @endif
    @endif
    <div>
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <td class="col-header border-2">ID SERVICIO</td>
                <td class="border-2">{{$servicio->idservicio}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">NOMBRE</td>
                <td class="border-2">{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">RESPONSABLE</td>
                <td class="border-2">
                {{$responsable->nombres.' '.$responsable->apellidos}}
                </td>
                
            </tr>
        </table>
    </div>
</div>
@endsection