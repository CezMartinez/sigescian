@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1 style="font-size: 21px">Procedimiento: {{$procedure->code}}</h1>
            <hr>
            @include('procedures.administrative.forms.administrative_form_edit')
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Procedimiento:</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div class="lista-procedimientos">
                            @if($procedure->procedureDocument()->count() > 0 )
                                @foreach($procedure->procedureDocument()->get() as $file)

                                    <li id="file-procedimiento-{{$file->id}}"
                                        class="list-group-item list-group-item-info">

                                        <a target="_blank" href="/archivos/procedimientos/4/2/{{$file->originalName}}">
                                            {{$file->title}}
                                        </a>

                                        <i class="fa fa-times pull-right"
                                            onclick="deleteFile(
                                                    '{{$file->title}}',
                                                    '{{$procedure->id}}',
                                                    '{{$file->id}}',
                                                    'procedimiento',
                                                    '/procedimiento/archivos/procedimiento/')"></i>
                                    </li>
                                @endforeach
                            @else
                                <p>No hay un documento oficial asociado con este procedimiento</p>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection