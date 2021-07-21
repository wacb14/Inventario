@extends('layout')
@section('title')
    Inventario | Nuevo movimiento
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">NUEVO MOVIMIENTO</h1><br>
</div>
<div class="content">
    <form action="{{route('movimientos.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <label>
                    ID Movimiento<br>
                    <input type="text" name="idmovimiento" value="{{$ID}}" disabled class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br><br>
                <label>
                    Codigo patrimonial bien
                    <input type="text" id="cod_patrimonial" name="cod_patrimonial" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>                
                {!! $errors->first('cod_patrimonial','<small class="msg_error">:message</small><br>') !!}
                <label>
                    Nombre bien
                    <input type="text" id="nombre_bien" name="nombre_bien" disabled class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <label>
                    Fecha <br>
                    <input type="date" name="fecha" value="{{old('fecha')}}" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('fecha','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Servicio de destino<br>
                    <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->idservicio}}">{{$servicio->idservicio."-".$servicio->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Motivo <br>
                    <textarea name="motivo" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('motivo')}}</textarea>
                </label> <br>
                {!! $errors->first('motivo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Observaciones <br>
                    <textarea name="observaciones" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('observaciones')}}</textarea>
                </label> <br>
                {!! $errors->first('observaciones','<small class="msg_error">:message</small><br>') !!}
                <br>    
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection