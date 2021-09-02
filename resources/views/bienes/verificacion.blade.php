@extends('layout')
@section('title')
    Verificación de bienes
@endsection
@section('content')
<div class="container"></div>
    <div class="row">
        <h1 class="text-2xl text-center font-bold">VERIFICACIÓN DE BIENES</h1>
    </div>
    <br>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-4">
            <form action="" method="GET">
                <select name="idservicio" class="border border-gray-200 rounded-md bg-gray-200 text-sm 
                placeholder-gray-900 p-2 focus:bg-white center-input" onchange="this.form.submit()">
                    @foreach ($servicios as $servicio)
                        <option value="{{$servicio->idservicio}}" @if($servicio->nombre==$servicio_list) {{' selected'}} @endif>{{$servicio->idservicio." - ".$servicio->nombre}}</option>
                    @endforeach
                </select>
            </form>         
        </div>
        <div class="col-sm-4 col-md-6 col-lg-5">
            <div class="row justify-content-center align-items-center">
                <div class="col alineado-end">
                    <input id="valor_busqueda" name="codigo" type="search">
                </div>
                <div class="col-4 col-md-3">
                    <button class="btn btn-primary" onclick="marcarBien();">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center align-content-center">
        <div class="col-sm-10">
            @isset($bienes)
            <table id="tabla_verif" class="elements-table table-list table table-striped table-hover border-collapse border-separate border-2">
                <tr>
                    <th class="border-2">ID BIEN</th>
                    <th class="border-2">NOMBRE</th>
                    <th class="border-2">C. PATRIMONIAL</th>
                    <th class="border-2">PRESENTE</th>
                </tr>
                @for ($i = 0; $i < count($bienes); $i++)
                    @php
                        $bien = $bienes[$i];
                    @endphp
                    <tr id="fila-{{$i}}">
                        <td class="border-2">{{$bien->idbien}}</td>
                        <td class="border-2">{{$bien->nombre}}</td>
                        <td class="border-2">{{$bien->cod_patrimonial}}</td>
                        <td class="border-2"><input id="chkbox-{{$i}}" type="checkbox" onclick="ColorearFila({{$i}});"></td>
                    </tr>
                @endfor
            </table>
        @else
            No existen bienes aun para mostrar
        @endisset
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 text-center">
            <a class="btn btn-primary" href="{{route('bienes.print')}}?@php echo 'bienes=';@endphp">Imprimir</a>
        </div>
    </div>
</div>
@endsection