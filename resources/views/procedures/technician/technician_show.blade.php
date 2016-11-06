@extends('app')

@section('content')
    {!! link_to(url('/procedimientos/tecnicos'), '  Atras', ['class' => 'fa fa-2x fa-arrow-circle-left']) !!}

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3> {{$tecnico->name}} </h3></div>
                <div class="panel-body">
                    <p>Codigo: {{$tecnico->code}}</p>
                    <p>Estado: {{$tecnico->status}}</p>
                    <p>Seccion: {{$tecnico->section->section}}</p>
                    @if($tecnico->subSections()->get()->count() > 0)
                        <p>Subsecciones: </p>
                        <ul>
                            @foreach($tecnico->subSections()->get() as $subsection)
                                <li>{{$subsection->section}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if($tecnico->steps()->get()->count()>=1)
                        <p>Instrucciones Tecnicas</p>
                        <ol>
                            @foreach($tecnico->steps()->get() as $step)
                                <li>{{$step->step}}</li>
                            @endforeach
                        </ol>
                    @endif
                </div>
            </div>
            <hr>
            <h2>Seleccione el tipo de archivo que desea subir al sistema:</h2>
            <div>
                <input type="radio" name="type" value="4" class="type">
                <label for="type">Documento del Procedimiento</label>
                <input type="radio" name="type" value="1" class="type">
                <label for="type">Formatos </label>
                <input type="radio" name="type" value="3" class="type">
                <label for="type"> Anexos</label>
            </div>
            <form action="/procedimiento/tecnico/{{$tecnico->id}}/archivos-adjuntos" id="uploadFile" method="POST"
                  class="dropzone"
                  id="annexed-files">
                <input type="hidden" name="type" id="type_hidden">
                <input type="hidden" name="procedure" value="2">
                {{csrf_field()}}
            </form>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Archivos Anexos</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div class="lista-anexos">
                            @if($tecnico->annexedFiles()->count() > 0 )
                                @foreach($tecnico->annexedFiles()->get() as $file)

                                    <li id="file-anexo-{{$file->id}}" class="list-group-item list-group-item-info">

                                        <a target="_blank" href="/archivos/procedimientos/3/2/{{$file->originalName}}">
                                            {{$file->title}}
                                        </a>

                                        <i class="fa fa-times pull-right"
                                           onclick="deleteFile(
                                                   '{{$file->originalName}}',
                                                   '{{$tecnico->id}}',
                                                   '{{$file->id}}',
                                                   'anexo',
                                                   '/procedimiento/archivos/anexo/')"></i>
                                    </li>
                                @endforeach
                            @else
                                No hay anexos asociados con este procedimiento
                            @endif
                        </div>
                    </ul>
                    @include("procedures.partials.asociar-archivos",
                             array(
                                    'url'=>'/informacion/anexo/tecnico/',
                                    'procedure'=>$tecnico,
                                    'file_type'=>'anexo',
                                    'procedures'=> $procedures,
                                    'procedure_type' => "tecnico",
                                    'storeUrl' => "/associar/$tecnico->id/tecnico/anexo",
                            ))
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Procedimiento:</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div class="lista-procedimientos">
                            @if($tecnico->procedureDocument()->count() > 0 )
                                @foreach($tecnico->procedureDocument()->get() as $file)

                                    <li id="file-procedimiento-{{$file->id}}"
                                        class="list-group-item list-group-item-info">

                                        <a target="_blank" href="/archivos/procedimientos/4/2/{{$file->originalName}}">
                                            {{$file->title}}
                                        </a>

                                        <i class="fa fa-times pull-right"
                                           onclick="deleteFile(
                                                   '{{$file->originalName}}',
                                                   '{{$tecnico->id}}',
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
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Formatos</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div class="lista-formatos">
                            @if($tecnico->formatFiles()->count() > 0 )
                            @foreach($tecnico->formatFiles as $file)

                                <li id="file-formato-{{$file->id}}" class="list-group-item list-group-item-{{($file->pivot->owner == null) ? 'info':'success'}}">

                                    <a target="_blank" href="/archivos/procedimientos/1/2/{{$file->originalName}}">
                                        {{$file->title}}
                                    </a>

                                    <i class="fa fa-times pull-right"
                                       onclick="deleteFile(
                                               '{{$file->originalName}}',
                                               '{{$tecnico->id}}',
                                               '{{$file->id}}',
                                               'formato',
                                               '/procedimiento/archivos/formato/')"></i>
                                </li>
                            @endforeach
                            @else
                                No hay formatos asociados con este procedimiento
                            @endif
                        </div>
                    </ul>
                    @include("procedures.partials.asociar-archivos",
                             array(
                                    'url'=>'/informacion/formato/tecnico/',
                                    'procedure'=>$tecnico,
                                    'file_type'=>'formato',
                                    'procedures'=> $procedures,
                                    'procedure_type'=> 'tecnico',
                                    'storeUrl' => "/associar/$tecnico->id/tecnico/formato",
                                ))
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="/js/technician.js"></script>
    <script src="/js/asociar-archivos.js"></script>
@endsection

