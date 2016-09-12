@extends('app')

@section('content')

    <div>
        <a href="/equipos/create" class="btn btn-primary">Agregar Nuevo Equipo</a>
    </div>

    <hr>
    @if($plants->count() > 0)
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
                @foreach($plants as $equipo)

                    <tr id="row-{{$equipo->id}}">
                        <td>{{$equipo->name}}</td>
                        <td>{{$equipo->brand}}</td>
                        <td>{{$equipo->model}}</td>
                        <td>
                            <div class="acciones">
                                <a href="/equipos/{{$equipo->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                <form action='/equipos/{{$equipo->id}}' v-ajax row="row-{{$equipo->id}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger"><span class="texto">Eliminar</span></button>
                                </form>
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