$(document).ready(function() {

    if ($('#floatingInputReferido').length) {
        $('#Registro').modal('show');
    }

    $("#floatingInputNombre").keyup(function() {
        var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g;
        var nombreInput = "#floatingInputNombre";
        LetrasEspacio(nombreInput, 50, 3, 1, err_form_1);
    });

    $("#floatingInputCedula").keyup(function() {
        var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]/g;
        var nombreInput = "#floatingInputCedula";
        LetrasEspacio(nombreInput, 50, 3, 0, err_form_1);
    });

    $("#floatingInputuserName").keyup(function() {
        var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]/g;
        var nombreInput = "#floatingInputuserName";
        LetrasEspacio(nombreInput, 50, 3, 0, err_form_1);
    });

    $("#floatingInputApellido").keyup(function() {
        var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g;
        var nombreInput = "#floatingInputApellido";
        LetrasEspacio(nombreInput, 50, 3, 1, err_form_1);
    });

    $("#floatingInputemail").keyup(function() {
        var validationEmail = "#floatingInputemail";
        var err_form_3 = /([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})/g;
        CorreosValidar(validationEmail, err_form_3);
    });

    $("#floatingInputpassword").keyup(function() {
        var proceder = true;

        var nombreInput = "#floatingInputpassword";
        var valorInput = $(nombreInput).val().trim();
        var err_form4 = /[\-_*./()@&$!#%+=]/g;
        var err_form3 = /[\d]/g;
        var err_form2 = /[A-Z]/g;
        var err_form1 = /[a-z]/g;

        var numeroCaracteres = $(nombreInput).val().length;

        if(numeroCaracteres < 8){
            proceder = false
        }
        
        if(!err_form1.test(valorInput)){
            proceder = false
        }

        if(!err_form2.test(valorInput)){
            proceder = false
        }

        if(!err_form3.test(valorInput)){
            proceder = false
        }

        if(!err_form4.test(valorInput)){
            proceder = false
        }

        var palabras = valorInput.split(" ");
        if (palabras.length != 1) {
            proceder = false;
        }

        if(proceder === true){
            $(nombreInput).removeClass("is-invalid").addClass("is-valid");
        }else{
            $(nombreInput).removeClass("is-valid").addClass("is-invalid");
        }

        newPass();
    });

    $("#floatingInputpasswordConf").keyup(function() {          
        newPass(); 
    });

    $("#registrarse").click(function(){
        var proceder = true;
        var inputInvalido = $("#registroForm input.is-invalid");

        if ($('#terminosCheck').is(':checked')) {
            if (inputInvalido.length > 0) {
                proceder = false;
            }
        } else {
            proceder = false;
        }

        if(proceder == true){
            $("#registrarse").click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdDK4sqAAAAAC_ZMNbh9LH2V-BsW56Swj7QrDPz', {
                        action: 'validarUsuario'
                    }).then(function(token) {
                        $('#registroForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                        $('#registroForm').prepend('<input type="hidden" name="action" value="validarUsuario">');
                        $('#registroForm').submit();
                    });
                });
            })
        }
    });
});

function newPass(){
    var proceder = true;

    var validationNewPass = $("#floatingInputpassword");
    var validationNewPass2 = $("#floatingInputpasswordConf");
    var numeroCaracteres = validationNewPass2.val().length;

        if (validationNewPass.val() === "") {
            proceder = false;
        }

        if (numeroCaracteres < 7){
            proceder = false;
        }

        if (validationNewPass.hasClass("is-invalid")) {
            proceder = false;
        }

        if (validationNewPass.val() != validationNewPass2.val()) {
            proceder = false;
        }

        if (proceder === true){
            $(validationNewPass2).addClass("is-valid").removeClass("is-invalid");
        }else{
            $(validationNewPass2).addClass("is-invalid").removeClass("is-valid");
        }
}

function LetrasEspacio(inputId, maxLength, minLength, N_palabras, err_form){

    var input = $(inputId);
    var inputVal = input.val().trim();
    var proceder = true;

    if (!err_form.test(inputVal) && inputVal.length >= minLength && inputVal.length <= maxLength){
        
        var palabras = inputVal.split(" ");

        if (N_palabras === 0){
            if (palabras.length > 1) {
                proceder = false;
            }
        }else{
            if (palabras.length < N_palabras) {
                proceder = false;
            }
        }

    }else{
        proceder = false;     
    }

    if (proceder === true){
        $(inputId).addClass("is-valid").removeClass("is-invalid");
    }else{
        $(inputId).addClass("is-invalid").removeClass("is-valid");
    } 

}

function CorreosValidar(inputId, err_form){
    var input = $(inputId);
    var inputVal = input.val().trim();
    var proceder = true;

    if (err_form.test(inputVal) === false) {
        proceder = false;
    }

    if (proceder === true){
        $(inputId).addClass("is-valid").removeClass("is-invalid");
    }else{
        $(inputId).addClass("is-invalid").removeClass("is-valid");
    } 
}