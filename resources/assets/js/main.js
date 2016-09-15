function deleteConfirm(name){
  alert("hi");
  swal({
    titlle: "Esta seguro de eliminar "+name+"?",
    text: "Esta accion no puede ser revertida",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3c3cf2",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
    closeOnConfirm:false,
    closeOnCancel:false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Eliminado","El registro fue eliminado con exito.","success");
    }else {
      swal("Cancelado","El registro no ha sido modificado.","error");
    }
  });
}
