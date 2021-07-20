@extends('layout')
@section('title')
    Inventario | {{$movimiento->idmovimiento}}
@endsection
@section('content')
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">Movimiento {{$movimiento->idmovimiento}}</h1>
    </div>
    <a href="{{route('movimientos.edit',$movimiento)}}" class="btn btn-primary">Editar</a>
    {{-- <form action="{{route('movimientos.destroy',$movimiento)}}" method="POST">
        @csrf @method('DELETE')
        <button class="btn btn-primary">Eliminar</button>
    </form> --}}
    <div class="list">
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <td class="col-header border-2">ID MOVIMIENTO</td>
                <td class="border-2">{{$movimiento->idmovimiento}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">BIEN</td>
                <td class="border-2">{{$bien->nombre}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">FECHA</td>
                <td class="border-2">{{$movimiento->fecha}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">SERVICIO DESTINO</td>
                <td class="border-2">{{$servicio->nombre}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">MOTIVO</td>
                <td class="border-2">{{$movimiento->motivo}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">OBSERVACIONES</td>
                <td class="border-2">{{$movimiento->observaciones}}</td>
            </tr>
        </table>
    </div>
@endsection