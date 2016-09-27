@extends('app')

@section('content')

    <div>
        <a href="/materiales/create" class="btn btn-primary">Agregar Nuevo Material</a>
    </div>

    <hr>
    @if($materials->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Descripcion
                </th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($materials as $material)

                    <tr id="row-{{$material->id}}">
                        <td>{{$material->name}}</td>
                        <td>{{$material->description}}</td>
                        <td>
                            <ul class="list-inline" >
                                <li>
                                    <a  class="fa fa-lg fa-pencil"
                                        href="/materiales/{{$material->slug}}/edit" class="btn btn-sm btn-primary"
                                        data-toggle="tooltip"
                                        title="Editar!">
                                    </a>
                                </li> |
                                <li>
                                    <a class="fa fa-lg fa-times"
                                       onclick="deleteConfirm('{{$material->name}}','{{$material->id}}','/materiales/')"
                                       data-toggle="tooltip"
                                       title="Eliminar!">
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
        <p>No hay materiales en el sistema.</p>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection