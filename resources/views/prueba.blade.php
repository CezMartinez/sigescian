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
            $('#pasos').append('<div id="step'+stepn+'" class="eln">'+
                    '<label>Paso'+' '+stepn+
                            '<div class="input-group">'+
                    '</label>'+' <input placeholder="Tirate un paso WA-CHI-TU-RROS" name="paso'+stepn+'" class="form-control"/>'+
                    '<span class="input-group-btn"><button class="btn btn-danger" onclick="eliminar('+stepn+')"><span class="glyphicon glyphicon-remove"></span></button>Eliminar</span>'+
                    '</div><hr></div>'
            );
        }

        function eliminar(n) {
            $('#step'+n).remove().fadeOut();
            ordenar();

        }
        
        function ordenar() {
            var i=0;
            var elements=[];
                    $('.eln').each(function (){

                        i+=1;
                        $('div#step>label').attr("value","paso "+i);
                        $('div#step'+stepn).attr("id","step"+i);

                })

        }
    </script>
@endsection('scripts')