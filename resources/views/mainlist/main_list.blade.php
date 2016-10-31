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
                        <a href="/procedimientos/administrativos/{{$admin->id}}">{{$admin->code}}</a>
                    </td>
                    <td>
                        {{$admin->name}}
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                    </td>

                </tr>
                @foreach($admin->formatFiles as $formatAdm)
                        <tr>
                            <td>
                                {{$formatAdm->code}}
                            </td>
                            <td>
                                {{$formatAdm->title}}
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                            </td>
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

                @endforeach
            @endforeach

            </tbody>
        </table>

    </div>

@endsection