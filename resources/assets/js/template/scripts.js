(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});



    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);
//otros
function deleteConfirm(name, idD){
  var csrf = $("meta[name='csrf_token']").attr('content');
  console.log(csrf);
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
        type:'DELETE',
        url:"/departamentos/"+idD,
        headers: {
            'X-CSRF-Token': csrf,
        },
        success: function(data){
        },
      })
      .done(function(data){
        $('#row-'+idD).fadeOut();
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

function removerElemento(){

}
