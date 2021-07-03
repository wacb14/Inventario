@extends('layout')
@section('title')
    Inventario | {{$bien->nombre}}
@endsection
@section('content')
<div class="title-form">
    <h1>{{$bien->nombre}}</h1>
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
    <div>
        <table class="table-show table table-striped table-hover">
            <tr>
                <td class="col-header">ID BIEN</td>
                <td>{{$bien->idbien}}</td>
            </tr>
            <tr>
                <td class="col-header">SERVICIO</td>
                <td>{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td class="col-header">COD PATRIMONIAL</td>
                <td>{{$bien->cod_patrimonial}}</td>
            </tr>
            <tr>
                <td class="col-header">PROCEDENCIA</td>
                <td>{{$bien->procedencia}}</td>
            </tr>
            <tr>
                <td class="col-header">CANTIDAD</td>
                <td>{{$bien->cantidad}}</td>
            </tr>
            <tr>
                <td class="col-header">MARCA</td>
                <td>{{$bien->marca}}</td>
            </tr>
            <tr>
                <td class="col-header">MODELO</td>
                <td>{{$bien->modelo}}</td>
            </tr>
            <tr>
                <td class="col-header">NÚMERO DE SERIE</td>
                <td>{{$bien->num_serie}}</td>
            </tr>
            <tr>
                <td class="col-header">COLOR</td>
                <td>{{$bien->color}}</td>
            </tr>
            <tr>
                <td class="col-header">MEDIDAS</td>
                <td>{{$bien->medidas}}</td>
            </tr>
            <tr>
                <td class="col-header">ESTADO CONSERVACION</td>
                <td>{{$bien->estado_conservacion}}</td>
            </tr>
            <tr>
                <td class="col-header">ESTADO</td>
                <td>{{$bien->estado}}</td>         
            </tr>
            <tr>
                <td class="col-header">OBSERVACION</td>
                <td>{{$bien->observacion}}</td>
            </tr>
            <tr>
                <td class="col-header">FECHA ADQUISICION</td>
                <td>{{$bien->fecha_adquisicion}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection