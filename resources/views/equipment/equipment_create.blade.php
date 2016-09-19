@extends('app')
    
@section('content')
    
    <div class="row">
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12">
                    <h1>Agregar nuevo equipo</h1>
                    <hr>
                    @include('equipment.form_equipment.form_equipment_create')
                </div>
            </div>

        </div>
    </div>
    
@endsection

