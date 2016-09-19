@extends('app')
@section('content')
    <form role="form">
        <div class="form-group">
            <label for="nombre">Nombre del procedimiento</label>
            <input class="form-control" name="nombre">
        </div>

        <div class="form-group">
            <label  for="descripcion">Descripcion</label>
            <textarea class="form-control" name="descripcion"></textarea>
        </div>
        <h4><strong>Pasos</strong></h4>
        <hr>

        <div id="pasos">

        </div>
        <div class="form-group">
            <a class="btn btn-lg btn-success" onclick="agregar()"><span class="glyphicon glyphicon-plus"></span> Agregar</a>

        </div>


        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
@endsection('content')

@section('scripts')
    <script>
        var stepn=0;
        function agregar() {
            stepn+=1;
            $('#pasos').append('<div class="eln">'+
                    '<label>Paso'+' '+stepn+
                            '<div class="input-group">'+
                    '</label>'+' <input placeholder="ola ke ase" name="step[]" class="form-control"/>'+
                    '<span class="input-group-btn"><button class="btn btn-danger" onclick="eliminar()"><span class="glyphicon glyphicon-remove"></span></button>Eliminar</span>'+'</div></div>' +
            '<hr>');
        }

        function eliminar() {
            $(this).closest('div.eln').fadeOut();
        }

    </script>
@endsection('scripts')