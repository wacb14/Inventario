@extends('layout')
@section('title')
    Inventario | {{$bien->nombre}}
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">{{$bien->nombre}}</h1>
</div>
<div class="content">
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <a href="{{route('bienes.edit',$bien)}}" class="btn btn-primary">Editar</a>
            {{-- <form action="{{route('bienes.destroy',$bien)}}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-primary">Eliminar</button>
            </form> --}}
        @endif
    @endif
    <div class="list">
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <td class="col-header border-2">ID BIEN</td>
                <td class="border-2">{{$bien->idbien}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">SERVICIO</td>
                <td class="border-2">{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">COD PATRIMONIAL</td>
                <td class="border-2">{{$bien->cod_patrimonial}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">PROCEDENCIA</td>
                <td class="border-2">{{$bien->procedencia}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">CANTIDAD</td>
                <td class="border-2">{{$bien->cantidad}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">MARCA</td>
                <td class="border-2">{{$bien->marca}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">MODELO</td>
                <td class="border-2">{{$bien->modelo}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">NÚMERO DE SERIE</td>
                <td class="border-2">{{$bien->num_serie}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">COLOR</td>
                <td class="border-2">{{$bien->color}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">MEDIDAS</td>
                <td class="border-2">{{$bien->medidas}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">ESTADO CONSERVACION</td>
                <td class="border-2">{{$bien->estado_conservacion}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">ESTADO</td>
                <td class="border-2">{{$bien->estado}}</td>         
            </tr>
            <tr>
                <td class="col-header border-2">OBSERVACION</td>
                <td class="border-2">{{$bien->observacion}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">FECHA ADQUISICION</td>
                <td class="border-2">{{$bien->fecha_adquisicion}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection