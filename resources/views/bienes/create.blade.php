@extends('layout')
@section('title')
    Nuevo bien
@endsection
@section('content')
<div class="title-form">
    <h1>AGREGAR NUEVO BIEN</h1><br>
</div>
<div class="content">
    <form action="{{route('bienes.store')}}" method="POST">
        <div class="form">
            @csrf        
            <div class="form-left">
                <label>
                    ID Bien<br>
                    <input type="text" name="idbien" value="{{$ID}}" disabled>
                </label>
                <br>
                <label>
                    Servicio<br>
                    <select name="idservicio">
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->idservicio}}">{{$servicio->idservicio."-".$servicio->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Código Patrimonial <br>
                    <input type="number" name="cod_patrimonial" value="{{old('cod_patrimonial')}}" min="1" pattern="^[0-9]+">
                </label> <br>
                {!! $errors->first('cod_patrimonial','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Procedencia <br>
                    <input type="text" name="procedencia" value="{{old('procedencia')}}">
                </label> <br>
                {!! $errors->first('procedencia','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre')}}">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cantidad <br>
                    <input type="number" name="cantidad" value="{{old('cantidad')}}" min="1" pattern="^[0-9]+">
                </label> <br>
                {!! $errors->first('cantidad','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Marca <br>
                    <input type="text" name="marca" value="{{old('marca')}}">
                </label> <br>
                {!! $errors->first('marca','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modelo <br>
                    <input type="text" name="modelo" value="{{old('modelo')}}">
                </label> <br>
                {!! $errors->first('modelo','<small class="msg_error">:message</small><br>') !!}
                <br>
            </div>
            
            <div class="form-right">
                <label>
                    Número de serie <br>
                    <input type="text" name="num_serie" value="{{old('num_serie')}}">
                </label> <br>
                {!! $errors->first('num_serie','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Color <br>
                    <input type="text" name="color" value="{{old('color')}}">
                </label> <br>
                {!! $errors->first('color','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Medidas <br>
                    <input type="text" name="medidas" value="{{old('medidas')}}">
                </label> <br>
                {!! $errors->first('medidas','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Estado de conservación <br>
                    <input type="text" name="estado_conservacion" value="{{old('estado_conservacion')}}">
                </label> <br>
                {!! $errors->first('estado_conservacion','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Estado <br>
                    <input type="text" name="estado" value="{{old('estado')}}">
                </label> <br>
                {!! $errors->first('estado','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Observacion <br>
                    <input type="text" name="observacion" value="{{old('observacion')}}">
                </label> <br>
                {!! $errors->first('observacion','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha de adquisición <br>
                    <input type="date" name="fecha_adquisicion" value="{{old('fecha_adquisicion')}}">
                </label> <br>
                {!! $errors->first('fecha_adquisicion','<small class="msg_error">:message</small><br>') !!}
            </div>
        </div>
        <div class="form-center">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection