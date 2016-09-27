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
                            <ul class="list-inline" >
                                <li>
                                    <a  class="fa fa-lg fa-pencil"
                                        href="/clientes/{{$client->slug}}/edit" class="btn btn-sm btn-primary"
                                        data-toggle="tooltip"
                                        title="Editar!"
                                    >
                                    </a>
                                </li>
                                |
                                <li>
                                    <a class="fa fa-lg fa-times"
                                       onclick="deleteConfirm('{{$client->name}}','{{$client->id}}','/clientes/')"
                                       data-toggle="tooltip"
                                       title="Eliminar!"
                                    >
                                    </a>
                                </li>
                            </ul>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection