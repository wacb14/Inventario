@extends('layout')
@section('title')
    Inventario | Editar responsable
@endsection
@section('content')
<div class="content">
    <div class="title-form">
        <h1>Editar responsable</h1><br>
    </div>
    <form action="{{route('responsables.update', $responsable)}}" method="POST">
        <div class="form">
            @csrf @method('PATCH')
            <div class="form-center">
                <label>
                    ID Responsable<br>
                    <input type="text" name="idresponsable" value="{{old('idresponsable',$responsable->idresponsable)}}" disabled>
                </label>
                <br>
                <label>
                    Nombres <br>
                    <input type="text" name="nombres" value="{{old('nombres',$responsable->nombres)}}">
                </label> <br>
                {!! $errors->first('nombres','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Apellidos <br>
                    <input type="text" name="apellidos" value="{{old('apellidos',$responsable->apellidos)}}">
                </label> <br>
                {!! $errors->first('apellidos','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cargo <br>
                    <input type="text" name="cargo" value="{{old('cargo',$responsable->cargo)}}">
                </label> <br>
                {!! $errors->first('cargo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modalidad <br>
                    <input type="text" name="modalidad" value="{{old('modalidad',$responsable->modalidad)}}">
                </label> <br>
                {!! $errors->first('modalidad','<small class="msg_error">:message</small><br>') !!}
                <br>
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection