<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Inventario | Editar contraseña</title>
    <!-- Tailwind CSS Link -->    
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="{{URL::asset('js/nav-menu.js')}}"></script>
    <script src="https://kit.fontawesome.com/89b8204556.js" crossorigin="anonymous"></script>
  </head>
  <body background="{{asset('img/sicuanii.jpg')}}">
    @include('partials/nav')
    @include('partials/status')
    @include('partials/user-info')

    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg" id="form_registro">
        <h1 class="text-2xl text-center font-bold">CAMBIAR CONTRASEÑA</h1>

        <form action="{{route('passwords.update',$user)}}" class="mt-4" method="POST">
            @csrf @method('PATCH')

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Usuario" name="usuario" value="{{$user->usuario}}" disabled>
            {!! $errors->first('usuario','<small class="msg_error">:message</small><br>') !!}

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nueva contraseña" name="password">
            {!! $errors->first('password','<small class="msg_error">:message</small><br>') !!}

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg 
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar contraseña" name="password_confirmation">
            {!! $errors->first('password_confirmation','<small class="msg_error">:message</small><br>') !!}
            
            <button type="submit" class="rounded-md bg-blue-500 w-full text-lg text-white font-semihold 
            p-2 my-3 hover:bg-blue-600">Actualizar</button>
        </form>
    </div>
  </body>
</html>