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

                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                            <ul>
                                @foreach($role->permissions as $permission)
                                    <li>{{$permission->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="acciones">
                                <a href="/administracion/roles/{{$role->slug}}/edit" id="accion_editar">editar</a>
                                <form action='/administracion/roles/{{$role->id}}' method="POST" id="accion_eliminar">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button class="btn btn-danger">x</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>No hay roles agregados</p>
    @endif
@endsection