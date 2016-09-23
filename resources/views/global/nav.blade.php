<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a> </div>
    <div class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="#"><i class="fa fa-home nav_icon" ></i><span>Inicio</span></a></li>

            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-list nav_icon"></i><span>Procedimientos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-mensagens" style="width:130px" ><a href="/procedimientos/administrativos">Administrativos</a></li>
                    <li id="menu-mensagens" style="width:130px"><a href="/procedimientos/tecnicos">Tecnicos</a></li>
                </ul>
            </li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Documentos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-boletim" ><a href="#">Anexos</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="#">Flujogramas</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="#">Formatos</a></li>
                </ul>
            </li>
            @can('ver-clientes')
            <li><a href="/clientes"><i class="fa fa-users"></i><span>Clientes</span></a></li>
            @endcan
            <li><a href="#"><i class="fa fa-inbox"></i><span>Solicitudes</span></a></li>
            @if($user->canSeeCatalog())
            <li><a href="#"><i class="fa fa-files-o"></i><span>Catalogos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul>
                    @can('ver-departamentos')
                    <li><a href="/departamentos">Departamentos</a></li>
                    @endcan
                    @can('ver-laboratorios')
                    <li><a href="/laboratorios">Laboratorios</a></li>
                    @endcan
                    @can('ver-equipos')
                    <li><a href="/equipos">Equipos</a></li>
                    @endcan
                    @can('ver-materiales')
                    <li><a href="/materiales">Materiales</a></li>
                    @endcan
                </ul>
            </li>
            @endif
            @if($user->canSeeAdmin())
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-user nav_icon"></i><span>Administracion</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    @can('ver-usuarios')
                    <li id="menu-mensagens" style="width: 120px" ><a href="/administracion/usuarios">Usuarios</a></li>
                    @endcan
                    @can('ver-roles')
                    <li id="menu-arquivos" ><a href="/administracion/roles">Roles</a></li>
                    @endcan
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
<div class="clearfix"> </div>