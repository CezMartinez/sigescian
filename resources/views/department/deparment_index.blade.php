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
                                <a href="/departamentos/{{$deparment->slug}}/edit" class="btn btn-sm btn-success">Editar</a> |
                                <a class="btn btn-sm btn-danger"
                                   onclick="deleteConfirm('{{$deparment->name}}','{{$deparment->id}}','/departamentos/')">Eliminar</a>
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
