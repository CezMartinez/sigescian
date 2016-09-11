@extends('app')

@section('content')

    <div>
        <a href="/clientes/create" class="btn btn-primary">Agregar Nuevo Cliente</a>
    </div>

    <hr>
    @if($clients->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Direccion
                </th>
                <th>
                    NIT
                </th>
                <th>
                    Representante Legal
                </th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($clients as $client)

                    <tr id="row-{{$client->id}}">
                        <td>{{$client->name}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->nit}}</td>
                        <td>{{$client->legal_agent}}</td>
                        <td>
                            <div class="acciones">
                                <a href="/clientes/{{$client->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                <form action='/clientes/{{$client->id}}' v-ajax row="row-{{$client->id}}" method="POST">
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
        <p>No hay clientes en el sistema.</p>
    @endif
@endsection