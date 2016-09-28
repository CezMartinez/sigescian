@extends('app')

@section('content')

    @if(Auth::user()->canSeeIf(['crear-equipos']))
    <div>
        <a href="/equipos/create" class="btn btn-primary">Agregar Nuevo Equipo</a>
    </div>
    @endif
    <hr>
    @if($equipos->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Modelo
                </th>
                @if(Auth::user()->canSeeIf(['editar-equipos','eliminar-equipos','calibrar-equipos']))

                    <th>Acciones</th>
                    @endif
                </thead>
                <tbody>
                @foreach($equipos as $equipo)

                    <tr id="row-{{$equipo->id}}">
                        <td><a href="/equipos/{{$equipo->id}}"><span class="texto">{{$equipo->name}}</span></a> </td>
                        <td>{{$equipo->brand}}</td>
                        <td>{{$equipo->model}}</td>
                        @if(Auth::user()->canSeeIf(['editar-equipos','eliminar-equipos','calibrar-equipos']))
                        <td>
                            <div class="acciones" >
                                <ul class="list-inline"  >
                                @if(Auth::user()->canSeeIf(['editar-equipos']))
                                    <li>
                                        <a  class="fa fa-lg fa-pencil"
                                            href="/equipos/{{$equipo->slug}}/edit"
                                            data-toggle="tooltip"
                                            title="Editar!">
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->canSeeIf(['calibrar-equipos']))
                                    @if($equipo->needCalibrate())
                                        |
                                            <li>
                                                <a  class="fa fa-lg fa-briefcase"
                                                    href="/equipos/{{$equipo->slug}}/calibrar"
                                                    data-toggle="tooltip"
                                                    title="Calibrar!">
                                                </a>
                                            </li>
                                    @endif
                                @endif
                                @if(Auth::user()->canSeeIf(['eliminar-equipos']))
                                        |
                                        <li>
                                            <a class="fa fa-lg fa-times" data-toggle="tooltip" title="Eliminar!" data-container="body"
                                               onclick="deleteConfirm('{{$equipo->name}}','{{$equipo->id}}','/equipos/')"></a></li>
                                    @endif
                                </ul>

                            </div>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$equipos->links()}}
        </div>
    @else
        <p>No hay equipos en el sistema</p>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection