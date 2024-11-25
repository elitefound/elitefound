function agregarPorcentaje(id){
    plan = $("#plan_"+id).val();
    porcentaje = $("#porcentaje_"+id).val();
    fecha = $("#fecha_"+id).val();

    Swal.fire({
        title: "¿Desea agregar el porcentaje de ganancia?",
        text: "Plan: "+plan+" Porcentaje: %"+porcentaje+" Fecha: "+fecha,
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
                data:{
                    id: id,
                    porcentaje: porcentaje,
                    fecha: fecha
                },
                success: function(data){
                    alert (data);
                }
            });


          Swal.fire({
            title: "Proceso completo",
            text: "porcentaje agregado exitosamente",
            icon: "success"
          });
        }
      });
}