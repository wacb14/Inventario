<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <title>Inventario</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="{{URL::asset('js/nav-menu.js')}}"></script>
    <script src="https://kit.fontawesome.com/89b8204556.js" crossorigin="anonymous"></script>
  </head>
  <body background="{{asset('img/sicuanii.jpg')}}">
    <header class="header">
        <nav class="nav">
            <a href="{{route('home')}}" class="logo nav-link">INVENTARIO</a>
            <button class="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu" style="align-self: flex-end;">
                <li class="nav-menu-item"><a class="nav-menu-link{{setActive('login.*')}} nav-link" href="{{route('login.index')}}">Ingresar</a></li>
                <li class="nav-menu-item"><a class="nav-menu-link{{setActive('register.*')}} nav-link" href="{{route('register.index')}}">Registrarse</a></li>
            </ul>
        </nav>
    </header>
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg">
        <h1 class="text-3x1 text-center font-bold">REGISTRO DE USUARIO</h1>
        <form action="{{route('register.store')}}" class="mt-4" method="POST">
          @csrf
          <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombres" id="nombres" name="nombres" value="{{old('nombres')}}">
          {!! $errors->first('nombres','<small class="msg_error">:message</small><br>') !!}
          
          <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Apellidos" id="apellidos" name="apellidos" value="{{old('apellidos')}}">
          {!! $errors->first('apellidos','<small class="msg_error">:message</small><br>') !!}

          <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Usuario" id="usuario" name="usuario" value="{{old('usuario')}}">
          {!! $errors->first('usuario','<small class="msg_error">:message</small><br>') !!}

          <select name="tipo_usuario" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white">
            <option value="ADMINISTRADOR" {{old('tipo_usuario')=="ADMINISTRADOR"?'selected':' '}}>Administrador</option>
            <option value="COMUN" {{old('tipo_usuario')=="COMUN"?'selected':' '}}>Común</option>
          </select>
          {!! $errors->first('tipo_usuario','<small class="msg_error">:message</small><br>') !!}
          
          <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="contrasenia" name="contrasenia">
          {!! $errors->first('contrasenia','<small class="msg_error">:message</small><br>') !!}

          <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar contraseña" id="contrasenia" name="contrasenia_confirmation">
          {!! $errors->first('contrasenia_confirmation','<small class="msg_error">:message</small><br>') !!}

          <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*Error</p>
          
          <button type="submit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semihold 
          p-2 my-3 hover:bg-blue-600">Registrar</button>
        </form>
    </div>
  </body>
</html>