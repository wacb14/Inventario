@extends('layout')
@section('title')
    Inventario | Usuarios
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">ADMINISTRACIÓN DE USUARIOS</h1>
    </div>
    <div class="new-and-search">

    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <div class="new-item">
                <a class="btn btn-primary" href="{{route('register.create')}}">Registrar Nuevo</a>
            </div>
        @endif
    @endif
    <div class="search-bar">
        @include('partials/searchbar')
    </div>
    </div>
    <div class="list">
        @isset($users)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">NOMBRES</th>
                    <th class="border-2">APELLIDOS</th>
                    <th class="border-2">USUARIO</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td class="border-2"><a href="{{route('users.show',$user->id)}}">{{$user->nombres}}</a></td>
                        <td class="border-2"><a href="{{route('users.show',$user->id)}}">{{$user->apellidos}}</a></td>
                        <td class="border-2"><a href="{{route('users.show',$user->id)}}">{{$user->usuario}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen usuarios aun para mostrar
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