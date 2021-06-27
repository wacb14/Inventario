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
          <li class="nav-menu-item"><a class="nav-menu-link{{setActive('bienes.*')}} nav-link" href="{{route('bienes.index')}}">Bienes</a></li>
          <li class="nav-menu-item"><a class="nav-menu-link{{setActive('movimientos.*')}} nav-link" href="{{route('movimientos.index')}}">Movimientos</a></li>
          <li class="nav-menu-item"><a class="nav-menu-link{{setActive('responsables.*')}} nav-link" href="{{route('responsables.index')}}">Responsables</a></li>
          <li class="nav-menu-item"><a class="nav-menu-link{{setActive('servicios.*')}} nav-link" href="{{route('servicios.index')}}">Servicios</a></li>
          @if(auth()->check())
            @if(auth()->user()->tipo_usuario == 'ADMINISTRADOR')
              <li class="nav-menu-item"><a class="nav-menu-link{{setActive('register.*')}} nav-link" href="{{route('register.index')}}">Registrarse</a></li>
            @endif
          @endif
        </ul>
      </nav>
    </header>
    @include('partials/status')
    @if(auth()->check())
      <div class="user-info">
        Bienvenid@ {{auth()->user()->nombres}} <br>
        <a href="{{route('login.destroy')}}"> Cerrar sesión </a>
      </div>
    @else
      <div class="user-info">
        <a href="{{route('login.index')}}"> Iniciar sesión </a>
      </div>
    @endif
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
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="password" name="password">
          {!! $errors->first('password','<small class="msg_error">:message</small><br>') !!}

          <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
          placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar contraseña" id="password" name="password_confirmation">
          {!! $errors->first('password_confirmation','<small class="msg_error">:message</small><br>') !!}

          <button type="submit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semihold 
          p-2 my-3 hover:bg-blue-600">Registrar</button>
        </form>
    </div>
  </body>
</html>