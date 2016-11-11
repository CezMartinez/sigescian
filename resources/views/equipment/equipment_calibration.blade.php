@extends('app')
    
@section('content')
    
    <h1>Equipo: {{$equipments->name}}</h1>
    <hr/>
    <div class="row">
        <div class="col-md-10">
            @include('equipment.form_equipment.form_equipment_calibration')
        </div>
    </div>
    
@endsection


@section('scripts')
    <script>
        function calibrar(){
            var fecha = $("#date_calibration").val();
            var dias = $("#days_of_calibration").val();
            var compania = $("#calibrate_company").val();

            if(compania != "" && dias != ""){
                mostrarMensaje(fecha,dias,compania);
            }else{
                swal("Error","Todos los campos son requeridos","error");
            }
        }

        $('input[type=number]').numeric();

        function mostrarMensaje(fecha,dias,compania){

            var csrf = $("meta[name='csrf_token']").attr('content');

            swal({
                        title: "¿Los datos esta correctos?",
                        text: "Fecha de calibracion: "+fecha+"\n Duracion de la calibracion: "+dias+" dias.\n ¿Desea continuar?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3c3cf2",
                        confirmButtonText: "Calibrar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm:true,
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $.ajax({
                                type:'POST',
                                url:"/equipos/{{$equipments->id}}/calibrate",
                                headers: {
                                    'X-CSRF-Token': csrf,
                                },
                                data:{
                                    date_calibration: fecha,
                                    days_of_calibration: dias,
                                    calibrate_company: compania,
                                },
                                success: function(data){
                                    swal("Calibrado",data,"success");
                                    setTimeout(function(){
                                        document.location = "/equipos/{{$equipments->id}}";
                                    },2000);
                                },
                                error: function(data){
                                    swal("Error",data.responseText,"error");
                                }
                            })
                        }else {
                            swal("Cancelado","El registro no ha sido modificado.","error");
                        }
                    })

        }
    </script>
@endsection