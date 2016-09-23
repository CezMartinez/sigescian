@extends('app')

@section('content')

    <a href="/departamentos/create" class="btn btn-primary">Agregar Departamento</a>
    <hr>
    <div class="table-responsive">

        <table class="table table-hover table-bordered">
            <thead>
                <th>
                    Nombre
                </th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($departments as $deparment)
                    <tr id="row-{{$deparment->id}}">
                        <td>
                            {{$deparment->name}}
                        </td>
                        <td>
                            {{$deparment->description}}
                        </td>
                        <td >
                            <ul class="list-inline"  >
                                <li>
                                    <a  class="fa fa-lg fa-pencil"
                                        href="/departamentos/{{$deparment->slug}}/edit"
                                        data-toggle="tooltip"
                                        title="Editar!">
                                    </a>
                                </li>
                                |
                                <li>
                                    <a class="fa fa-lg fa-times" data-toggle="tooltip" title="Eliminar!" data-container="body"
                                   onclick="deleteConfirm('{{$deparment->name}}','{{$deparment->id}}','/departamentos/')"></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$departments->links()}}
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
