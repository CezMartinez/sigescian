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
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($laboratories as $laboratorio)

                    <tr id="row-{{$laboratorio->id}}">
                        <td>{{$laboratorio->name}}</td>
                        <td>{{$laboratorio->description}}</td>
                        <td>
                            <div class="acciones">
                                <a href="/laboratorios/{{$laboratorio->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                <form action='/laboratorios/{{$laboratorio->id}}' v-ajax row="row-{{$laboratorio->id}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger"><span class="texto">Eliminar</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>No hay laboratorios en el sistema.</p>
    @endif

@endsection

