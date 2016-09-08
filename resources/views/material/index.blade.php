@extends('app')

@section('content')
    <div class="chit-chat-layer1">
        <div class="col-md-12 chit-chat-layer1-left">
            <div class="work-progres">
                <div class="chit-chat-heading">
                    Lista de materiales
                </div>
                <a href="/administracion/materiales/create" class="hvr-icon-float-away">Nuevo material</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>Descripción</th>
                            <th>Slug</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Materials as $m)
                            <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->materialName}}</td>
                            <td>{{$m->materialDescription}}</td>
                            <td>{{$m->slug}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>

@endsection