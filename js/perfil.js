function addBilletera(){
    var Billetera = $("#Billetera").val();
    var linkBilletera = $("#linkBilletera").val();
    var Iduser = $("#Iduser").val();

    if(Billetera === "" || linkBilletera === ""){
        alert ("Faltan datos por completar");
    }else{
        $.ajax({
            url: './controller/addBilletera.php',
            type: 'POST',
            data:{
                Billetera: Billetera,
                linkBilletera: linkBilletera,
                Iduser: Iduser
            },
            success: function(data){
                $("#resultadoBilletera").html(data);
                $("#Billetera").val("");
                $("#linkBilletera").val("");
            }
        });
    }
    
}

function eliminarBilletera(dato){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('¡Acción confirmada!', '', 'success');
            var Iduser = $("#Iduser").val();
            $.ajax({
                url: './controller/removeBilletera.php',
                type: 'POST',
                data:{
                    dato: dato,
                    Iduser: Iduser
                },
                success: function(data){
                    $("#resultadoBilletera").html(data);
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Acción cancelada', '', 'error');
            return;
        }
    });
}

function passActualizar(){
    var Iduser = $("#Iduser").val();
    var PassActual = $("#PassActual").val();
    var PassNueva = $("#PassNueva").val();
    var PassRepeat = $("#PassRepeat").val();

    if(PassNueva === PassRepeat){
        var pass = PassRepeat;
        if(pass != PassActual){
            var proceder = true;

            var err_form4 = /[\-_*./()&$!#%+=@]/g;
            var err_form3 = /[\d]/g;
            var err_form2 = /[A-Z]/g;
            var err_form1 = /[a-z]/g;
            var numeroCaracteres = pass.length;
            var palabras = pass.split(" ");
        
            if(numeroCaracteres < 8){
                proceder = false
            }
            
            if(!err_form1.test(pass)){
                proceder = false
            }
        
            if(!err_form2.test(pass)){
                proceder = false
            }
        
            if(!err_form3.test(pass)){
                proceder = false
            }
        
            if(!err_form4.test(pass)){
                proceder = false
            }
        
            if (palabras.length != 1) {
                proceder = false;
            }

            if(proceder === true){

                $("#PassNueva").removeClass("is-invalid");
                $("#PassRepeat").removeClass("is-invalid");
                $("#PassActual").removeClass("is-invalid");

                $.ajax({
                    url: './controller/passActualizar.php',
                    type: 'POST',
                    data:{
                        PassActual: PassActual,
                        PassNueva: PassNueva,
                        PassRepeat: PassRepeat,
                        Iduser: Iduser
                    },
                    success: function(data){
                        if (data === "Bien"){
                            $("#PassNueva").addClass("is-valid");
                            $("#PassRepeat").addClass("is-valid");
                            $("#PassActual").addClass("is-valid");

                            Swal.fire('Contraseña actualizada con éxito', '', 'success');
                            return;
                        }else{
                            $("#PassNueva").removeClass("is-valid").addClass("is-invalid");
                            $("#PassRepeat").removeClass("is-valid").addClass("is-invalid");
                            $("#PassActual").removeClass("is-valid").addClass("is-invalid");

                            Swal.fire({
                                title: "Acción cancelada",
                                text: data,
                                icon: "error"
                            });
                            return;
                        }
                    }
                });

            }else{
                $("#PassNueva").removeClass("is-valid").addClass("is-invalid");
                $("#PassRepeat").removeClass("is-valid").addClass("is-invalid");
                Swal.fire({
                    title: "Acción cancelada",
                    text: "No cumple con las características mínimas de contraseña, mínimo 8 caracteres de longitud, una letra mayúscula y una minúscula, un número y un carácter que no sea una letra ni número.",
                    icon: "error"
                });
                return;
            }

        }else{
            $("#PassNueva").removeClass("is-valid").addClass("is-invalid");
            $("#PassRepeat").removeClass("is-valid").addClass("is-invalid");
            $("#PassActual").removeClass("is-valid").addClass("is-invalid");
            Swal.fire({
                title: "Acción cancelada",
                text: "La contraseña actual debe ser diferente a la nueva",
                icon: "error"
            });
            return;
        }
        
    }else{
        $("#PassNueva").removeClass("is-valid").addClass("is-invalid");
        $("#PassRepeat").removeClass("is-valid").addClass("is-invalid");
        Swal.fire({
            title: "Acción cancelada",
            text: "No coinciden las contraseñas",
            icon: "error"
        });
        return;
    }
}