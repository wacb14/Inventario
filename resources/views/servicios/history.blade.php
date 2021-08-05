@extends('layout')
@section('title')
    Inventario | Historial servicios
@endsection
@section('content')
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">HISTORIAL DE {{$servicio->nombre}}</h1>
    </div>
    <br> 
    @isset($detalles)
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <th>RESPONSABLE</th>
                <th>FECHA INICIO</th>
                <th>FECHA FIN</th>
            </tr>
            @foreach ($detalles as $detalle)
                <tr>
                    <td class="border-2">{{$detalle->responsable}}</td>
                    <td class="border-2">{{$detalle->fecha_inicio}}</td>
                    <td class="border-2">{{$detalle->fecha_fin}}</td>
                </tr>
            @endforeach
        </table>
    @endisset   
@endsection