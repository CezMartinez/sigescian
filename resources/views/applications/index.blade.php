@extends('app')

@section('content')
    <h1>Servicios Disponibles</h1>

    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <th>
                Codigo
            </th>
            <th>
                Servicio
            </th>
            </thead>
            <tbody>
            <tr>
                <td><a href="/servicios/radio-agua-226/create">F-SS-PG9.2R</a></td>
                <td>Analisis de Radio-226 en Agua Envasada</td>
            </tr>
            <tr>
                <td><a href="/servicios/frotis-radiacion/create">F-SS-PG9.2F</a></td>
                <td>Prueba de fuga(frotis) y Nivel de Radiacion</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection