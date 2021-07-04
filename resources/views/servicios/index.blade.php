@extends('layout')
@section('title')
    Inventario | Servicios
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">SERVICIOS</h1>
    </div>
    <div class="new-and-search">
        @if(auth()->check())
            @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
                <div class="new-item">
                    <a class="btn btn-primary" href="{{route('servicios.create')}}">Nuevo</a>
                </div>
            @endif
        @endif
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($servicios)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID SERVICIO</th>
                    <th class="border-2">NOMBRE</th>
                    <th class="border-2">RESPONSABLE</th>
                </tr>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td class="border-2"><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->idservicio}}</a></td>
                        <td class="border-2"><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->nombre}}</a></td>
                        <td class="border-2"><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->responsable}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen servicios aun para mostrar
        @endisset
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
</div>
@endsection