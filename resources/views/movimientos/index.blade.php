@extends('layout')
@section('title')
    Inventario | Movimientos
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">MOVIMIENTOS</h1>
</div>
<div class="content">
    <div class="new-and-search">
        <div class="new-item">
            <a href="{{route('movimientos.create')}}" class="btn btn-primary">Nuevo</a>
            @php
                $imprimir = serialize($movimientos);
                $imprimir = urlencode($imprimir);
            @endphp
            <a class="btn btn-primary" href="{{route('movimientos.print')}}?@php echo 'movimientos='.$imprimir;@endphp"><img src="{{asset('icons/printer.svg')}}" alt="imprimir" width="25" height="25"></a>
        </div>
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($movimientos)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID MOV</th>
                    <th class="border-2">C. PATRIMONIAL</th>
                    <th class="border-2">FECHA</th>
                    <th class="border-2">SERVICIO DESTINO</th>
                </tr>
                @foreach ($movimientos as $movimiento)
                    <tr>
                        <td class="border-2"><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->idmovimiento}}</a></td>
                        <td class="border-2"><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->cod_patrimonial}}</a></td>
                        <td class="border-2"><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->fecha}}</a></td>
                        <td class="border-2"><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->servicio}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen movimientos aun para mostrar
        @endisset
    </div>
    <div class="pagination-menu"> 
        @include('partials/pagmenu')
    </div>
</div>
@endsection