@extends('guest')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Confirmacion de Servicio</h3></div>
                <div class="panel-body">
                    <p>Yo,{{$apply->responsable}}, con Documento Único de Identidad numero {{$apply->dui}}; con cargo de {{$apply->position}} actuando en representación de {{$apply->name}}, declaro que habiendo leído detenidamente este documento, me doy por enterado y acepto  las  condiciones sobre la  prestación del {{$cadena}} que se realizara a partir del día {{\Carbon\Carbon::today()->day}} del mes de {{\Carbon\Carbon::today()->format('F')}} de {{\Carbon\Carbon::today()->year}}</p>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-4">
                        <a href="aceptar" class="btn btn-success">Aceptar</a>
                    </div>
                    <div class="col-md-3">
                        <a href="rechazar" class="btn btn-danger">Declinar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection