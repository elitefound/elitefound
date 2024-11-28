function Actualizar(idUser){
    $.ajax({
        url: 'tablaUser.php',
        type: 'POST',
        data:{
            idUser: idUser
        },
        success: function(data){
            let separado = data.split(",");
            let nombreInput = separado[0];
            let ApellidosInput = separado[1];
            let UserInput = separado[2];
            let EmailInput = separado[3];
            let Iduser = separado[4];

            $("#nombreInput").val(nombreInput);
            $("#ApellidosInput").val(ApellidosInput);
            $("#UserInput").val(UserInput);
            $("#EmailInput").val(EmailInput);
            $("#EmailInput").val(EmailInput);
            $("#Iduser").val(Iduser);

            $('#respuestaForm').modal('show');
            //console.log(data);
        }
    });
}

function Eliminar(idUser){
    Swal.fire({
        title: "¿Estas seguro?",
        text: "vas a eliminar un usuario",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, deseo eliminarlo"
      }).then((result) => {
        if (result.isConfirmed) {
            
            $.ajax({
                url: 'eliminarBot.php',
                type: 'POST',
                data:{
                    id: idUser
                },
                success: function(data){
                    Swal.fire({
                        title: "Proceso completo",
                        text: data,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            });
        }
      });
}

function EnviarCodigo(idUser, correo){
    Swal.fire({
        title: "¿Estas seguro?",
        text: "vas a enviar nuevamente el correo de confirmación",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, deseo enviarlo"
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: 'reenviarCodigo.php',
                type: 'POST',
                data:{
                    id: idUser,
                    correo: correo
                },
                success: function(data){
                    Swal.fire({
                        title: "Proceso completo",
                        text: data,
                        icon: "success"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            });
        }
      });
}