@extends('app')
    
@section('content')
    
    <h1>Cliente: {{$clients->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('clients.forms_clients.form_client_edit')
        </div>
    </div>
    
@endsection