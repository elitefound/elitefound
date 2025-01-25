function simulador(){
    dato = $("#simuladorPlan").val();
    mostrarDatos(dato);
}

function mostrarDatos(dato){
    $('#simuladorPlan').val(dato);
    $.ajax({
        url: './controller/simulador.php',
        type: 'POST',
        data: {
            dato: dato
        },
        success: function(response) {
            $("#calculado").html(response);
        }
    });
}

function calcularSimulador(){
    var porcentajeMax = parseInt($("#PorcentajeMax").val(), 10);
    var CantidadInversion = parseInt($("#CantidadInversion").val(), 10);

    var retiroTiempo = parseInt($("#retiroTiempo").val(), 10);
    var retiroMul = parseInt($("#retiroMul").val(), 10);
    var fechaFin;
    var fechaInicio = fechaInicial();
    var ganancia = 0;

    var intereses = parseInt($("#intereses").val(), 10);

    switch (retiroTiempo) {
        case 1:
            fechaFin = contarDias(fechaInicio, retiroMul);
            break;
        case 2:
            fechaFin = contarSemanas(fechaInicio, retiroMul);
            break;
        case 3:
            fechaFin = contarMeses(fechaInicio, retiroMul);
            break;
        case 4:
            fechaFin = contarAnos(fechaInicio, retiroMul);
            break;
    }

    ganancia = CantidadInversion * (porcentajeMax / 100);

    switch (intereses) {
        case 1:
            ganaciaParcial = diaGananciaParcial(fechaInicio, fechaFin, ganancia);
            break;
        case 2:
            ganaciaParcial = semanaGananciaParcial(fechaInicio, fechaFin, ganancia);
            break;
        case 3:
            ganaciaParcial = mesGananciaParcial(fechaInicio, fechaFin, ganancia);
            break;
        case 4:
            ganaciaParcial = anoGananciaParcial(fechaInicio, fechaFin, ganancia);
            break;
    }

    fechaInicio = formatearFecha(fechaInicio);
    fechaFin = formatearFecha(fechaFin);

    $("#fechaMin").val(fechaInicio);
    $("#fechaMax").val(fechaFin);
    $("#CantidadGanancia").val(ganancia);
    $("#TotalGanancia").val(ganaciaParcial);
}

function fechaInicial(){
    var fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0);
    var diaActual = fechaActual.getDay(); 

    if (diaActual === 5 || diaActual === 6 || diaActual === 0) {
        var diasHastaLunes = (8 - diaActual) % 7;
        fechaActual.setDate(fechaActual.getDate() + diasHastaLunes);
    }else{
        fechaActual.setDate(fechaActual.getDate() + 1);
    }

    return fechaActual;
}

function formatearFecha(fechaOn){
    var fecha = new Date(fechaOn);
    var dia = String(fecha.getDate()).padStart(2, '0');
    var mes = String(fecha.getMonth() + 1).padStart(2, '0'); var año = fecha.getFullYear();
    var horas = String(fecha.getHours()).padStart(2, '0');
    var minutos = String(fecha.getMinutes()).padStart(2, '0');
        
    var fechaHoraFormateada = `${año}-${mes}-${dia}T${horas}:${minutos}`;

    return fechaHoraFormateada;
}

function contarDias(fecha, dias){
    var fechaResultado = new Date(fecha);
    var diasSumados = 0;

    while (diasSumados < dias) {
        fechaResultado.setDate(fechaResultado.getDate() + 1);
        if (fechaResultado.getDay() !== 0 && fechaResultado.getDay() !== 6) {
            diasSumados++;
        }
    }

    return fechaResultado;
}

function contarSemanas(fecha, semanas){
    var diasASumar = semanas * 7;
    var fechaResultado = new Date(fecha);

    fechaResultado.setDate(fechaResultado.getDate() + diasASumar);
    return fechaResultado;
}

function contarMeses(fecha, meses){
    var fechaResultado = new Date(fecha);

    fechaResultado.setMonth(fechaResultado.getMonth() + meses);
    return fechaResultado;
}

function contarAnos(fecha, anos){
    var fechaResultado = new Date(fecha);

    fechaResultado.setFullYear(fechaResultado.getFullYear() + anos);
    return fechaResultado;
}

function diaGananciaParcial(fechaInicio, fechaFin, ganancia){
    var inicio = new Date(fechaInicio);
    var fin = new Date(fechaFin);
    let contador = 0;
    var valor = 0;
    while (inicio <= fin) {
        let dia = inicio.getDay();
        if (dia !== 0 && dia !== 6) {
            contador++;
        }
        inicio.setDate(inicio.getDate() + 1);
    }

    contador = contador - 1

    valor = contador*ganancia;
    return valor;
}

function semanaGananciaParcial(fechaInicio, fechaFin, ganancia){
    var inicio = new Date(fechaInicio);
    var fin = new Date(fechaFin);

    let diferencia = fin - inicio;
    let semanas = Math.floor(diferencia / (1000 * 60 * 60 * 24 * 7));

    valor = semanas*ganancia;
    return valor;
}

function mesGananciaParcial(fechaInicio, fechaFin, ganancia){
    var inicio = new Date(fechaInicio);
    var fin = new Date(fechaFin);

    let añosDiferencia = fin.getFullYear() - inicio.getFullYear();
    let mesesDiferencia = fin.getMonth() - inicio.getMonth();

    let totalMeses = añosDiferencia * 12 + mesesDiferencia;

    if (fin.getDate() < inicio.getDate()) {
        totalMeses--;
    }

    valor = totalMeses*ganancia;
    return valor;
}

function anoGananciaParcial(fechaInicio, fechaFin, ganancia){
    var inicio = new Date(fechaInicio);
    var fin = new Date(fechaFin);
    
    let aniosDiferencia = fin.getFullYear() - inicio.getFullYear();

    if (fin.getMonth() < inicio.getMonth() || (fin.getMonth() === inicio.getMonth() && fin.getDate() < inicio.getDate())) {
        aniosDiferencia--;
    }

    valor = aniosDiferencia*ganancia;
    return valor;
}