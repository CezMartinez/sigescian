@extends('app')
    
@section('content')
    
    <h1>Laboratorio: {{$laboratories->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('laboratories.form_laboratories.form_laboratories_edit')
        </div>
    </div>
    
@endsection