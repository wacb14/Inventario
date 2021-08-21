@extends('layout')
@section('title')
    Comprobación de bienes
@endsection
@section('content')
    <div class="row">
        <h1>Comprobación de bienes</h1>
    </div>
    <div class="row">
        <div class="col">
            Servicio<br>
            <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
            placeholder-gray-900 p-2 focus:bg-white">
                @foreach ($servicios as $servicio)
                    <option value="{{$servicio->idservicio}}">{{$servicio->idservicio."-".$servicio->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input name="codigo" type="search" value="{{$busqueda}}">
                <button class="btn btn-primary">Buscar</button>
        </div>
    </div>
    <div class="row">
        @isset($bienes)
            <table class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID BIEN</th>
                    <th class="border-2">NOMBRE</th>
                    <th class="border-2">SERVICIO</th>
                    <th class="border-2">C. PATRIMONIAL</th>
                    <th class="border-2">PRESENTE</th>
                </tr>
                @foreach ($bienes as $bien)
                    <tr>
                        <td class="border-2">{{$bien->idbien}}</td>
                        <td class="border-2">{{$bien->nombre}}</td>
                        <td class="border-2">{{$bien->servicio}}</td>
                        <td class="border-2">{{$bien->cod_patrimonial}}</td>
                        <td class="border-2"><input type="checkbox"></td>
                    </tr>
                @endforeach
            </table>
        @else
            No existen bienes aun para mostrar
        @endisset
    </div>
@endsection