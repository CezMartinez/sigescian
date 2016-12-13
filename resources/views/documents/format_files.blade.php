@extends('app')

@section('content')

    @if($files->count()>=1)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <th>Título</th>
                <th>Formato</th>
                <th>Peso</th>
                <th>Procedimientos Asociados</th>
                </thead>
                <tbody>
                @foreach($files as $file)

                    <tr>
                        <td>
                            <a  target="_blank" href="/archivos/procedimientos/1/{{$file->typeOfProcedure()}}/{{$file->originalName}}">
                                {{$file->title}}
                            </a>
                        </td>
                        <td>
                            <p>{{$file->extension}}</p>
                        </td>
                        <td>
                            <p>{{round($file->size/1048576,2)}} MB</p>
                        </td>
                        <td>
                            @if($file->administrativeProcedure()->get()->count() > 0)
                                <ul>
                                    @foreach($file->administrativeProcedure()->get() as $procedure)
                                        <li>{{$procedure->name}}</li>
                                    @endforeach
                                </ul>
                            @elseif($file->technicianprocedure()->get()->count()>0)
                                <ul>
                                    @foreach($file->technicianprocedure()->get() as $procedure)
                                        <li>{{$procedure->name}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @else
        <h2>No hay documentos añadidos</h2>
    @endif
@endsection