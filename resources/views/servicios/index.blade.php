@extends('layout')
@section('title')
    Inventario | Servicios
@endsection
@section('content')
<form action="" method="GET">

<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">SERVICIOS</h1>
    </div>
    <div class="new-and-search">
        @if(auth()->check())
            @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
                <div class="new-item">
                    <a class="btn btn-primary" href="{{route('servicios.create')}}">Nuevo</a>
                    @php
                        $imprimir = serialize($servicios);
                        $imprimir = urlencode($imprimir);
                    @endphp
                    <a class="btn btn-primary" href="{{route('servicios.print')}}?@php echo 'servicios='.$imprimir;@endphp"><img src="{{asset('icons/printer.svg')}}" alt="imprimir" width="25" height="25"></a>
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
        @isset($servicios)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID SERV.</th>
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
        <div class="pagination-menu"> 
            @include('partials/pagmenu')
        </div>
    </div>
</div>
@endsection