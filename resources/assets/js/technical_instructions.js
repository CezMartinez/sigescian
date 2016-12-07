<!-- Script de Pasos -->

var num = 0;
var csrf = $("meta[name='csrf_token']").attr('content');

function agregar()
{
    $('#instructions').animate({scrollTop: $('#instructions').prop("scrollHeight")}, 420);
    num += 1;
    $('#pasos').append('<li class="esk">' +
        '<div class="instruction-div"> ' +
        '<lable for="step[]" class="instruction-lable">'+num+'.</lable>' +
        '<input placeholder="Descripcion del paso" id=' + num + ' name="instructions[]" class="form-control step instruction-input" required/>' +
        '<span class="instruction-button step' + num + '"><a class="eliminarpaso btn btn-danger" onclick="eliminar('+num+')" >' +
        '<span class="glyphicon glyphicon-remove"></span>Eliminar</a></span>' +
        '</div></li>')
}

function eliminar(numero)
{
    var item = $('span.step' + numero).closest('li.esk').fadeOut();
    num -=1;
    item.remove();
}

function validar()
{
    var i = 0;
    var flag = true;
    var pasos = [];
    $('input.step').each(function ()
    {
        if ($(this).val() == "") {
            $(this).addClass("has-warning");
            flag = false;
        }
        i += 1;
    });
    return flag;
}

function enviar(procedureId)
{
    var i = 0;
    var pasos = [];
    var id_instrucciones = [];
    $('input.step').each(function ()
    {
        pasos[i] = $(this).val();
        id_instrucciones[i] = $(this).attr('id');
        i += 1;
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
            function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/pasos/procedimientos/tecnicos/" + procedureId,
                    headers: {
                        'X-CSRF-Token': csrf,
                    },
                    data: {
                        steps: pasos,
                        id_instrucciones: id_instrucciones,
                    },
                    success: function (data)
                    {
                        console.log(data);
                        swal("Subido con exito", "Se han registrado los pasos", "success");
                    },
                    error: function (data)
                    {
                        swal("Error", "Problemas al subir", "error");
                    }
                })
            }
        )
    } else {
        swal("Error", "No pueden haber pasos vacios", "error");
    }
}

