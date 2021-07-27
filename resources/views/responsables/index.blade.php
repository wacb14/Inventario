@extends('layout')
@section('title')
    Inventario | Responsables
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">RESPONSABLES</h1>
    </div>
    <div class="new-and-search">
        @if(auth()->check())
            @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
                <div class="new-item">
                    <a href="{{route('responsables.create')}}" class="btn btn-primary">Nuevo</a>
                </div>
            @endif
        @endif
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($responsables)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID RESP.</th>
                    <th class="border-2">NOMBRES</th>
                    <th class="border-2">APELLIDOS</th>
                </tr>
                @foreach ($responsables as $responsable)
                    <tr>
                        <td class="border-2"><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->idresponsable}}</a></td>
                        <td class="border-2"><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->nombres}}</a></td>
                        <td class="border-2"><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->apellidos}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen responsables aun para mostrar
        @endisset
    </div>
    <div class="pagination-menu"> 
        @include('partials/pagmenu')
    </div>
@endsection