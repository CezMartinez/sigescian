@extends('app')
@section('content')

    <div>
        <a href="/laboratorios/create" class="btn btn-primary">Agregar Nuevo Laboratorio</a>
    </div>

    <hr>
    @if($laboratories->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Descripcion
                </th>
                <th>Departamento</th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($laboratories as $laboratorio)

                    <tr id="row-{{$laboratorio->id}}">
                        <td>{{$laboratorio->name}}</td>
                        <td>{{$laboratorio->description}}</td>
                        <td>{{$laboratorio->department->name}}</td>
                        <td>
                            <div class="acciones">
                                <a href="/laboratorios/{{$laboratorio->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                    <a class="btn btn-sm btn-danger" onclick="deleteConfirm('{{$laboratorio->name}}','{{$laboratorio->id}}','/laboratorios/')">Eliminar</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

         {{$laboratories->links()}}
    @else
        <p>No hay laboratorios en el sistema.</p>
    @endif

@endsection

