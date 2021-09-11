@extends('layout')
@section('title')
    Inventario | Editar bien
@endsection
@section('content')
<div class="content">
    <form action="{{route('bienes.update',$bien)}}" method="POST">
    <div class="form">
        <div class="form">
            <div class="form-center-double">
                <h1 class="text-2xl text-center font-bold">EDITAR BIEN</h1><hr><br>
            </div>        
            <div class="form">
                @csrf @method('PATCH')
                <div class="form-left">
                    <div style="text-align: start">
                        <small class="msg_error">Campos obligatorios *</small><br>
                    </div>
                    <label>
                        <input type="hidden" name="idbien" value={{old('idbien', $bien->idbien)}} disabled 
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label>
                    <label>
                        Servicio <span class="msg_error">*</span><br>
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
                        Código Patrimonial <span class="msg_error">*</span><br>
                        <input type="number" name="cod_patrimonial" value="{{old('cod_patrimonial',$bien->cod_patrimonial)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('cod_patrimonial','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Procedencia <span class="msg_error">*</span><br>
                        <input type="text" name="procedencia" value="{{old('procedencia',$bien->procedencia)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('procedencia','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Nombre <span class="msg_error">*</span><br>
                        <input type="text" name="nombre" value="{{old('nombre',$bien->nombre)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('nombre','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Cantidad <span class="msg_error">*</span><br>
                        <input type="number" name="cantidad" value="{{old('cantidad',$bien->cantidad)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('cantidad','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Marca <span class="msg_error">*</span><br>
                        <input type="text" name="marca" value="{{old('marca',$bien->marca)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('marca','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Modelo <span class="msg_error">*</span><br>
                        <input type="text" name="modelo" value="{{old('modelo',$bien->modelo)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('modelo','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Número de serie <span class="msg_error">*</span><br>
                        <input type="text" name="num_serie" value="{{old('num_serie',$bien->num_serie)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('num_serie','<small class="msg_error">:message</small><br>') !!}
                    <br>
                </div>
                <div class="form-right"> 
                    <label>
                        Color <span class="msg_error">*</span><br>
                        <input type="text" name="color" value="{{old('color',$bien->color)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('color','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Medidas <span class="msg_error">*</span><br>
                        <input type="text" name="medidas" value="{{old('medidas',$bien->medidas)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('medidas','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Estado de conservación <span class="msg_error">*</span><br>
                        <input type="text" name="estado_conservacion" value="{{old('estado_conservacion',$bien->estado_conservacion)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('estado_conservacion','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Estado <span class="msg_error">*</span><br>
                        <select name="estado" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2 focus:bg-white">
                            <option value="FUNCIONAL" @if($bien->estado=="FUNCIONAL") {{'selected'}} @endif>FUNCIONAL</option>
                            <option value="BAJA" @if($bien->estado=="BAJA") {{'selected'}} @endif>BAJA</option>
                        </select>
                    </label> <br>
                    {!! $errors->first('estado','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Observación <span class="msg_error">*</span><br>
                        <textarea name="observacion" cols="25" rows="3" class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2  focus:bg-white">{{old('observacion',$bien->observacion)}}</textarea>
                    </label> <br>
                    {!! $errors->first('observacion','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Fecha de adquisición <span class="msg_error">*</span><br>
                        <input type="date" name="fecha_adquisicion" value="{{old('fecha_adquisicion',$bien->fecha_adquisicion)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                    </label> <br>
                    {!! $errors->first('fecha_adquisicion','<small class="msg_error">:message</small><br>') !!}
                    <br>
                    <label>
                        Fecha de último inventariado <span class="msg_error">*</span><br>
                        <input type="date" name="fecha_ult_inventario" value="{{old('fecha_ult_inventario', $bien->fecha_ult_inventario)}}"
                        class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm 
                        placeholder-gray-900 p-2  focus:bg-white">
                    </label> <br>
                    {!! $errors->first('fecha_ult_inventario','<small class="msg_error">:message</small><br>') !!}
                </div>
            </div>
        </div>
        <div class="form-center-double-button">
            <button class="btn btn-primary">Actualizar</button>
        </div>
</div>
    </form>
</div>
@endsection