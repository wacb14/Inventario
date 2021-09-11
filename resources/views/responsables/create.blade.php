@extends('layout')
@section('title')
    Inventario | Nuevo responsable
@endsection
@section('content')
<div class="content">
    <form action="{{route('responsables.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <h1 class="text-2xl text-center font-bold">NUEVO RESPONSABLE</h1><hr><br>
                <div style="text-align: start">
                    <small class="msg_error">Campos obligatorios *</small><br>
                </div>
                <label>
                    <input type="hidden" name="idresponsable" value="{{$ID}}" disabled
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <label>
                    Nombres <span class="msg_error">*</span><br>
                    <input type="text" name="nombres" value="{{old('nombres')}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombres','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Apellidos <span class="msg_error">*</span><br>
                    <input type="text" name="apellidos" value="{{old('apellidos')}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('apellidos','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cargo <span class="msg_error">*</span><br>
                    <input type="text" name="cargo" value="{{old('cargo')}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('cargo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modalidad <span class="msg_error">*</span><br>
                    <input type="text" name="modalidad" value="{{old('modalidad')}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('modalidad','<small class="msg_error">:message</small><br>') !!}
                <br>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection