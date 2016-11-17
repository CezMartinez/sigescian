<div class="header-main">
    <div class="header-left">
        <div class="logo-name">
            <a href="#"> {{--<h1>CIAN</h1>--}}
               <img id="logo" src="/images/Logo_CIAN.png" alt="Logo" width="100%"/>
            </a>
        </div>
        <div class="clearfix"> </div>
    </div>
    @if($signedIn)
        <div class="header-right">

            {!! Form::open(['method'=>'GET','url'=>'/procedimiento/buscar','class'=>'navbar-form navbar-right','role'=>'search'])  !!}

            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" style="height: 35px" placeholder="Buscar Procedimiento..." required>
                <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" style="height: 35px">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        {!! Form::close() !!}

            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <div class="user-name">
                                    <p>{{$user->full_name}}</p>
                                    <span>{{$user->roles()->first()->name}}</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="/mi-perfil"><i class="fa fa-user"></i>Cambiar Contraseña</a> </li>
                            <li><a href="/manual-de-usuario"><i class="fa fa-question-circle"></i>Manual de Usuario</a></li>
                            <li> <a href="/logout"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        @else
        <div class="header-right">
            <div class="login_link">
                <a href="/login"><i class="fa fa-user"></i> Login</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    @endif
    <div class="clearfix"> </div>
</div>

