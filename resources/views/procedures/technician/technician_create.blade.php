@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            @include('procedures.technician.forms.technician_form_create')
        </div>
    </div>

@endsection
