@extends('app')
    
@section('content')
    
    <h1>Rol: {{$role->name}}</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            @include('administration.roles.forms_roles.form_edit_role')
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>
        $('#selectPermission').select2({
            placeholder: "Seleccione uno o muchos permisos",
        });
    </script>
@endsection