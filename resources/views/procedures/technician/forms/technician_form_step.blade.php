@extends('app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-body">
    <h4>Lista de pasos</h4>
    <hr>
    <div class="row">
      <div class="col-md-8">
        <ol id="pasos">
        </ol>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-4">
        <a class="btn btn-md btn-success" onclick="agregar()"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
      </div>
      <div class="col-md-4">
        <a class="btn btn-md btn-info" onclick="enviar()"><span class="glyphicon glyphicon-plus"></span> Enviar</a>
      </div>
      <div class="col-md-2">
      </div>
    </div>
    </div>
  </div>


@endsection

@section('scripts')
  <script>
      var num=0;
      var csrf = $("meta[name='csrf_token']").attr('content');

      function agregar() {
           num+=1;
           $('#pasos').append('<li class="esk">'+
                   '<div class="input-group">'+
                   '<input placeholder="descripcion del paso" name="step[]" class="form-control step"/>'+
                   '<span class="input-group-btn step'+num+'"><a class="btn btn-danger" onclick="eliminar('+num+')" >'+
                   '<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>'+
                   '</div></li>')
       }
      function eliminar(num) {
          var item = $('span.step'+num).closest('li.esk').fadeOut();
          item.remove();
      }

      function validar(){
        var i=0;
        var flag = true;
        var pasos = [];
        $('input.step').each(function(){
          if($(this).val() == "" ){
            $(this).addClass("has-warning");
            flag = false;
          }
          i+=1;
        });
        return flag;
      }

      function enviar(proc){
        var i=0;
        var pasos = [];
        $('input.step').each(function(){
          pasos[i]= $(this).val();
          i+=1;
        });
        if (validar()) {
          swal({
            title: "¿Esta seguro de guardar?",
            text: "se estableceran los pasos",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#658DF3",
            confirmButtonText: "Guardar",
            closeOnConfirm: false
          },
           function(){
             $.ajax({
               type: "POST",
               url: "#",
               headers: {
                   'X-CSRF-Token': csrf,
               },
               data:{
                 steps: pasos,
                 id_proc: proc
               },
               success: function(data){
                 swal("Subido con exito", "Se han registrado los pasos", "success");
               },
               error: function(data){
                 swal("Error", "Problemas al subir", "error");
               }
             })
          }
         )
       }else {
         swal("Error", "No pueden haber pasos vacios", "error");
       }};
  </script>
@endsection
