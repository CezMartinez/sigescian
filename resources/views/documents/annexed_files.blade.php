@extends('app')
    
@section('content')
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
                            <a  target="_blank" href="/archivos/procedimientos/3/1/{{$file->originalName}}">
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
                             @elseif($file->technicianProcedure()->get()->count()>0)
                                 <ul>
                                     @foreach($file->technicianProcedure()->get() as $procedure)
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
    
@endsection
