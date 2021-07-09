@extends('layout')
@section('title')
    Inventario | {{$responsable->nombres}}
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">{{$responsable->nombres}}</h1>
    </div>
    @if(auth()->check())
        @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
            <a href="{{route('responsables.edit',$responsable)}}" class="btn btn-primary">Editar</a>
            {{-- <form action="{{route('responsables.destroy',$responsable)}}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-primary">Eliminar</button>
            </form> --}}
        @endif
    @endif
    <div class="list">
        <table class="table-show table table-striped table-hover border-collapse border-separate border-2">
            <tr>
                <td class="col-header border-2">ID RESPONSABLE</td>
                <td class="border-2">{{$responsable->idresponsable}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">NOMBRES</td>
                <td class="border-2">{{$responsable->nombres}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">APELLIDOS</td>
                <td class="border-2">{{$responsable->apellidos}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">CARGO</td>
                <td class="border-2">{{$responsable->cargo}}</td>
            </tr>
            <tr>
                <td class="col-header border-2">MODALIDAD</td>
                <td class="border-2">{{$responsable->modalidad}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection