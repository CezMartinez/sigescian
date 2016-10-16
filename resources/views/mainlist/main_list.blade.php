@extends('app')

@section('content')

    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <th>Id</th>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Version</th>
            <th>Fecha Emision</th>
            <th>Fecha Revision</th>


            </thead>
            <tbody>
            @foreach($adminproceds as $admin)
                <tr id="row-{{$admin->id}}" class="{{($admin->state) ? '':'info'}}">
                    <td>
                        {{$admin->id}}
                    </td>
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
                    <td>

                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="6" style="text-align: center">Procedimientos Técnicos</th>
            </tr>
            @foreach($techproceds as $tech)
                <tr id="row-{{$tech->id}}" class="{{($tech->state) ? '':'info'}}">
                    <td>
                        {{$tech->id}}
                    </td>
                    <td>
                        <a href="/procedimientos/tecnicos/{{$tech->id}}">{{$tech->code}}</a>
                    </td>
                    <td>
                        {{$tech->name}}
                    </td>
                    <td>
                        1
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection