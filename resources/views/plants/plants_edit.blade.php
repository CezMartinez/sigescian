@extends('app')
    
@section('content')
    
    <h1>Role: {{$plants->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('plants.form_plants.form_plants_edit')
        </div>
    </div>
    
@endsection