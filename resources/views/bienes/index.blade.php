@extends('layout')
@section('title')
    Inventario | Bienes
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">SECCIÓN DE BIENES</h1>
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
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID BIEN</th>
                    <th class="border-2">NOMBRE</th>
                    <th class="border-2">SERVICIO</th>
                    <th class="border-2">COD PATRIMONIAL</th>
                </tr>
                @foreach ($bienes as $bien)
                    <tr>
                        <td class="border-2"><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->idbien}}</a></td>
                        <td class="border-2"><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->nombre}}</a></td>
                        <td class="border-2"><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->servicio}}</a></td>
                        <td class="border-2"><a href="{{route('bienes.show', $bien->idbien)}}">{{$bien->cod_patrimonial}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen bienes aun para mostrar
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