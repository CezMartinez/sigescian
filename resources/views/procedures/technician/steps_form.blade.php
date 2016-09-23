@extends('app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-body"
    <h4>Lista de pasos</h4>
    <hr>
    <ol id="pasos">
    </ol>
    <hr>
    <div class="form-group">
       <a class="btn btn-md btn-success" onclick="agregar()"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
    </div>
    </div>
  </div>


@endsection

@section('scripts')
  <script>
      var num=0;
      function agregar() {
           num+=1;
           $('#pasos').append('<li class="esk">'+
                   '<div class="input-group">'+
                   '<input placeholder="descripcion del paso" name="step[]" class="form-control"/>'+
                   '<span class="input-group-btn step'+num+'"><a class="btn btn-danger" onclick="eliminar('+num+')" >'+
                   '<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>'+
                   '</div></li>')
       }
      function eliminar(num) {
          $('span.step'+num).closest('li.esk').fadeOut();
      }
  </script>
@endsection
