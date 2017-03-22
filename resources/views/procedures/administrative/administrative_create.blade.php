@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            @include('procedures.administrative.forms.administrative_form_create')
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        var form = $("#form-administrative").submit(function (e, params) {

            var localParams = params || {};
            console.log(localParams.send);
            if (!localParams.send) {
                e.preventDefault();
            }

            //additional input validations can be done hear
            var path = form.find('input[name=file]').val();
            var fileName = /[\w-]+(\.).*/g.exec(path);

            swal({
                title: "Agregar Archivo",
                text: "¿Desea agregar al procedimiento el archivo <strong>"+ fileName[0] +"</strong>?",
                type: "info",
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#3c3cf2",
                confirmButtonText: "Agregar",
                cancelButtonText: "Cancelar",
                closeOnConfirm:false,
                closeOnCancel:false,
            }, function (isConfirm) {
                if (isConfirm) {
                    $(e.currentTarget).trigger(e.type, { 'send': true });
                } else {

                    swal("Cancelado","No se guardo el registro","error");

                }
            });
        });

    </script>
    <script>
        $('#subsection').select2();
        $("#subsection").select2({placeholder:"Seleccione subsecciones"});
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


@endsection