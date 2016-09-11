@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-10">

            <h1>Agregar nuevo cliente</h1>
            <hr>
            @include('clients.forms.create');
        </div>
    </div>
    
@endsection

