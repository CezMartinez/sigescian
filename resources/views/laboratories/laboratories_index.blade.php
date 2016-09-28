@extends('app')
@section('content')

    @if(Auth::user()->canSeeIf(['crear-laboratorios']))

        <div>
        <a href="/laboratorios/create" class="btn btn-primary">Agregar Nuevo Laboratorio</a>
    </div>
        @endif
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
                @if(Auth::user()->canSeeIf(['editar-laboratorios','eliminar-laboratorios']))

                    <th>Acciones</th>
                    @endif
                </thead>
                <tbody>
                @foreach($laboratories as $laboratorio)

                    <tr id="row-{{$laboratorio->id}}">
                        <td>{{$laboratorio->name}}</td>
                        <td>{{$laboratorio->description}}</td>
                        <td>{{$laboratorio->department->name}}</td>
                        @if(Auth::user()->canSeeIf(['editar-laboratorios','eliminar-laboratorios']))
                        <td>
                            <ul class="list-inline">
                                @if(Auth::user()->canSeeIf(['editar-laboratorios']))


                                <li>
                                    <a
                                    href="/laboratorios/{{$laboratorio->slug}}/edit"
                                    class="fa fa-lg fa-pencil"
                                    data-toggle="tooltip"
                                    title="Editar!">
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->canSeeIf(['eliminar-laboratorios']))

                                    |
                                <li>
                                    <a class="fa fa-lg fa-times"
                                       onclick="deleteConfirm('{{$laboratorio->name}}','{{$laboratorio->id}}','/laboratorios/')"
                                       data-toggle="tooltip"
                                       title="Eliminar!">
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </td>
                            @endif
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
