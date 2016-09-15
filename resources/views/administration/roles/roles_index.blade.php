@extends('app')

@section('content')

    <div>
        <a href="/administracion/roles/create" class="btn btn-primary">Agregar nuevo rol</a>
    </div>

    <hr>

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
                            <div class="acciones">
                                <a href="/administracion/roles/{{$role->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                <a class="btn btn-sm btn-danger"
                                   onclick="deleteConfirm('{{$role->name}}','{{$role->id}}','/administracion/roles/')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        {{$roles->links()}}
    @else
        <p>No hay roles agregados</p>
    @endif
@endsection