@extends('app')

@section('content')


    <h1 style="font-size: 21px">Procedimiento: {{$procedure->code}}</h1>
    <hr>
    @include('procedures.technician.forms.technician_form_edit')


@endsection

@section('scripts')
    <script>
        $('#subsection').select2();
        $("#subsection").select2({placeholder:"Seleccione Subsecciones de norma"});
    </script>
    <script>
        function changedata() {
            var section = $('#section').val();
            var subsection = $('#subsection');
            var option = $('#subsection').children().attr('class','optionsubseccion');
            if (section == 4 || section == 5)
            {
                subsection.removeAttr('disabled',false)
                subsection.removeAttr('readonly',false)
                $.getJSON("/subsecciones/"+section, function(result) {
                    $('#subsection').find('option').remove().end()
                    $.each(result, function(key,value) {
                        $('#subsection').append($('<option>').text(value).attr('value', key));
                    });
                });
            }else{
                $('#subsection').find('option').remove().end()
                subsection.attr('disabled',true)
                subsection.attr('readonly',true)
            }
        }
    </script>
    <script !src="">
        $(document).ready(
                bringStepsOfProcedure(id_tecnico)
        );
        var listaInstrucciones = [];
        var num = 1;
        function bringStepsOfProcedure(id_procedure){
            $.ajax({
                type:'GET',
                url:"/procedimiento/instrucciones/"+id_procedure,
                success: function(data){
                    $.each(data, function(i, item){
                        num = num + 1
/*                        $('#pasos').append('<li class="esk">'+
                                '<div class="input-group">'+
                                '<input placeholder="Descripcion del paso" id='+item.id+' name="step[]" value="'+item.step+'" class="form-control step"/>'+
                                '<span class="input-group-btn step'+num+'"><a class="btn btn-danger" onclick="eliminar('+num+')" >'+
                                '<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>'+
                                '</div></li>')*/
                        $('#pasos').append('<li class="esk">' +
                                '<div class="instruction-div"> ' +
                                '<lable for="step[]" class="instruction-lable">'+num+'.</lable>' +
                                '<input placeholder="Descripcion del paso" name="instructions[]" value="'+item.step+'" class="form-control step instruction-input" required/>' +
                                /*'<input hidden name="instructions_ids[]" value="'+item.id+'" />' +*/
                                '<span class="instruction-button step' + num + '"><a class="btn btn-danger" onclick="eliminar(' + num + ')" >' +
                                '<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>' +
                                '</div></li>')
                    });
                },
            })
        }
    </script>
    <script src="/js/technical_instructions.js"></script>

@endsection