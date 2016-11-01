@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                   <h1>Solicitud de Servicio de Control de Calidad</h1>
                    <hr>
                    @include('applications.controlc.forms.form_create_controlc')
                </div>
            </div>

        </div>
    </div>
@endsection