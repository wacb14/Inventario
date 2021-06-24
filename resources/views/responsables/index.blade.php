@extends('layout')
@section('title')
    Inventario | Responsables
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1>RESPONSABLES</h1>
    </div>
    <div class="new-and-search">
        <div class="new-item">
            <a href="{{route('responsables.create')}}" class="btn btn-primary">Nuevo</a>
        </div>
        <div class="search-bar">
            @include('partials/searchbar')
        </div>
    </div>
    <div class="list">
        @isset($responsables)
            <table class="elements-table table-list table table-striped table-hover">
                <tr>
                    <th>ID RESPONSABLE</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                </tr>
                @foreach ($responsables as $responsable)
                    <tr>
                        <td><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->idresponsable}}</a></td>
                        <td><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->nombres}}</a></td>
                        <td><a href="{{route('responsables.show', $responsable->idresponsable)}}">{{$responsable->apellidos}}</a></td>
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