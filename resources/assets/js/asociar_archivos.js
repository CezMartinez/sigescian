
/**
 * Created by otro on 4/11/16.
 */
$(document).ready(function ()
{
    initData()
});
function changedata(elemen_id, second_element, url)
{
    $("#" + second_element).removeAttr('disabled', false)
    $("#" + second_element).empty()
    var id_procedure = $("#" + elemen_id).val();
    url = url + id_procedure;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#" + second_element).select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
}
/**
 * Asociar procedimiento con archivo
 *
 * @param url
 * @param file_tipe
 * @param id_procedure
 */
function asociar(url, second_el)
{
    var second_element = $("#" + second_el);
    var files = second_element.val();
    var csrf = $("meta[name='csrf_token']").attr('content');
    if(files == null){
        swal("Error", "Tienes que seleccionar uno o mas archivos", "error");
    }else{
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-Token': csrf,
            },
            data: {
                files: files,
            },
            success: function ()
            {
                refreshlist(second_el)
            },
            error: function (data)
            {
                swal("Error", "data", "error");
            }
        })
    }
}

function refreshlist(elemento){
    var link = "";
    if(elemento.includes("formato-administrativo")){
        link = "/archivos/procedimientos/formatos/"+id_administrative+"/1";
    }else if(elemento.includes("anexo-administrativo"))
    {
        link = "/archivos/procedimientos/anexos/"+id_administrative+"/1";
    }else if(elemento.includes("formato-tecnico"))
    {
        link = "/archivos/procedimientos/formatos/"+id_tecnico+"/2";
    }else if(elemento.includes("anexo-tecnico")){
        link = "/archivos/procedimientos/anexos/"+id_tecnico+"/2";
    }
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: link,
        success: function (json)
        {
            if(elemento.includes("formato-administrativo")){
                $("#" + elemento).select2("val",null);
                agregarFormato(listaArchivos,json)
            }else if(elemento.includes("anexo-administrativo"))
            {
                $("#" + elemento).select2("val",null);
                agregarAnexos(listaAnexos,json)
            }else if(elemento.includes("formato-tecnico"))
            {
                $("#" + elemento).select2("val",null);
                agregarFormato(listaArchivos,json)
            }else if(elemento.includes("anexo-tecnico")){
                $("#" + elemento).select2("val",null);
                agregarAnexos(listaAnexos,json)
            }
        },
        error: function (json){
            swal("Error", json, "error");
        },
    })
}

function procedureType()
{
    return document.URL.includes('administrativos') ? 'administrativo':'tecnico';
}
function initData()
{
    $('#procedimiento-'+procedureType()+'-formato').select2({
        placeholder: "Seleccione un procedimiento"
    });
    $('#archivo-formato-'+procedureType()+'').select2({
        placeholder: "Seleccione Un formato",
    })

    $('#procedimiento-'+procedureType()+'-anexo').select2({
        placeholder: "Seleccione un procedimiento"
    });
    $('#archivo-anexo-'+procedureType()+'').select2({
        placeholder: "Seleccione un anexo",
    })
    var url_formato = "/informacion/formato/"+procedureType()+"/"
    var url_anexo = "/informacion/anexo/"+procedureType()+"/"
    $("#archivo-formato-"+procedureType()+"").empty()
    $("#archivo-anexo-"+procedureType()+"").empty()
    var id_procedure_formato = $("#procedimiento-"+procedureType()+"-formato").val()
    var id_procedure_anexo = $("#procedimiento-"+procedureType()+"-anexo").val()
    url_formato = url_formato + id_procedure_formato;
    url_anexo = url_anexo + id_procedure_anexo;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url_formato,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#archivo-formato-"+procedureType()+"").select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: url_anexo,
        success: function (json)
        {
            var obj = json;
            var arr = [];
            for (elem in obj) {
                arr.push(obj[elem]);
            }
            $("#archivo-formato-"+procedureType()+"").select2({placeholder: "Seleccione uno o varios formatos", data: arr});
        },
    })
}
