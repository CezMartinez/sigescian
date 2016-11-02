var listaArchivos= [];
var listaFlujogramas= [];
var listaAnexos= [];
var listaProcedimientos= [];
var url;
var procedureId = id_administrative;
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
                url = "/archivos/procedimientos/formatos/"+procedureId+'/1';
            }
            if(radioValue==2){
                url = "/archivos/procedimientos/flujograma/"+procedureId;
            }
            if(radioValue==3){
                url = "/archivos/procedimientos/anexos/"+procedureId+'/1';
            }
            if(radioValue==4){
                url = "/archivos/procedimientos/procedimiento/"+procedureId+'/1';
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
                    if(radioValue==1){
                        listaArchivos=[];
                        listaArchivos.push('<div class="lista-formatos">')
                        $.each(data, function(i, item){
                            listaArchivos.push('<li id="file-formato-'+item.id+'" class="list-group-item list-group-item-info">'+
                                '<a target="_blank" href="/archivos/procedimientos/1/1/'+item.originalName+'">'+
                                item.title+'</a>'+
                                '<i class="fa fa-times pull-right" onclick="deleteFile(\''+
                                item.originalName+'\',\''+id_administrative+'\',\''+item.id+'\''+
                                ',\'formato\',\'/procedimiento/archivos/formato/\')"></i></li>')
                        });
                        listaArchivos.push('</div>')

                        $('div.lista-formatos').replaceWith(listaArchivos.join(''));
                        swal("Agregado",'El formato fue agregado con exito',"success");
                    }
                    if(radioValue==2){
                        listaFlujogramas=[];
                        listaFlujogramas.pop();
                        listaFlujogramas.push('<div class="lista-flujogramas">')
                        $.each(data, function(i, item){
                            listaFlujogramas.push('' +
                                '<li id="file-flujograma-'+item.id+'" class="list-group-item list-group-item-info">'+
                                '<a target="_blank" href="/archivos/procedimientos/2/1/'+item.originalName+'">'+
                                item.title+'</a>'+
                                '<i class="fa fa-times pull-right" onclick="deleteFile(\''+
                                item.originalName+'\',\''+id_administrative+'\',\''+item.id+'\''+
                                ',\'flujograma\',\'/procedimiento/archivos/flujograma/\')"></i></li>')
                        });
                        listaFlujogramas.push('</div>')

                        $('div.lista-flujogramas').replaceWith(listaFlujogramas.join(''));
                        swal("Agregado",'El Flujograma fue agregado con exito',"success");
                    }
                    if(radioValue==3){
                        listaAnexos=[];
                        listaAnexos.push('<div class="lista-anexos">')
                        $.each(data, function(i, item){
                            listaAnexos.push(
                                '<li id="file-anexo-'+item.id+'" ' +
                                'class="list-group-item list-group-item-info">'+
                                '<a target="_blank" href="/archivos/procedimientos/3/1/' +item.originalName+ '">'
                                +item.title+
                                '</a>'+
                                '<i class="fa fa-times pull-right" ' +
                                'onclick="deleteFile(\'' +item.originalName+ '\',\''+id_administrative+'\',\'' +item.id+ '\''+
                                ',\'anexo\',\'/procedimiento/archivos/anexo/\')">' +
                                '</i>' +
                                '</li>')
                        });
                        listaAnexos.push('</div>')

                        $('div.lista-anexos').replaceWith(listaAnexos.join(''));
                        swal("Agregado",'El Anexo fue agregado con exito',"success");
                    }
                    if(radioValue==4){
                        listaProcedimientos=[];
                        listaProcedimientos.push('<div class="lista-procedimientos">')
                        $.each(data, function(i, item){
                            listaProcedimientos.push(
                                '<li id="file-procedimiento-'+item.id+'" ' +
                                'class="list-group-item list-group-item-info">'+
                                '<a target="_blank" href="/archivos/procedimientos/4/1/' +item.originalName+ '">'
                                +item.title+
                                '</a>'+
                                '<i class="fa fa-times pull-right" ' +
                                'onclick="deleteFile(\'' +item.originalName+ '\',\''+id_administrative+'\',\'' +item.id+ '\''+
                                ',\'procedimiento\',\'/procedimiento/archivos/procedimiento/\')">' +
                                '</i>' +
                                '</li>')
                        });
                        listaProcedimientos.push('</div>')

                        $('div.lista-procedimientos').replaceWith(listaProcedimientos.join(''));
                        swal("Agregado",'El Documento del Procedimiento fue agregado con exito',"success");
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
                        url:url+idProcedure+'/'+idAnnexedFile+'/1',
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
