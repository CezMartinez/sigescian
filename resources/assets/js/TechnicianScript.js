var listaProcedimientos= [];
var listaArchivos= [];
var listaAnexos= [];
var url;
var procedureId = id_tecnico;
var radioValue;

Dropzone.options.uploadFile= {
    maxFilesize: 2, // MB
    parallelUploads: 1,
    dictDefaultMessage: "Seleccione un tipo de archivo y seleccione o arrestrelo aqui",
    acceptedFiles: ".pdf,.docx",
    init: function(){
        this.on("addedfile", function() {
            radioValue =  $("input[name='type']:checked"). val();
            if(radioValue === undefined){
                swal("Error",'Debe Seleccionar un tipo de archivo',"error");
                this.removeAllFiles(true);
            };
            if(radioValue==1){
                url = "/archivos/procedimientos/formatos/"+procedureId+'/2';
            }
            if(radioValue==3){
                url = "/archivos/procedimientos/anexos/"+procedureId+'/2';
            }
            if(radioValue==4){
                url = "/archivos/procedimientos/procedimiento/"+procedureId+'/2';
            }
            $('#type_hidden').val(radioValue);
            // Create the remove button
        }).ontimeout;
        this.on("success", function(file, responseText){
            $.ajax({
                type:'GET',
                url:url,
                success: function(data){
                },
            })
                .done(function(data){
                    var radioValue = $("input[name='type']:checked"). val();
                    if(radioValue == 1){
                        agregarFormato(listaArchivos,data);
                    }
                    if(radioValue == 3){
                        agregarAnexos(listaAnexos,data);
                    }
                    if (radioValue==4){
                        agregarProcedimiento(listaProcedimientos,data);
                    }
                })
                .error(function(data){
                    swal("Error",data.responseText,"error");
                });
            var self = this;
            setTimeout(function(){
                self.removeFile(file);
            },3500);
        });
        this.on("error", function(file){
            var self = this;
            setTimeout(function(){
                self.removeFile(file);
            },5500);
        });
    }
}

function deleteFile(nameFile,idProcedure,idAnnexedFile,tipo, url){
    var csrf = $("meta[name='csrf_token']").attr('content');

    swal({
            title: "¿Esta seguro de eliminar "+nameFile+"?",
            text: "Esta accion eliminara toda relacion con otros procedimientos, si existen, y no podra ser revertida.\n ¿Desea continuar?",
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
                    type:'DELETE',
                    url:url+idProcedure+'/'+idAnnexedFile+'/2',
                    headers: {
                        'X-CSRF-Token': csrf,
                    },
                    success: function(data){

                    },
                })
                    .done(function(data){
                        $('#file-'+''+tipo+'-'+idAnnexedFile).fadeOut();
                        swal("Eliminado",data,"success");
                    })
                    .error(function(data){
                        swal("Error",data.responseText,"error");
                    });
            }else {
                swal("Cancelado","El registro no ha sido modificado.","error");
            }
        });
}

function agregarAnexos(listaAnexos,data)
{
    listaAnexos = [];
    listaAnexos.push('<div class="lista-anexos">')
    $.each(data, function (i, item)
    {
        listaAnexos.push(
            '<li id="file-anexo-' + item.id + '" ' +
            'class="list-group-item list-group-item-'+owner(item.pivot.owner)+'">' +
            '<a target="_blank" href="/archivos/procedimientos/3/2/' + item.originalName + '">'
            + item.title +
            '</a>' +
            '<i class="fa fa-times pull-right" ' +
            'onclick="deleteFile(\'' + item.originalName + '\',\'' + id_tecnico + '\',\'' + item.id + '\'' +
            ',\'anexo\',\'/procedimiento/archivos/anexo/\')">' +
            '</i>' +
            '</li>')
    });
    listaAnexos.push('</div>')

    $('div.lista-anexos').replaceWith(listaAnexos.join(''));
    swal("Agregado", 'El Anexo fue agregado con exito', "success");
}
function agregarFormato(listaArchivos,data)
{
    listaArchivos = [];
    listaArchivos.push('<div class="lista-formatos">')
    $.each(data, function (i, item)
    {
        listaArchivos.push('<li id="file-formato-' + item.id + '" class="list-group-item list-group-item-'+owner(item.pivot.owner)+'">' +
            '<a target="_blank" href="/archivos/procedimientos/1/2/' + item.originalName + ' ">' +
            item.title + '</a>' +
            '<i class="fa fa-times pull-right" onclick="deleteFile(\'' +
            item.originalName + '\',\'' + id_tecnico + '\',\'' + item.id + '\'' +
            ',\'formato\',\'/procedimiento/archivos/formato/\')"></i></li>')
    });
    listaArchivos.push('</div>')

    $('div.lista-formatos').replaceWith(listaArchivos.join(''));
    swal("Agregado", 'El formato fue agregado con exito', "success");
}
function agregarProcedimiento(listaProcedimientos,data)
{
    listaProcedimientos = [];
    listaProcedimientos.push('<div class="lista-procedimientos">')
    $.each(data, function (i, item)
    {
        listaProcedimientos.push(
            '<li id="file-procedimiento-' + item.id + '" ' +
            'class="list-group-item list-group-item-info">' +
            '<a target="_blank" href="/archivos/procedimientos/4/2/' + item.originalName + '">'
            + item.title +
            '</a>' +
            '<i class="fa fa-times pull-right" ' +
            'onclick="deleteFile(\'' + item.originalName + '\',\'' + id_tecnico + '\',\'' + item.id + '\'' +
            ',\'procedimiento\',\'/procedimiento/archivos/procedimiento/\')">' +
            '</i>' +
            '</li>')
    });
    listaProcedimientos.push('</div>')

    $('div.lista-procedimientos').replaceWith(listaProcedimientos.join(''));
    swal("Agregado", 'El Documento del Procedimiento fue agregado con exito', "success");
}

function owner(data){
    return (data == 1) ? 'info':'success';
}

