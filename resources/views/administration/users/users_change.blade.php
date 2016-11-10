@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Cambiar Contraseña</h3></div>
                <div class="panel-body">
                    <p><strong>Nombres: </strong> {{$user->full_name}}</p>
                    <p><strong>Apellidos:</strong> {{$user->last_name}}</p>
                    <p><strong>Email:</strong> {{$user->email}}</p>
                    <p><strong>Roles:</strong>
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
                    </p>
                    <hr>
                    @include('administration.users.forms_users.form_change_password')
                </div>
            </div>
        </div>
    </div>

@endsection