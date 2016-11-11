@extends('app')

@section('content')
    <h1>Servicios Disponibles</h1>

    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <th>
                Servicio
            </th>
            @if(Auth::user()->canSeeIf(['crear-solicitudes']))
                <th>
                    Acciones
                </th>
            @endif

            </thead>
            <tbody>
            @foreach($solicitudes as $s)
            <tr>
                <td><a href="/servicios/{{$s->slug}}">{{$s->name}}</a></td>
                @if(Auth::user()->canSeeIf(['crear-solicitudes']))
                    <td><a href="/servicios/{{$s->slug}}/create" class="btn btn-primary">Registrar Solicitud</a></td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection