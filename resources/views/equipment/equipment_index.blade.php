@extends('app')

@section('content')

    <div>
        <a href="/equipos/create" class="btn btn-primary">Agregar Nuevo Equipo</a>
    </div>

    <hr>
    @if($equipos->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Modelo
                </th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($equipos as $equipo)

                    <tr id="row-{{$equipo->id}}">
                        <td><a href="/equipos/{{$equipo->id}}"><span class="texto">{{$equipo->name}}</span></a> </td>
                        <td>{{$equipo->brand}}</td>
                        <td>{{$equipo->model}}</td>
                        <td>
                            <div class="acciones" >
                                <a href="/equipos/{{$equipo->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                @if($equipo->need_calibration==1)
                                <a href="/equipos/{{$equipo->slug}}/calibrar" class="btn btn-sm btn-success"><span class="texto">Calibrar</span></a> |
                                @endif
                                <a class="btn btn-sm btn-danger"
                                   onclick="deleteConfirm('{{$equipo->name}}','{{$equipo->id}}','/equipos/')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>No hay equipos en el sistema</p>
    @endif
@endsection