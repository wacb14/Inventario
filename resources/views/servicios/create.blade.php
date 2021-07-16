@extends('layout')
@section('title')
    Inventario | Nuevo servicio
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">NUEVO SERVICIO</h1><br>
</div>
<div class="content">
    <form action="{{route('servicios.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <label>
                    ID Servicio<br>
                    <input type="number" name="idservicio" value={{$ID}} disabled class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre')}}" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Responsable <br>
                    <select name="idresponsable" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($responsables as $responsable)
                            <option value="{{$responsable->idresponsable}}">{{$responsable->idresponsable."-".$responsable->nombres." ".$responsable->apellidos}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idresponsable','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha inicio <br>
                    <input type="date" name="fecha_inicio" value="{{old('fecha_inicio')}}" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection