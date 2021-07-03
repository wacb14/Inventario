@extends('layout')
@section('title')
    Inventario | Movimientos
@endsection
@section('content')
<div class="title-form">
    <h1>MOVIMIENTOS</h1>
</div>
<div class="content">
    <div class="new-and-search">
        <div class="new-item">
            <a href="{{route('movimientos.create')}}" class="btn btn-primary">Nuevo</a>
        </div>
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($movimientos)
            <table class="elements-table table-list table table-striped table-hover">
                <tr>
                    <th>ID MOVIMIENTO</th>
                    <th>BIEN</th>
                    <th>FECHA</th>
                    <th>SERVICIO</th> 
                </tr>
                @foreach ($movimientos as $movimiento)
                    <tr>
                        <td><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->idmovimiento}}</a></td>
                        <td><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->bien}}</a></td>
                        <td><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->fecha}}</a></td>
                        <td><a href="{{route('movimientos.show', $movimiento->idmovimiento)}}">{{$movimiento->servicio}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen movimientos aun para mostrar
        @endisset
    </div>
    @if(!isset($_GET["busqueda"]))
            <div class="pagination-menu"> 
                @include('partials/pagmenu')
            </div>
        @else
            @if($_GET["busqueda"]=="")
                <div class="pagination-menu"> 
                    @include('partials/pagmenu')
                </div>
            @endif
        @endif
</div>
@endsection