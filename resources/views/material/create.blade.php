@extends('app')

@section('content')

    <div class="signup-block">
        <div class="chit-chat-heading">
            Nuevo material
        </div>
        <form action="/administracion/materiales" method="post">
            {{ csrf_field() }}
            <input type="text" name="materialName" placeholder="Nombre" required="">
            <textarea name="materialDescription" placeholder="Descripcion"></textarea>
            <input type="submit" name="Crear" value="Crear">
        </form>
    </div>

@endsection