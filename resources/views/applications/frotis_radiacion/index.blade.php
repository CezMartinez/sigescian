@extends('app')

@section('content')
    <h1>Solicitudes de Servicio de Prueba de Frotis y Radiacion.</h1>

    <hr>
    @if($applications->count()>0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Fecha de Solicitud
                    </th>
                    <th>
                        Estado
                    </th>
                    </thead>
                    <tbody>
                    @foreach($applications as $s)
                        <tr>
                            <td>{{$s->petitioner}}</td>
                            <td>{{$s->created_at->format('d/m/Y')}}</td>
                            @if($s->state==0)
                                <td>Esperando Confirmacion</td>
                            @else
                                <td>Aceptada por el cliente</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$applications->links()}}
            </div>
    @else
        <div style="padding-top: 1em">
            <h2>No hay solicitudes registradas.</h2>
        </div>
    @endif

@endsection