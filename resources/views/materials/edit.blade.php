@extends('app')
    
@section('content')
    
    <h1>Role: {{$materials->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('materials.forms.edit')
        </div>
    </div>
    
@endsection