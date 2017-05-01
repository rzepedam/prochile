<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img src="{{ auth()->user()->assistance->photo }}" class="img-circle img-md">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ auth()->user()->name }}</strong>
                            </span>
                            <span class="text-muted text-xs block">
                                {{ auth()->user()->assistance->position->name }} <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="javascript:void(0)">Editar Perfil</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img style="width: 30px; height: 15px;" src="/img/prochile.svg" alt="">
                </div>
            </li>
            <li class="{{ (Request::is('/') ? 'active' : '') }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> <span class="nav-label">Inicio</span>
                </a>
            </li>
            <li class="{{ (Request::is('assistances') ? 'active' : '') }}">
                <a href="{{ url('/assistances') }}">
                    <i class="fa fa-users"></i> <span class="nav-label">Asistentes</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:void(0)">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="nav-label">Registro de Asistencia</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
