<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a> </div>
    <div class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="/listaMaestra"><i class="fa fa-home nav_icon" ></i><span>Lista Maestra</span></a></li>
            @if($user->canSeeIf(['ver-procedimientos-generales','ver-procedimientos-tecnicos']))
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-list nav_icon"></i><span>Procedimientos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    @if($user->canSeeIf(['ver-procedimientos-generales']))
                        <li id="menu-mensagens" style="width:130px" ><a href="/procedimientos/administrativos">Administrativos</a></li>
                    @endif
                    @if($user->canSeeIf(['ver-procedimientos-tecnicos']))
                        <li id="menu-mensagens" style="width:130px"><a href="/procedimientos/tecnicos">Tecnicos</a></li>
                    @endif
                </ul>
            </li>
            @endif

            <li id="menu-academico" >
                <a href="#"><i class="fa fa-file-text"></i><span>Documentos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-procedimientos" ><a href="/documentos/procedimiento">Procedimientos</a></li>
                    <li id="menu-academico-boletim" ><a href="/documentos/anexos">Anexos</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="/documentos/flujograma">Flujogramas</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="/documentos/formatos">Formatos</a></li>
                </ul>
            </li>
            @if($user->canSeeIf(['ver-clientes']))
            <li><a href="/clientes"><i class="fa fa-users"></i><span>Clientes</span></a></li>
            @endif
            @if($user->canSeeIf(['ver-solicitudes']))
                <li><a href="/servicios"><i class="fa fa-inbox"></i><span>Solicitudes</span></a></li>
            @endif
            @if($user->canSeeIf(['ver-departamentos','ver-laboratorios','ver-equipos','ver-materiales']))
            <li><a href="#"><i class="fa fa-files-o"></i><span>Catalogos</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul>
                    @if($user->canSeeIf(['ver-departamentos']))
                        <li><a href="/departamentos">Departamentos</a></li>
                    @endif
                    @if($user->canSeeIf(['ver-laboratorios']))
                        <li><a href="/laboratorios">Laboratorios</a></li>
                    @endif
                    @if($user->canSeeIf(['ver-equipos']))
                        <li><a href="/equipos">Equipos</a></li>
                    @endif
                    @if($user->canSeeIf(['ver-materiales']))
                        <li><a href="/materiales">Materiales</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($user->canSeeIf(['ver-usuarios','ver-roles']))
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-user nav_icon"></i><span>Administracion</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    @if($user->canSeeIf(['ver-usuarios']))
                        <li id="menu-mensagens" style="width: 120px" ><a href="/administracion/usuarios">Usuarios</a></li>
                    @endif
                    @if($user->canSeeIf(['ver-roles']))
                        <li id="menu-arquivos" ><a href="/administracion/roles">Roles</a></li>
                    @endif
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
<div class="clearfix"> </div>