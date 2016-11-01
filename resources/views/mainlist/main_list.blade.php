@extends('app')

@section('content')

    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <th>Codigo</th>
            <th>Titulo</th>
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
                        </tr>
                @endforeach
            @endforeach



            @foreach($techproceds as $key => $value)
                <tr>
                    <th colspan="6" style="text-align: center">{{$laboratory->where('id',$key)->get(['name'])->toarray()[0]['name']}}</th>
                </tr>

                @foreach($value as $tech)
                    <tr>
                        <td>{{$tech['code']}}</td>
                        <td>{{$tech['name']}}</td>
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
                        </tr>
                    @endforeach
                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>

@endsection