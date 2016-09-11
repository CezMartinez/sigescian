@extends('app')
    
@section('content')
    
    <h1>Role: {{$role->name}}</h1>

    <div class="row">
        <div class="col-md-6">
            @include('administration.roles.forms_roles.form_edit_role')
        </div>
    </div>
    
@endsection