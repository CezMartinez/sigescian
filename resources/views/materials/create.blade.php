@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-10">

            <h1>Agregar nuevo material</h1>
            <hr>
            @include('materials.forms.create');
        </div>
    </div>
    
@endsection

