@extends('email')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.radio226.header')
                    <br>
                    @include('applications.radio226.forms.form_email_226')
                </div>
            </div>

        </div>
    </div>
@endsection