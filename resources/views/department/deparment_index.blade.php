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
                        <td>
                            <div class="acciones" >
                                <a href="/departamentos/{{$deparment->slug}}/edit" class="fa fa-lg fa-pencil" data-toggle="tooltip" title="Editar!"></a> |
                                <a class="fa fa-lg fa-times" data-toggle="tooltip" title="Eliminar!" data-container="body"
                                   onclick="deleteConfirm('{{$deparment->name}}','{{$deparment->id}}','/departamentos/')"></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$departments->links()}}
    </div>
    <script>

    </script>
@endsection
