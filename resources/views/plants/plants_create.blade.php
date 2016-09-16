@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12">
                    <h1>Agregar nuevo equipo</h1>
                    <hr>
                    @include('plants.form_plants.form_plants_create')
                </div>
            </div>

        </div>
    </div>
    
@endsection

