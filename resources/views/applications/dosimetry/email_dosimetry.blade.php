@extends('email')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.dosimetry.header')
                    <br>
                    @include('applications.dosimetry.forms.form_email_dosimetry')
                </div>
            </div>

        </div>
    </div>
@endsection
