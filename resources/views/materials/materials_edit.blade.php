@extends('app')
    
@section('content')
    
    <h1>Material: {{$materials->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('materials.form_materials.form_materials_edit')
        </div>
    </div>
    
@endsection