@extends('app')

@section('content')
    @if(Auth::user()->canSeeIf(['crear-departamentos']))
        <a href="/departamentos/create" class="btn btn-primary">Agregar Departamento</a>
        <hr>
    @endif

    @if($departments->count()>=1)
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <th>
                    Nombre
                </th>
                <th>Descripcion</th>
                @if(Auth::user()->canSeeIf(['editar-departamentos','eliminar-departamentos']))
                    <th>Acciones</th>
                @endif
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
                        @if(Auth::user()->canSeeIf(['editar-departamentos','eliminar-departamentos']))
                            <td>
                                <ul class="list-inline">
                                    @if(Auth::user()->canSeeIf(['editar-departamentos']))
                                        <li>
                                            <a class="fa fa-lg fa-pencil"
                                               href="/departamentos/{{$deparment->slug}}/edit"
                                               data-toggle="tooltip"
                                               title="Editar!">
                                            </a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->canSeeIf(['eliminar-departamentos']))

                                        |
                                        <li>
                                            <a class="fa fa-lg fa-times" data-toggle="tooltip" title="Eliminar!"
                                               data-container="body"
                                               onclick="deleteConfirm('{{$deparment->name}}','{{$deparment->id}}','/departamentos/')"></a>
                                        </li>
                                    @endif
                                </ul>
                            </td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$departments->links()}}
        </div>
    @else
        <h2>No se han registrado departamentos</h2>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
