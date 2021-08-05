@extends('layout')
@section('title')
    Inventario | Modificar servicio
@endsection
@section('content')
<div class="content">
    <form action="{{route('servicios.update',$servicio->idservicio)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-center">
                <h1 class="text-2xl text-center font-bold">EDITAR SERVICIO</h1><hr><br>
                <label>
                    <input type="hidden" name="idservicio" value="{{old('idservicio',$servicio->idservicio)}}" readonly class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <label>
                    Nombre <br>
                    <input type="text" name="nombre" value="{{old('nombre',$servicio->nombre)}}" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    <input type="checkbox" value="si" name="nuevo_responsable" onchange="nuevoResponsable(this.checked);"> Nuevo responsable?
                </label>
                <br><br>
                <label>
                    Responsable <br>
                    <select id="idresponsable" name="idresponsable" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white" disabled>
                        @foreach ($responsables as $responsable)
                            <option value="{{$responsable->idresponsable}}" @if($servicio->idresponsable==$responsable->idresponsable) {{'selected'}}@endif>{{$responsable->idresponsable." - ".$responsable->nombres." ".$responsable->apellidos}}</option>
                        @endforeach
                    </select>
                </label> <br>
                {!! $errors->first('idresponsable','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Fecha de inicio del responsable<br>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio',$detalle->fecha_inicio)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white" disabled>
                </label> <br>
                {!! $errors->first('fecha_inicio','<small class="msg_error">:message</small><br>') !!}
                <br>
                <button class="btn btn-primary" onclick="nuevoResponsable(true);">Guardar</button> {{-- Liberamos las cajas de texto para que se desbloqueen y se envien --}}
            </div>
        </div>
    </form>
</div>
@endsection