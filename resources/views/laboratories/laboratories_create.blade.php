@extends('app')
@section('content')

<div class="row">
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12">
                    <h1>Agregar nuevo laboratorio</h1>
                    <hr>
                    @include('laboratories.form_laboratories.form_laboratories_create');
                </div>
            </div>

        </div>
    </div>

@endsection

