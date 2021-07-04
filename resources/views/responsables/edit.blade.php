@extends('layout')
@section('title')
    Inventario | Editar responsable
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1 class="text-2xl text-center font-bold">EDITAR RESPONSABLE</h1><br>
    </div>
    <form action="{{route('responsables.update', $responsable)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-center">
                <label>
                    ID Responsable<br>
                    <input type="text" name="idresponsable" value="{{old('idresponsable',$responsable->idresponsable)}}" disabled
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label>
                <br>
                <label>
                    Nombres <br>
                    <input type="text" name="nombres" value="{{old('nombres',$responsable->nombres)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('nombres','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Apellidos <br>
                    <input type="text" name="apellidos" value="{{old('apellidos',$responsable->apellidos)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('apellidos','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cargo <br>
                    <input type="text" name="cargo" value="{{old('cargo',$responsable->cargo)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('cargo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modalidad <br>
                    <input type="text" name="modalidad" value="{{old('modalidad',$responsable->modalidad)}}"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full text-sm placeholder-gray-900 p-2 focus:bg-white">
                </label> <br>
                {!! $errors->first('modalidad','<small class="msg_error">:message</small><br>') !!}
                <br>
            </div>
        </div>
        <div class="form-center_button">
            <button class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection