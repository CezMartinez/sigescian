var listaArchivos= [];
var listaAnexos= [];
var url;
var procedureId = id_tecnico;
var radioValue;
Dropzone.options.uploadFile= {
        maxFilesize: 2, // MB
        parallelUploads: 1,
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
                            listaArchivos=[];
                            listaArchivos.push('<div class="lista-formatos">')
                            $.each(data, function(i, item){
                                listaArchivos.push('<li id="file-formato-'+item.id+'" class="list-group-item list-group-item-info">'+
                                    '<a target="_blank" href="/archivos/procedimientos/1/2/'+item.originalName+' ">'+
                                    item.title+'</a>'+
                                    '<i class="fa fa-times pull-right" onclick="deleteFile(\''+
                                    item.originalName+'\',\''+id_tecnico+'\',\''+item.id+'\''+
                                    ',\'formato\',\'/procedimiento/archivos/formato/\')"></i></li>')
                            });
                            listaArchivos.push('</div>')

                            $('div.lista-formatos').replaceWith(listaArchivos.join(''));
                            swal("Agregado",'El formato fue agregado con exito',"success");
                        }
                        if(radioValue == 3){
                            listaAnexos=[];
                            listaAnexos.push('<div class="lista-anexos">')
                            $.each(data, function(i, item){
                                listaAnexos.push(
                                    '<li id="file-anexo-'+item.id+'" ' +
                                    'class="list-group-item list-group-item-info">'+
                                    '<a target="_blank" href="/archivos/procedimientos/3/2/' +item.originalName+ '">'
                                    +item.title+
                                    '</a>'+
                                    '<i class="fa fa-times pull-right" ' +
                                    'onclick="deleteFile(\'' +item.originalName+ '\',\''+id_tecnico+'\',\'' +item.id+ '\''+
                                    ',\'anexo\',\'/procedimiento/archivos/anexo/\')">' +
                                    '</i>' +
                                    '</li>')
                            });
                            listaAnexos.push('</div>')

                            $('div.lista-anexos').replaceWith(listaAnexos.join(''));
                            swal("Agregado",'El Anexo fue agregado con exito',"success");
                        }
                    })
                    .error(function(data){
                        console.log(data);
                        swal("Error",data.responseText,"error");
                    });
                var self = this;
                setTimeout(function(){
                    self.removeFile(file);
                },3500);
            });
        }
    }

    function deleteFile(nameFile,idProcedure,idAnnexedFile,tipo, url){
        var csrf = $("meta[name='csrf_token']").attr('content');

        swal({
                title: "¿Esta seguro de eliminar "+nameFile+"?",
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

    <!-- Script de Pasos -->

var num=0;
var csrf = $("meta[name='csrf_token']").attr('content');

function agregar() {
    num+=1;
    $('#pasos').append('<li class="esk">'+
        '<div class="input-group">'+
        '<input placeholder="Descripcion del paso" name="step[]" class="form-control step"/>'+
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

function enviar(procedureId){
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
                    url: "/pasos/procedimientos/tecnicos/"+procedureId,
                    headers: {
                        'X-CSRF-Token': csrf,
                    },
                    data:{
                        steps: pasos
                    },
                    success: function(data){
                        console.log(data);
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

