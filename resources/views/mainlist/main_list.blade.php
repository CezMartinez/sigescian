@extends('app')

@section('content')

    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Seccion Norma</th>
            <th>Version</th>
            <th>Fecha Revision</th>


            </thead>
            <tbody>

            @foreach($adminproceds as $admin)
                <tr id="row-{{$admin->id}}" class="{{($admin->state) ? '':'info'}}">
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
                    <td></td>
                    <td></td>

                </tr>
                @foreach($admin->formatFiles as $formatAdm)
                        <tr class="info">
                            <td>
                                <a  target="_blank" href="/archivos/procedimientos/1/1/{{$formatAdm->originalName}}">
                                    {{$formatAdm->code}}
                                </a>
                            </td>
                            <td>
                                {{$formatAdm->title}}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($tech['format_files'] as $formatTech)
                        <tr class="info">
                            <td>
                                <a  target="_blank" href="/archivos/procedimientos/1/2/{{$formatTech['originalName']}}">
                                    {{$formatTech['code']}}
                                </a>
                            </td>
                            <td>
                                {{$formatTech['title']}}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>

@endsection