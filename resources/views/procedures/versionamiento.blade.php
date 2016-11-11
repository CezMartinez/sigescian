@extends('app')
    
@section('content')
    
    {!! link_to(url('/procedimientos/administrativos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <th>Nombre del documento</th>
            <th>hecho por</th>
            <th>version</th>
            </thead>
            <tbody>
            @foreach($procedures as $procedure)
                @foreach($procedure->versionate as $document)
                    <tr>
                        <td>{{App\Model\ProcedureDocument::findOrFail($document->pivot->document_id)->title}}</td>
                        <td>{{App\User::findOrFail($document->pivot->user_id)->full_name}}</td>
                        <td>{{$document->pivot->version}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    
@endsection