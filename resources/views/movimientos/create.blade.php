@extends('layout')
@section('title')
    Inventario | Nuevo movimiento
@endsection
@section('content')
<div class="content">
    <form action="{{route('movimientos.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <h1 class="text-2xl text-center font-bold">NUEVO MOVIMIENTO</h1><hr><br>
                <label>
                    <input type="hidden" name="idmovimiento" value="{{$ID}}" disabled class="border border-gray-200 rounded-md bg-gray-200 text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <div class="zone">
                    <div class="zone-left">
                        C. Patrimonial
                        <br>
                        <input type="text" id="cod_patrimonial" value="{{old('cod_patrimonial')}}" name="cod_patrimonial" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2 focus:bg-white">
                        <br>                
                    </div>
                    <div class="zone-right">
                        Nombre del bien
                        <input type="text" id="nombre_bien" value="{{old('nombre_bien')}}" name="nombre_bien" readonly class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2 focus:bg-white">
                        <input type="hidden" id="idbien" name="idbien">
                    </div>
                </div>
                {!! $errors->first('idbien','<small class="msg_error">:message</small><br>') !!}
                <button id="boton" type="button" class="btn btn-primary" onclick="buscar();">Buscar</button>
                <br>
                <div class="zone">
                    <div class="half-zone">
                        Fecha <br>
                        <input type="date" name="fecha" value="{{old('fecha')}}" class="border border-gray-200 w-full rounded-md bg-gray-200 text-sm 
                        placeholder-gray-900 p-2 focus:bg-white"> <br>
                        {!! $errors->first('fecha','<small class="msg_error">:message</small><br>') !!}
                    </div>
                    <br>
                    <div class="half-zone">
                        Servicio de destino<br>
                        <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2 focus:bg-white">
                            @foreach ($servicios as $servicio)
                                <option value="{{$servicio->idservicio}}">{{$servicio->idservicio."-".$servicio->nombre}}</option>
                            @endforeach
                        </select> <br>
                        {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                    </div>
                </div>
                <label>
                    Motivo <br>
                    <textarea name="motivo" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('motivo')}}</textarea>
                </label> <br>
                {!! $errors->first('motivo','<small class="msg_error">:message</small><br>') !!}
                <label>
                    Observaciones <br>
                    <textarea name="observaciones" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                    placeholder-gray-900 p-2 focus:bg-white">{{old('observaciones')}}</textarea>
                </label> <br>
                {!! $errors->first('observaciones','<small class="msg_error">:message</small><br>') !!}
                
                <button class="btn btn-primary">Guardar</button>   
            </div>
        </div>
        <div class="form-center_button">
            
        </div>
    </form>
    
</div>
@endsection