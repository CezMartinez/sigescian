@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                   <h1>Solicitud de Servicio de Analisis de Radio-226 en agua envasada</h1>
                    <hr>
                    @include('applications.radio226.forms.form_create_radio')
                </div>
            </div>

        </div>
    </div>
@endsection