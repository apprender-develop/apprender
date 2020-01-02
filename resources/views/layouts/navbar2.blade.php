<nav class="MainNav u-textLeft u-box-sizing">

    <figure class="MainNav-Pleca">
        <span class="MainNav-Logo girar u-inline-block"></span>
    </figure>

    <p class="MainNav-TxtLogo u-inline-block"><a href="{{route('home')}}"><strong class="u-inline-block">Apprender</strong></a> <span class="u-inline-block">Plataforma de Capatación Integral</span></p>

    <a class="MainNav-BtnCerrar u-floatRight" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="MainNav-ContentPerfil u-floatRight">
        <ul class="MainNav-List u-textLeft">
            <li><a class="MainNav-ItemList u-inline-block u-box-sizing">Mi perfil</a></li>
            <li><a class="MainNav-ItemList u-inline-block u-box-sizing">Evaluaciones</a></li>
            <li><a class="MainNav-ItemList u-inline-block u-box-sizing">Progreso</a></li>
        </ul>
    </div>

    <p class="MainNav-TxtNomUsu u-floatRight"><strong>{{Auth::user()->nombreCompleto}}</strong></p>
</nav>
