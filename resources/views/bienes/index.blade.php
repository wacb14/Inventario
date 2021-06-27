@extends('layout')
@section('title')
    Inventario | Bienes
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1>SECCIÓN DE BIENES</h1>
    </div>
    <div class="new-and-search">

    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <div class="new-item">
                <a class="btn btn-primary" href="{{route('bienes.create')}}">Nuevo</a>
            </div>
        @endif
    @endif
        
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($bienes)
            <table class="elements-table table-list table table-striped table-hover">
                <tr>
                    <th>ID BIEN</th>
                    <th>NOMBRE</th>
                    <th>SERVICIO</th>
                    <th>COD PATRIMONIAL</th>
                </tr>
                @foreach ($bienes as $bien)
                    <tr>
                        <td><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->idbien}}</a></td>
                        <td><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->nombre}}</a></td>
                        <td><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->servicio}}</a></td>
                        <td><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->cod_patrimonial}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen bienes aun para mostrar
        @endisset
        <div class="pagination-menu"> 
            @include('partials/pagmenu')
        </div>
    </div>
</div>
@endsection