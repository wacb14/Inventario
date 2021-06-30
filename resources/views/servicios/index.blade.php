@extends('layout')
@section('title')
    Inventario | Servicios
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1>SERVICIOS</h1>
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
            <table class="elements-table table-list table table-striped table-hover">
                <tr>
                    <th>ID SERVICIO</th>
                    <th>NOMBRE</th>
                    <th>RESPONSABLE</th>
                </tr>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->idservicio}}</a></td>
                        <td><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->nombre}}</a></td>
                        <td><a href="{{route('servicios.show', $servicio->idservicio)}}">{{$servicio->responsable}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen servicios aun para mostrar
        @endisset
        <div class="pagination-menu"> 
            @include('partials/pagmenu')
        </div>
    </div>
</div>
@endsection