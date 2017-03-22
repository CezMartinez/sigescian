@extends('app')

@section('content')

    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="text-center">
            <h3>Lista Maestra de Documentos Internos</h3>
        </div>
    </div>
    <br>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
                <th>No.</th>
                <th>Código</th>
                <th>Título</th>
                <th>Sección Norma</th>
                <th>Versión</th>
                <th>Fecha de Creación</th>
            </thead>
            <tbody>

            @foreach($adminproceds as $admin)

                <tr id="row-{{$admin->id}}" class="{{($admin->state) ? '':'info'}}">
                    <td>{{$admin->correlative}}</td>
                    <td>
                        @if($admin->hasDocumentProcedure())
                            @foreach($admin->documentProcedure() as $file)
                                <a target="_blank" href="/archivos/procedimientos/4/1/{{$file->originalName}}">
                                    {{$admin->code}}
                                </a>
                            @endforeach
                        @else
                            {{$admin->code}}
                        @endif
                    </td>
                    <td>
                        {{$admin->name}}
                    </td>
                    <td>
                        <a target="_blank" href="/CIAN_files/ISO-IEC-17025.pdf#{{$admin->section->route}}" >
                            {{$admin->section->section}}
                        </a>
                    </td>
                    <td>{{$admin->version}}</td>

                    <td>{{date('d/M/Y',strtotime($admin->created_at))}}</td>

                </tr>
                @foreach($admin->formatFiles as $fotmatosAdministrativos)
                        <tr class="info">
                            <td></td>
                            <td>
                                <a  target="_blank" href="/archivos/procedimientos/1/1/{{$fotmatosAdministrativos->originalName}}">
                                    &#8226 {{$fotmatosAdministrativos->code}}
                                </a>
                            </td>
                            <td>
                                {{$fotmatosAdministrativos->title}}
                            </td>
                            <td></td>
                            <td></td>
                            <td>{{date('d/M/Y',strtotime($fotmatosAdministrativos->created_at))}}</td>

                        </tr>
                @endforeach
            @endforeach

            @foreach($techproceds as $key => $value)

                <tr>
                    <th colspan="6" style="text-align: center">{{$laboratory->where('id',$key)->get(['name'])->toarray()[0]['name']}}</th>
                </tr>

                @foreach($value as $tech)
                    <tr>
                        <td>
                            {{$tech['correlative']}}
                        </td>
                        <td>
                            @if($tech['procedure_document'])

                                <a target="_blank" href="/archivos/procedimientos/4/2/{{$tech['procedure_document']['originalName']}}">
                                    {{$tech['code']}}
                                </a>
                                @else {{$tech['code']}}
                            @endif

                        </td>
                        <td>{{$tech['name']}}</td>
                        <td>
                            <a target="_blank" href="/CIAN_files/ISO-IEC-17025.pdf#{{$tech['section']['route']}}" >
                                {{$tech['section']['section']}}
                            </a>
                        </td>
                        <td>{{$tech['version']}}</td>
                        <td>{{date('d/M/Y',strtotime($tech['created_at']))}}</td>
                    </tr>
                    @foreach($tech['format_files'] as $formatTech)
                        <tr class="info">
                            <td></td>
                            <td>
                                <a  target="_blank" href="/archivos/procedimientos/1/2/{{$formatTech['originalName']}}">
                                    &#8226 {{$formatTech['code']}}
                                </a>
                            </td>
                            <td>
                                {{$formatTech['title']}}
                            </td>
                            <td></td>
                            <td></td>
                            <td>{{date('d/M/Y',strtotime($formatTech['created_at']))}}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>

@endsection
