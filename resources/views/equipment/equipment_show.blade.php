@extends('app')
@section('content')
    {!! link_to(url('/equipos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}

    <hr>
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
                            <p>Fecha de Calibracion: <strong>{{$equipo->date_calibration->diffForHumans()}}</strong></p>
                            <p>Dias restantes de Calibracion: <strong>{{$equipo->date_end_calibration->diffForHumans()}}</strong></p>
                            <p>Calibrado por: <strong>{{$equipo->calibrate_company}}</strong></p>
                        @else
                            <h2 style="color:red">¡Necesita Calibración!</h2>
                        @endif

                        @if($equipo->needCalibrate())
                            <hr/>
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