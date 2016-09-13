@extends('app')

@section('content')

    <a href="/departamentos/create" class="btn btn-primary">Agregar Departamento</a>
    <hr>
    <div class="table-responsive">

        <table class="table table-hover table-bordered">
            <thead>
                <th>
                    nombre
                </th>
                <th>descripcion</th>
                <th>acciones</th>
            </thead>
            <tbody>
                @foreach($departments as $deparment)
                    <tr id="row-{{$deparment->id}}">
                        <td>
                            {{$deparment->name}}
                        </td>
                        <td>
                            {{$deparment->description}}
                        </td>
                        <td>
                            <div class="acciones" >
                                <a href="/departamentos/{{$deparment->slug}}/edit" class="btn btn-sm btn-success">Editar</a> |
                                <a class="btn btn-sm btn-danger" onclick="deleteConfirm('<?php echo($deparment->name)?>','<?php echo($deparment->id)?>')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$departments->links()}}
    </div>
    <script>
    function deleteConfirm(name, idD){
      swal({
        title: "Esta seguro de eliminar "+name+"?",
        text: "Esta accion no puede ser revertida",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3c3cf2",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        closeOnConfirm:false,
        closeOnCancel:false,
      },
      function(isConfirm){
        if (isConfirm) {
          $.ajax({
            type:"POST",
            url:"/departamentos/"+idD,
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data){
            },
          })
          .done(function(data){
            swal("Eliminado","El registro fue eliminado con exito.","success");
          })
          .error(function(data){
            swal("Error","El registro no ha sido modificado.","error");
          });
        }else {
          swal("Cancelado","El registro no ha sido modificado.","error");
        }
      });
    }
    </script>
@endsection
