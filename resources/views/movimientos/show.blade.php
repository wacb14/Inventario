@extends('layout')
@section('title')
    Inventario | {{$movimiento->idmovimiento}}
@endsection
@section('content')
    <div class="title-form">
        <h1>Movimiento {{$movimiento->idmovimiento}}</h1>
    </div>
    <a href="{{route('movimientos.edit',$movimiento)}}" class="btn btn-primary">Editar</a>
    {{-- <form action="{{route('movimientos.destroy',$movimiento)}}" method="POST">
        @csrf @method('DELETE')
        <button class="btn btn-primary">Eliminar</button>
    </form> --}}
    <div>
        <table class="table-show table table-striped table-hover">
            <tr>
                <td>ID MOVIMIENTO</td>
                <td>{{$movimiento->idmovimiento}}</td>
            </tr>
            <tr>
                <td>BIEN</td>
                <td>{{$bien->nombre}}</td>
            </tr>
            <tr>
                <td>FECHA</td>
                <td>{{$movimiento->fecha}}</td>
            </tr>
            <tr>
                <td>SERVICIO</td>
                <td>{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td>MOTIVO</td>
                <td>{{$movimiento->motivo}}</td>
            </tr>
            <tr>
                <td>OBSERVACIONES</td>
                <td>{{$movimiento->observaciones}}</td>
            </tr>
        </table>
    </div>
@endsection