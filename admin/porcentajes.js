function agregarPorcentaje(id) {
  const plan = $("#plan_" + id).val();
  const porcentaje = $("#porcentaje_" + id).val();
  const fecha = $("#fecha_" + id).val();
  const tiempo = $("#tiempo_" + id).val();
  
if(porcentaje == 0 || porcentaje == null){
  return;
}

    Swal.fire({
        title: "¿Desea agregar el porcentaje de ganancia?",
        text: "Plan: " + plan + " Porcentaje: %" + porcentaje + " Fecha: " + fecha,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, deseo agregar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'rentavariable.php',
                type: 'POST',
                data: {
                    id: id,
                    porcentaje: porcentaje,
                    fecha: fecha
                },
                success: function(data) {
                    Swal.fire({
                        title: "Proceso completo",
                        text: data,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error",
                        text: "Ocurrió un error al procesar la solicitud.",
                        icon: "error"
                    });
                }
            });
        }
    });
}

function eliminarPorcentaje(id){
  Swal.fire({
    title: "Eliminar",
    text: "¿Desea eliminar el porcentaje de ganancia?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, deseo eliminarlo"
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: 'eliminarporcentajes.php',
            type: 'POST',
            data:{
                id: id
            },
            success: function(data){
              location.reload();
            }
        });


      Swal.fire({
        title: "Proceso completo",
        text: "porcentajes eliminados exitosamente",
        icon: "success"
      });
    }
  });
}