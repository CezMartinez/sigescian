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
                            <ul class="list-inline">
                                <li>
                                    <a
                                    href="/laboratorios/{{$laboratorio->slug}}/edit"
                                    class="fa fa-lg fa-pencil"
                                    data-toggle="tooltip"
                                    title="Editar!">
                                    </a>
                                </li>
                                |
                                <li>
                                    <a class="fa fa-lg fa-times"
                                       onclick="deleteConfirm('{{$laboratorio->name}}','{{$laboratorio->id}}','/laboratorios/')"
                                       data-toggle="tooltip"
                                       title="Eliminar!">
                                    </a>
                                </li>
                                </form>
                            </ul>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
