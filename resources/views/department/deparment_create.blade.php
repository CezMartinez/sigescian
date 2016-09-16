@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-6">
            @include('department.forms_deparments.form_create_department')
        </div>
    </div>
    
@endsection