@extends('app')

@section('content')

    @can('crear-roles')
        <div>
            <a href="/administracion/roles/create" class="btn btn-lg btn-primary">Agregar nuevo rol</a>
        </div>
        <hr>
    @endcan

    @if($roles->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Permisos
                </th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($roles as $role)

                    <tr id="row-{{$role->id}}">
                        <td>{{$role->name}}</td>
                        <td>
                            @if($role->permissions()->count() > 0)
                                <ul>
                                    @foreach($role->permissions as $permission)
                                        <li>{{$permission->name}}</li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No tiene permisos asignados</p>
                            @endif
                        </td>
                        <td>
                            @if($role->slug != 'administrador-del-sistema')
                                <ul class="list-inline">
                                    @can('editar-roles')
                                       <li>
                                           <a
                                                   href="/administracion/roles/{{$role->slug}}/edit"
                                                   class="fa fa-lg fa-pencil"
                                                   data-toggle="tooltip"
                                                   title="Editar!">
                                           </a>
                                       </li>
                                    @endcan
                                    @can('eliminar-roles')
                                    |
                                        <li>
                                            <a class="fa fa-lg fa-times"
                                               onclick="deleteConfirm('{{$role->name}}','{{$role->id}}','/administracion/roles/')"
                                               data-toggle="tooltip"
                                               title="Eliminar!">
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        {{$roles->links()}}
    @else
        <h2>No hay roles registrados</h2>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection