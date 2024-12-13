function cargarRetiro(){
    ganancias = $("#ganancias").val();
    capital = $("#Planes").val();
    Planes = $("#Planes option:selected").text();
    
    mensaje = "";
    var capitalInt = 0;
    var total = 0;

    if(ganancias <= 10 && capital === ""){
        mensaje += '<p><abbr title="HyperText Markup Language" class="initialism">no te alcanza, debes tener mas de $10 USD por costo de retiro</abbr></p>';
        total = 0;
    }else{
        mensaje += '<p><abbr title="HyperText Markup Language" class="initialism">Toda transacción tiene un costo de $10 USD</abbr></p>';
        if (Planes === "Seleccione") {
            total = parseFloat(ganancias) - 10;
        } else {
            partes = Planes.split('][');
            var ultimoTermino = partes[2].replace(']', '').trim();
            capitalInt = parseInt((partes[1].replace('$US:', '').trim()), 10);
            if (ultimoTermino == "Anticipación"){
                mensaje += '<p><abbr title="HyperText Markup Language" class="initialism">Por retiro anticipado se cobra el 30% de su deposito</abbr></p>';
                total = (capitalInt * 0.7) + parseFloat(ganancias) - 10;
            }else{
                total = (capitalInt) + parseFloat(ganancias) - 10;
            }
        }
    }

    $('#totales').val(total.toFixed(3));   
    $("#verGanacia").html(ganancias);
    $("#mensajeRetiros").html(mensaje);
}