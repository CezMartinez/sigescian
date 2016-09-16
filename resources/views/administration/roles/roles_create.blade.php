@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-6">

            <h1>Agregar nuevo rol</h1>
            <hr>
            @include('administration.roles.forms_roles.form_create_role')
        </div>
    </div>
    
@endsection

