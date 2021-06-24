@extends('layout')
@section('title')
    Inventario | {{$responsable->nombres}}
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1>{{$responsable->nombres}}</h1>
    </div>
    <a href="{{route('responsables.edit',$responsable)}}" class="btn btn-primary">Editar</a>
    <form action="{{route('responsables.destroy',$responsable)}}" method="POST">
        @csrf @method('DELETE')
        <button class="btn btn-primary">Eliminar</button>
    </form>
    <div>
        <table class="table-show table table-striped table-hover">
            <tr>
                <td>ID RESPONSABLE</td>
                <td>{{$responsable->idresponsable}}</td>
            </tr>
            <tr>
                <td>NOMBRES</td>
                <td>{{$responsable->nombres}}</td>
            </tr>
            <tr>
                <td>APELLIDOS</td>
                <td>{{$responsable->apellidos}}</td>
            </tr>
            <tr>
                <td>CARGO</td>
                <td>{{$responsable->cargo}}</td>
            </tr>
            <tr>
                <td>MODALIDAD</td>
                <td>{{$responsable->modalidad}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection