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
            <th>
                Acciones
            </th>
            </thead>
            <tbody>
            @foreach($solicitudes as $s)
            <tr>
                <td><a href="/servicios/{{$s->slug}}">{{$s->name}}</a></td>
                <td><a href="/servicios/{{$s->slug}}/create" class="btn btn-primary">Registrar</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection