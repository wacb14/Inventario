@extends('layout')
@section('title')
    Modificar servicio
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">EDITAR SERVICIO</h1><br>
</div>
<div class="content">
    <form action="{{route('servicios.update',$servicio->idservicio)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-center">
                <label>
                    ID Servicio<br>
                    <input type="number" name="idservicio" value="{{old('idservicio',$servicio->idservicio)}}" disabled class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre',$servicio->nombre)}}" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Responsable <br>
                    <select name="idresponsable" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($responsables as $responsable)
                            <option value="{{$responsable->idresponsable}}" @if($servicio->idresponsable==$responsable->idresponsable) {{'selected'}}@endif>{{$responsable->idresponsable."-".$responsable->nombres." ".$responsable->apellidos}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idresponsable','<small class="msg_error">:message</small><br>') !!}
                <br>
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection