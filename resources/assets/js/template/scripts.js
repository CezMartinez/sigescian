function deleteConfirm(name, idD, url){
    var csrf = $("meta[name='csrf_token']").attr('content');
    console.log(csrf);
    swal({
            title: "¿Esta seguro de eliminar "+name+"?",
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
                        url:url+idD,
                        headers: {
                            'X-CSRF-Token': csrf,
                        },
                        success: function(data){

                        },
                    })
                    .done(function(data){
                        $('#row-'+idD).fadeOut();
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

function removerElemento(){

}

//parte de mascaras
$( document ).ready(function() {
    $(".tipofecha").mask('00/00/0000');
    $(".otro").mask('AAA 000-S0S');
});