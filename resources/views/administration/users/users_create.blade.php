@extends('app')
    
@section('content')

    <h1>Ingrese Datos del Usuario</h1>

    <hr>
    <div class="row">
        <div class="col-md-6">
            @include('administration.users.forms_users.form_create_user')
        </div>
    </div>
    
@endsection