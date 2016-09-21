@extends('app')
    
@section('content')
    
    <h1>Equipo: {{$equipments->name}}</h1>
    <hr/>
    <div class="row">
        <div class="col-md-10">
            @include('equipment.form_equipment.form_equipment_calibration')
        </div>
    </div>
    
@endsection