@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                   <h1>Solicitud de Prueba de fuga(frotis) y Nivel de Radiacion</h1>
                    <hr>
                    @include('applications.frotis_radiacion.forms.form_create_frotis')
                </div>
            </div>

        </div>
    </div>
@endsection