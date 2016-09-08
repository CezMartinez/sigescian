@extends('app')
    
@section('content')

    <a href="/administracion/usuarios/create" class="btn btn-success">
        Agregar un nuevo usuario
    </a>

    <hr>

    @if($users->count() >= 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Nombre Usuario</th>
                    <th>Correo</th>
                    <th>Roles</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No hay usuarios registrados</p>
    @endif
    
@endsection