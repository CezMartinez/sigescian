@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1 style="font-size: 21px">Procedimiento: {{$procedure->code}}</h1>
            <hr>
            @include('procedures.administrative.forms.administrative_form_edit')
        </div>
    </div>

@endsection