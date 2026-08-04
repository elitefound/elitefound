document.addEventListener('DOMContentLoaded', function () {
    var seccionEstadisticas = document.querySelector('.seccion_2');
    if (!seccionEstadisticas) {
        return;
    }

    var contadores = seccionEstadisticas.querySelectorAll('.contador-valor');
    if (contadores.length === 0) {
        return;
    }

    var formateador = new Intl.NumberFormat('en-US', { maximumFractionDigits: 0 });

    function mostrarValoresFinales() {
        contadores.forEach(function (contador) {
            contador.textContent = formateador.format(Number(contador.dataset.total) || 0);
        });
    }

    contadores.forEach(function (contador) {
        contador.textContent = '0';
    });

    var animacionIniciada = false;
    var temporizadorVisibilidad = null;

    function iniciarAnimacion() {
        if (animacionIniciada) {
            return;
        }

        animacionIniciada = true;
        window.removeEventListener('scroll', solicitarRevision);
        window.removeEventListener('resize', solicitarRevision);
        if (temporizadorVisibilidad !== null) {
            window.clearInterval(temporizadorVisibilidad);
        }

        var inicio = Date.now();
        var duracion = 1600;

        var intervalo = window.setInterval(function () {
            var tiempoActual = Date.now();
            var progreso = Math.min((tiempoActual - inicio) / duracion, 1);
            var progresoSuavizado = 1 - Math.pow(1 - progreso, 3);

            contadores.forEach(function (contador) {
                var total = Number(contador.dataset.total) || 0;
                contador.textContent = formateador.format(Math.round(total * progresoSuavizado));
            });

            if (progreso >= 1) {
                window.clearInterval(intervalo);
                mostrarValoresFinales();
            }
        }, 16);
    }

    function revisarVisibilidad() {
        var posicion = seccionEstadisticas.getBoundingClientRect();
        var limiteActivacion = window.innerHeight * 0.85;

        if (posicion.top <= limiteActivacion && posicion.bottom >= 0) {
            iniciarAnimacion();
        }
    }

    function solicitarRevision() {
        if (animacionIniciada) {
            return;
        }

        revisarVisibilidad();
    }

    window.addEventListener('scroll', solicitarRevision, { passive: true });
    window.addEventListener('resize', solicitarRevision);
    temporizadorVisibilidad = window.setInterval(revisarVisibilidad, 100);
    solicitarRevision();
});
