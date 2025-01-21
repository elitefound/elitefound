function retiro(variable){
    Swal.fire({
        title: "¿Desea aceptar este retiro?",
        text: "Si acepta no podrá revertir la decisión",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, deseo agregar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'retiroProcesar.php',
                type: 'POST',
                data: {
                    dato: variable
                },
                success: function(data) {
                    Swal.fire({
                        title: "Proceso completo",
                        text: "Retiro aceptado",
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
        }else{
            Swal.fire({
                title: "Alerta",
                text: "El retiro no fue aceptado",
                icon: "warning"
            });
        }
    });
}