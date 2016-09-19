@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3> {{$equipo->name}} </h3></div>
                <div class="panel-body">
                    <p>Modelo: {{$equipo->model}}</p>
                    <p>Marca: {{$equipo->brand}}</p>
                    @if($equipo->need_calibration==1)
                        @if($equipo->date_calibration!=null)
                            <p>Fecha de Calibracion: {{$equipo->date_calibration->diffForHumans()}}</p>
                            <p>Dias restantes de Calibracion: {{$equipo->date_end_calibration->diffForHumans()}}</p>
                            <p>Calibrado por: {{$equipo->user()->first()->full_name}}</p>
                        @else
                            <p>¡Necesita Calibración!</p>
                        @endif
                        <hr/>
                        <a href="/equipos/{{$equipo->slug}}/calibrar" class="btn btn-sm btn-success"><span class="texto">Calibrar</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection