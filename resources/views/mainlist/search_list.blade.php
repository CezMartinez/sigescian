@extends('app')

@section('content')

        <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <th>id</th>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Seccion Norma</th>
            <th>Version</th>
            <th>Fecha Revision</th>
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
                    <td>asdkm</td>
                    <td>kamsdk</td>

                </tr>
                @foreach($admin->formatFiles as $formatAdm)
                    <tr class="info">
                        <td></td>
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

            @foreach($techproceds as $tech)
                <tr id="row-{{$tech->id}}" class="{{($tech->state) ? '':'info'}}">
                    <td>{{$tech->correlative}}</td>
                    <td>
                        @if($tech->hasDocumentProcedure())
                            @foreach($tech->documentProcedure() as $file)
                                <a target="_blank" href="/archivos/procedimientos/4/1/{{$file->originalName}}">
                                    {{$tech->code}}
                                </a>
                            @endforeach
                        @else
                            {{$tech->code}}
                        @endif
                    </td>
                    <td>
                        {{$tech->name}}
                    </td>
                    <td>
                        <a target="_blank" href="/CIAN_files/ISO-IEC-17025.pdf#{{$tech->section->route}}" >
                            {{$tech->section->section}}
                        </a>
                    </td>
                    <td>asdkm</td>
                    <td>kamsdk</td>

                </tr>
                @foreach($tech->formatFiles as $formatAdm)
                    <tr class="info">
                        <td></td>
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



            </tbody>
        </table>

    </div>

@endsection