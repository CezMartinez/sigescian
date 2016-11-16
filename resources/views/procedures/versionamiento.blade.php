@extends('app')
    
@section('content')

    {!! link_to(URL::previous(), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}
    <hr>
    <h1>{{$procedures->first()->name}}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <th>Nombre del documento</th>
            <th>Realizado por</th>
            <th>Versión</th>
            <th>Fecha de versionamiento</th>
            </thead>
            <tbody>
                @foreach($procedures as $procedure)
                    @foreach($procedure->versionate as $document)
                        <tr>
                            <td>{{App\Model\ProcedureDocument::findOrFail($document->pivot->document_id)->title}}</td>
                            <td>{{App\User::findOrFail($document->pivot->user_id)->full_name}}</td>
                            <td>{{$document->pivot->version}}</td>
                            <td>{{$document->pivot->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection