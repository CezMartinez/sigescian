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

            <!-- <div class="profile_details_left"><!--notifications of menu start -->
            <!--    <ul class="nofitications-dropdown">
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="notification_header">
                                    <h3>You have 3 new notification</h3>
                                </div>
                            </li>
                            <li><a href="#">
                                    <div class="user_img"><img src="/images/p5.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li class="odd"><a href="#">
                                    <div class="user_img"><img src="/images/p6.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li><a href="#">
                                    <div class="user_img"><img src="/images/p7.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>Lorem ipsum dolor</p>
                                        <p><span>1 hour ago</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a></li>
                            <li>
                                <div class="notification_bottom">
                                    <a href="#">See all notifications</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <!--notification menu end -->
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
                            <li> <a href="/profile"><i class="fa fa-user"></i>Cambiar Contraseña</a> </li>
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

