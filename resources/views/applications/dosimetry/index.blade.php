@extends('app')

@section('content')
    <h1>Solicitudes de Servicio de Dosimetria Personal Externa</h1>

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
                    {{--<th>--}}
                        {{--Estado--}}
                    {{--</th>--}}
                    </thead>
                    <tbody>
                    @foreach($applications as $s)
                        <tr>
                            <td>{{$s->name}}</td>
                            <td>{{$s->created_at->format('d/m/Y')}}</td>
                            {{--@if($s->state==0)--}}
                                {{--<td>Esperando Confirmacion</td>--}}
                            {{--@elseif($s->state==1)--}}
                                {{--<td>Aceptada por el cliente</td>--}}
                            {{--@else--}}
                                {{--<td>Cancelada por el cliente</td>--}}
                            {{--@endif--}}
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