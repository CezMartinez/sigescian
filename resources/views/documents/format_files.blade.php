@extends('app')
    
@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <th>Titulo</th>
            <th>Formato</th>
            <th>Peso</th>
            <th>Procedimiento Asociados</th>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr>
                    <td>
                        <p>{{$file->title}}</p>
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
@endsection