@if(auth()->check())
    <div class="user-info">
        <div class="user-info-box">
            Bienvenid@ {{auth()->user()->nombres}} <br>
            <a href="{{route('login.destroy')}}" class="link"> Cerrar sesión </a>
        </div>
    </div>
@else 
    <div class="user-info">
        <div class="user-info-box">
            <a href="{{route('login.create')}}" class="link"> Iniciar sesión </a>
        </div>
    </div>
@endif