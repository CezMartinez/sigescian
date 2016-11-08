@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                   <h1>Solicitud de Servicio de Dosimetria Personal Externa</h1>
                    <hr>
                    @include('applications.dosimetry.forms.form_create_dosimetry')
                </div>
            </div>

        </div>
    </div>
@endsection