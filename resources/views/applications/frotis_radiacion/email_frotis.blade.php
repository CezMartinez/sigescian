@extends('email')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.frotis_radiacion.header')
                    <br>
                    @include('applications.frotis_radiacion.forms.form_email_frotis')
                </div>
            </div>

        </div>
    </div>
@endsection