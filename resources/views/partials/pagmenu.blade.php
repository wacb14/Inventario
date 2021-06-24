<nav>
    @if ($nroPaginas<=10) {{-- Paginacion de menos de 10 pag o menos--}}
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag>1?$pag-1:$pag}}">Anterior</a></li>
        @for ($i = 1; $i <= $nroPaginas; $i++)
            <li class="page-item {{$pag==$i?' active':''}}"><a class="page-link" href="{{request()->url()}}?page={{$i}}">{{$i}}</a></li>
        @endfor
            <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag<$nroPaginas?$pag+1:$pag}}">Siguiente</a></li>
        </ul>        
    @else {{-- Paginacion de mas de 10 pag--}}
        @if ($pag<=5) {{-- Paginacion al inicio --}}
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag>1?$pag-1:$pag}}">Anterior</a></li>
                <?php $limitpag=$pag+4 ?>
                @for ($i = 1; $i <= 6; $i++)
                    <li class="page-item {{$pag==$i?' active':''}}"><a class="page-link" href="{{request()->url()}}?page={{$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$nroPaginas}}">{{$nroPaginas}}</a></li>
                <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag<$nroPaginas?$pag+1:$pag}}">Siguiente</a></li>
            </ul>
        @else {{-- Paginacion al final --}}
            @if ($pag>=$nroPaginas-4)
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag>1?$pag-1:$pag}}">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <?php $limitpag=$nroPaginas?>
                    @for ($i = $nroPaginas-5; $i <= $limitpag; $i++)
                        <li class="page-item {{$pag==$i?' active':''}}"><a class="page-link" href="{{request()->url()}}?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag<$nroPaginas?$pag+1:$pag}}">Siguiente</a></li>
                </ul> 
            @else {{-- Paginacion intermedia --}}
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag>1?$pag-1:$pag}}">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <?php $limitpag=($nroPaginas-$pag)>4?$pag+4:$nroPaginas ?>
                    @for ($i = $pag-1; $i <= $limitpag; $i++)
                        <li class="page-item {{$pag==$i?' active':''}}"><a class="page-link" href="{{request()->url()}}?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$nroPaginas}}">{{$nroPaginas}}</a></li>
                    <li class="page-item"><a class="page-link" href="{{request()->url()}}?page={{$pag<$nroPaginas?$pag+1:$pag}}">Siguiente</a></li>
                </ul>                
            @endif
        @endif
    @endif
</nav>