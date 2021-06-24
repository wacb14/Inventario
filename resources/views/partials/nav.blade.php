<header class="header">
    <nav class="nav">
        <a href="{{route('home')}}" class="logo nav-link">INVENTARIO</a>
        <button class="nav-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
            <li class="nav-menu-item"><a class="nav-menu-link{{setActive('bienes.*')}} nav-link" href="{{route('bienes.index')}}">Bienes</a></li>
            <li class="nav-menu-item"><a class="nav-menu-link{{setActive('movimientos.*')}} nav-link" href="{{route('movimientos.index')}}">Movimientos</a></li>
            <li class="nav-menu-item"><a class="nav-menu-link{{setActive('responsables.*')}} nav-link" href="{{route('responsables.index')}}">Responsables</a></li>
            <li class="nav-menu-item"><a class="nav-menu-link{{setActive('servicios.*')}} nav-link" href="{{route('servicios.index')}}">Servicios</a></li>
        </ul>
    </nav>
</header>