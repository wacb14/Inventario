@extends('layout')
@section('title')
    Inventario | Nuevo servicio
@endsection
@section('content')
<div class="title-form">
    <h1>AGREGAR NUEVO SERVICIO</h1><br>
</div>
<div class="content">
    <form action="{{route('servicios.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <label>
                    ID Servicio<br>
                    <input type="number" name="idservicio" value={{$ID}} disabled>
                </label>
                <br>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre')}}">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Responsable <br>
                    <select name="idresponsable">
                        @foreach ($responsables as $responsable)
                            <option value="{{$responsable->idresponsable}}">{{$responsable->idresponsable."-".$responsable->nombres." ".$responsable->apellidos}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idresponsable','<small class="msg_error">:message</small><br>') !!}
                <br>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection