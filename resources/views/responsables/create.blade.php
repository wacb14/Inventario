@extends('layout')
@section('title')
    Inventario | Nuevo responsable
@endsection
@section('content')
<div class="title-form">
    <h1>AGREGAR NUEVO RESPONSABLE</h1><br>
</div>
<div class="content">
    <form action="{{route('responsables.store')}}" method="POST">
        <div class="form">
            @csrf
            <div class="form-center">
                <label>
                    ID Responsable<br>
                    <input type="text" name="idresponsable" value="{{$ID}}" disabled>
                </label>
                <br>
                <label>
                    Nombres <br>
                    <input type="text" name="nombres" value="{{old('nombres')}}">
                </label> <br>
                {!! $errors->first('nombres','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Apellidos <br>
                    <input type="text" name="apellidos" value="{{old('apellidos')}}">
                </label> <br>
                {!! $errors->first('apellidos','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Cargo <br>
                    <input type="text" name="cargo" value="{{old('cargo')}}">
                </label> <br>
                {!! $errors->first('cargo','<small class="msg_error">:message</small><br>') !!}
                <br>
                <label>
                    Modalidad <br>
                    <input type="text" name="modalidad" value="{{old('modalidad')}}">
                </label> <br>
                {!! $errors->first('modalidad','<small class="msg_error">:message</small><br>') !!}
                <br>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection