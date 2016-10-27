@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.frotis_radiacion.header')
                    <hr>
                    @include('applications.frotis_radiacion.forms.form_create_frotis')
                </div>
            </div>

        </div>
    </div>
@endsection