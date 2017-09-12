@extends('app')
@section('content')
    {!! link_to(url('/equipos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}

    <hr>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3> {{$equipo->name}} </h3></div>
                <div class="panel-body">
                    <p><strong>Codigo de Inventario: </strong> {{$equipo->stock_number}}</p>
                    <p><strong>Modelo:</strong> {{$equipo->model}}</p>
                    <p><strong>Marca:</strong> {{$equipo->brand}}</p>
                    <p><strong>Laboratorio:</strong> {{$lab}}</p>
                    @if($equipo->need_calibration==1)
                        @if($equipo->needCalibrate())
                            <br>
                                <h2 style="color:red">¡Necesita Calibración!</h2>
                            <hr/>
                            @if(Auth::user()->canSeeIf(['calibrar-equipos']))
                                <a href="/equipos/{{$equipo->slug}}/calibrar" class="btn btn-sm btn-success"><span class="texto">Calibrar</span></a>
                            @endif
                        @else
                            @if($ultimo!=null)
                                @if($ultimo->date_calibration!=null)
                                    <p><strong>Fecha de Calibración: </strong>{{$ultimo->date_calibration->diffForHumans()}}</p>
                                    <p><strong>Dias restantes de Calibración: </strong>{{$ultimo->date_end_calibration->diffForHumans()}}</p>
                                    <p><strong>Calibrado por: </strong>{{$ultimo->calibrate_company}}</p>
                                @endif
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($equipo->need_calibration==1)
        <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading"><h3> Lista de Calibraciones </h3></div>
                <div class="panel-body">
                    @if($calibre->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <th>
                                    Realizada por
                                </th>
                                <th>
                                    Inicio Calibracion (dd-mm-aaaa)
                                </th>
                                <th>
                                    Vencimiento Calibracion (dd-mm-aaaa)
                                </th>
                                </thead>
                                <tbody>
                                @foreach($calibre as $c)
                                    <tr id="row-{{$c->id}}">

                                        <td>{{$c->calibrate_company}} </td>
                                        <td>{{$c->date_calibration->format('d-m-Y')}}</td>
                                        <td>{{$c->date_end_calibration->format('d-m-Y')}}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$calibre->links()}}
                        </div>
                    @else
                        <p>No hay registro de calibraciones en el sistema</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection