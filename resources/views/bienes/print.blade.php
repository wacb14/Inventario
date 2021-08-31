<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Imprimir</title>
    <style>
        th{
            color: black;
            text-align: center;
        }
        table{
            border-color: black;
        }
        .border-color{
            border-color: black;
        }
        .fecha{
            text-align: end;
        }
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 70px;

            /** Extra personal styles **/
            background-color: #0e71e2;
            color: white;
            text-align: center;
            line-height: 35px;
            padding-left: 200px;
            padding-right: 70px;
        }

        footer {
            position: fixed; 
            bottom: 0px; 
            left: 0px; 
            right: 0px;
            height: 35px;

            /** Extra personal styles **/
            background-color: #0e71e2;
            color: white;
            text-align: end;
            line-height: 35px;
            padding-right: 50px;
            padding-left: 200px;
        }
        .cabecera{
            display: flex;
        }
        .logo{
            position: fixed;
            top: 0px;
            left: 100px;
            height: 70px;
        }
    </style>
</head>
<body>
    <header>
        <div class="cabecera">
            <img src="{{asset('img/login.png')}}" width="70px" class="logo">
            <div class="titulo">
                <div class="encabezado">HOSPITAL ALFREDO CALLO RODRIGUEZ <br> SICUANI</div>
                <hr>
            </div>
        </div>
    </header>

    <h1 class="text-2xl text-center font-bold">LISTA DE BIENES</h1><br>
    <p class="fecha"><?php echo "Fecha: ".date("Y-m-d");?></p>
    <br>
    <div class="list">
        @isset($bienes)
            <table class=" table-list table table-bordered">
                <tr>
                    <th class="border-1 border-color">ID BIEN</th>
                    <th class="border-1 border-color">NOMBRE</th>
                    <th class="border-1 border-color">SERVICIO</th>
                    <th class="border-1 border-color">C. PATRIMONIAL</th>
                </tr>
                @foreach ($bienes as $bien)
                    <tr>
                        <td class="border-1 border-color">{{$bien->idbien}}</a></td>
                        <td class="border-1 border-color">{{$bien->nombre}}</a></td>
                        <td class="border-1 border-color">{{$bien->servicio}}</a></td>
                        <td class="border-1 border-color">{{$bien->cod_patrimonial}}</a></td>
                    </tr>
                @endforeach
            </table>
        @else
        No existen bienes aun para mostrar
        @endisset
    </div>
    <footer>
        <div>Av. Manuel Callo Zevallos Nro. 519 - Cusco - Canchis - Sicuani</div>
    </footer>
</body>
</html>