@extends('layout')
@section('title')
    Inventario | Editar movimiento
@endsection
@section('content')
<div class="title-form">
    <h1 class="text-2xl text-center font-bold">EDITAR MOVIMIENTO</h1><br>
</div>
<div class="content">
    <form action="{{route('movimientos.update', $movimiento)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-center">
                <label>
                    ID Movimiento<br>
                    <input type="text" name="idmovimiento" value={{old('idmovimiento',$movimiento->idmovimiento)}} disabled
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br>
                <label>
                    Bien <br>
                    <select name="idbien" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($bienes as $bien)
                            <option value="{{$bien->idbien}}">{{$bien->idbien."-".$bien->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idbien','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha <br>
                    <input type="date" name="fecha" value="{{old('fecha',$movimiento->fecha)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('fecha','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Servicio de destino<br> 
                    <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->idservicio}}" @if($servicio->idservicio==$movimiento->idservicio) {{'selected'}} @endif>{{$servicio->idservicio."-".$servicio->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Motivo <br>
                    <textarea name="motivo" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('motivo',$movimiento->motivo)}}</textarea>
                </label> <br>
                {!! $errors->first('motivo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Observaciones <br>
                    <textarea name="observaciones" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('observaciones',$movimiento->observaciones)}}</textarea>
                </label> <br>
                {!! $errors->first('observaciones','<small class="msg_error">:message</small><br>') !!}
                <br>
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Actualizar</button>
        </div>
        
    </form>
</div>
@endsection