@extends('app')
    
@section('content')

    @if(Auth::user()->canSeeIf(['crear-usuarios']))
        <a href="/administracion/usuarios/create" class="btn btn-lg btn-primary">
        Agregar un nuevo usuario
        </a>
    @endif
    <hr>

    @if($users->count() >= 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Nombre Usuario</th>
                    <th>Correo</th>
                    <th>Roles</th>
                    @if(Auth::user()->canSeeIf(['editar-usuarios','eliminar-usuarios']))
                        <th>Acciones</th>
                        @endif
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr id="row-{{$user->id}}">
                        <td>
                            {{$user->full_name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @if($user->roles()->count() > 0)
                                @foreach($user->roles as $roles)
                                    <ul>
                                        <li>
                                            {{$roles->name}}
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <p>No tiene roles asignados</p>
                            @endif
                        </td>
                        @if(Auth::user()->canSeeIf(['editar-usuarios','eliminar-usuarios']))
                        <td>
                            <ul class="list-inline" >
                                @if(Auth::user()->canSeeIf(['editar-usuarios']))
                                <li>
                                    <a href="/administracion/usuarios/{{$user->id}}/edit"
                                       class="fa fa-lg fa-pencil"
                                       data-toggle="tooltip"
                                       title="Editar!">
                                    </a>
                                </li>
                                @endif
                                    @if(Auth::user()->canSeeIf(['eliminar-usuarios']))

                                        @if(!$user->hasRole('administrador-del-sistema'))
                                        |
                                        <li>
                                            <a onclick="deleteConfirm('{{$user->full_name}}','{{$user->id}}','/administracion/usuarios/')"
                                                class="fa fa-lg fa-times"
                                                data-toggle="tooltip"
                                                title="Eliminar!"></a>
                                        </li>
                                        @endif
                                    @endif
                            </ul>
                        </td>
                            @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $users->links() !!}
        </div>
    @else
        <h2>No hay usuarios registrados.</h2>
    @endif
    
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection