@extends('app')
    
@section('content')

    <a href="/departamentos/create" class="btn btn-primary">Agregar Departamento</a>
    <hr>
    <div class="table-responsive">

        <table class="table table-hover table-bordered">
            <thead>
                <th>
                    nombre
                </th>
                <th>descripcion</th>
                <th>acciones</th>
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
                                <form action="/departamentos/{{$deparment->id}}"  v-ajax row="row-{{$deparment->id}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$departments->links()}}
    </div>

@endsection