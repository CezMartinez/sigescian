@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-10">

            <h1>Agregar nuevo cliente</h1>
            <hr>
            @include('clients.forms_clients.form_client_create')
        </div>
    </div>
    
@endsection

