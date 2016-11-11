@extends('email')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.controlc.header')
                    <hr>
                    @include('applications.controlc.forms.form_email_controlc')
                </div>
            </div>

        </div>
    </div>
@endsection