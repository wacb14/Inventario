@extends('layout')
@section('title')
    Inventario | Nuevo movimiento
@endsection
@section('content')
<div class="title-form">
    <h1>Nuevo movimiento</h1><br>
</div>
<div class="content">
    <form action="{{route('movimientos.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <label>
                    ID Movimiento<br>
                    <input type="text" name="idmovimiento" value="{{$ID}}" disabled>
                </label>
                <br>
                <label>
                    Bien <br>
                    <select name="idbien">
                        @foreach ($bienes as $bien)
                            <option value="{{$bien->idbien}}">{{$bien->idbien."-".$bien->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idbien','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha <br>
                    <input type="date" name="fecha" value="{{old('fecha')}}">
                </label> <br>
                {!! $errors->first('fecha','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Servicio <br> 
                    <select name="idservicio">
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->idservicio}}">{{$servicio->idservicio."-".$servicio->nombre}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idservicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Motivo <br>
                    <input type="text" name="motivo" value="{{old('motivo')}}">
                </label> <br>
                {!! $errors->first('motivo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Observaciones <br>
                    <input type="text" name="observaciones" value="{{old('observaciones')}}">
                </label> <br>
                {!! $errors->first('observaciones','<small class="msg_error">:message</small><br>') !!}
                <br>       
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection