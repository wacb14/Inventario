@extends('layout')
@section('title')
    Inventario | Editar bien
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">EDITAR BIEN</h1><br>
</div>
<div class="content">
    <form action="{{route('bienes.update',$bien)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-left">
                <label>
                    ID Bien<br>
                    <input type="text" name="idbien" value={{old('idbien',$bien->idbien)}} disabled 
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br>
                <label>
                    Servicio <br>
                    <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->idservicio}}" @if($bien->idservicio==$servicio->idservicio) {{'selected'}} @endif>{{$servicio->idservicio."-".$servicio->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Código Patrimonial <br>
                    <input type="number" name="cod_patrimonial" value="{{old('cod_patrimonial',$bien->cod_patrimonial)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('cod_patrimonial','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Procedencia <br>
                    <input type="text" name="procedencia" value="{{old('procedencia',$bien->procedencia)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('procedencia','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre',$bien->nombre)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cantidad <br>
                    <input type="number" name="cantidad" value="{{old('cantidad',$bien->cantidad)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('cantidad','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Marca <br>
                    <input type="text" name="marca" value="{{old('marca',$bien->marca)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('marca','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modelo <br>
                    <input type="text" name="modelo" value="{{old('modelo',$bien->modelo)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('modelo','<small class="msg_error">:message</small><br>') !!}
                <br>
            </div>
            <div class="form-right">    
                <label>
                    Número de serie <br>
                    <input type="text" name="num_serie" value="{{old('num_serie',$bien->num_serie)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('num_serie','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Color <br>
                    <input type="text" name="color" value="{{old('color',$bien->color)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('color','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Medidas <br>
                    <input type="text" name="medidas" value="{{old('medidas',$bien->medidas)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('medidas','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Estado de conservación <br>
                    <input type="text" name="estado_conservacion" value="{{old('estado_conservacion',$bien->estado_conservacion)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('estado_conservacion','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Estado <br>
                    <input type="text" name="estado" value="{{old('estado',$bien->estado)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('estado','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Observación <br>
                    <textarea name="observacion" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2  focus:bg-white">{{old('observacion',$bien->observacion)}}</textarea>
                </label> <br>
                {!! $errors->first('observacion','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha de adquisición <br>
                    <input type="date" name="fecha_adquisicion" value="{{old('fecha_adquisicion',$bien->fecha_adquisicion)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('fecha_adquisicion','<small class="msg_error">:message</small><br>') !!}
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection