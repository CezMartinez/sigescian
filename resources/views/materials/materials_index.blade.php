@extends('app')

@section('content')

    @if(Auth::user()->canSeeIf(['crear-materiales']))

        <div>
        <a href="/materiales/create" class="btn btn-primary">Agregar Nuevo Material</a>
    </div>
    @endif
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
                @if(Auth::user()->canSeeIf(['editar-materiales','eliminar-materiales']))
                    <th>Acciones</th>
                    @endif
                </thead>
                <tbody>
                @foreach($materials as $material)

                    <tr id="row-{{$material->id}}">
                        <td>{{$material->name}}</td>
                        <td>{{$material->description}}</td>
                        @if(Auth::user()->canSeeIf(['editar-materiales','eliminar-materiales']))

                        <td>
                            <ul class="list-inline" >
                                @if(Auth::user()->canSeeIf(['editar-materiales']))

                                <li>
                                    <a  class="fa fa-lg fa-pencil"
                                        href="/materiales/{{$material->slug}}/edit" class="btn btn-sm btn-primary"
                                        data-toggle="tooltip"
                                        title="Editar!">
                                    </a>
                                </li>
                                @endif
                                    @if(Auth::user()->canSeeIf(['eliminar-materiales']))
                                        |
                                <li>
                                    <a class="fa fa-lg fa-times"
                                       onclick="deleteConfirm('{{$material->name}}','{{$material->id}}','/materiales/')"
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