@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3> {{$equipo->name}} </h3></div>
                <div class="panel-body">
                    <p>Modelo: {{$equipo->model}}</p>
                    <p>Marca: {{$equipo->brand}}</p>
                    <p>Laboratorio: {{$lab}}</p>
                    @if($equipo->need_calibration==1)
                        @if($equipo->date_calibration!=null)
                            <p>Fecha de Calibracion: {{$equipo->date_calibration->diffForHumans()}}</p>
                            <p>Dias restantes de Calibracion: {{$equipo->date_end_calibration->diffForHumans()}}</p>
                            <p>Calibrado por: {{$equipo->calibrate_company}}</p>
                        @else
                            <h2 style="color:red">¡Necesita Calibración!</h2>
                        @endif
                        <hr/>
                        @if($equipo->needCalibrate())
                                <h2 style="color:red">¡Necesita Calibración!</h2>
                                <br>
                            @if(Auth::user()->canSeeIf(['calibrar-equipos']))
                                <a href="/equipos/{{$equipo->slug}}/calibrar" class="btn btn-sm btn-success"><span class="texto">Calibrar</span></a>
                            @endif
                         @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection