@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-6">
            @include('administration.users.forms_users.form_edit_user')
        </div>
    </div>
    
@endsection