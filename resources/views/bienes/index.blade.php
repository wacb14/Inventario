@extends('layout')
@section('title')
    Inventario | Bienes
@endsection
@section('content')
<form action="" method="GET">
<div id="select-estate">
    <div class="listar-estado">
        Estado del bien<br>
        <select name="tipo_listado" onchange="this.form.submit()">
            <option value="FUNCIONAL" @if($tipo_listado=="FUNCIONAL") {{'selected'}} @endif>FUNCIONALES</option>
            <option value="BAJA" @if($tipo_listado=="BAJA") {{'selected'}} @endif>DE BAJA</option>
            <option value="TODO" @if($tipo_listado=="TODO") {{'selected'}} @endif>TODOS</option>
        </select>
    </div>
</div>
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">SECCIÓN DE BIENES @switch($tipo_listado)
            @case("FUNCIONAL")
                (FUNCIONALES)
                @break
            @case("BAJA")
                (DE BAJA)
                @break
        @endswitch</h1>
    </div>
    <div class="new-and-search">
    
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <div class="new-item">
                <a class="btn btn-primary" href="{{route('bienes.create')}}">Nuevo</a>
                @php
                    $imprimir = serialize($bienes);
                    $imprimir = urlencode($imprimir);
                @endphp
                <a class="btn btn-primary" href="{{route('bienes.print')}}?@php echo 'bienes='.$imprimir;@endphp">Imprimir</a>
            </div>
        @endif
    @endif
        
        <div class="search-bar">
                <input name="busqueda" type="search" value="{{$busqueda}}">
                <button class="btn btn-primary">Buscar</button>
        </div>
    </form>
    </div>
    <div class="list">
        @isset($bienes)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID BIEN</th>
                    <th class="border-2">NOMBRE</th>
                    <th class="border-2">SERVICIO</th>
                    <th class="border-2">C. PATRIMONIAL</th>
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
        <div class="pagination-menu"> 
            @include('partials/pagmenu')
        </div>
    </div>
</div>
@endsection