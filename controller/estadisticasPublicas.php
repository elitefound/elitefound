<?php

require_once('../../config-ext.php');

$valorAsociados = 0;
$valorTransacciones = 0;
$valorPagosTotal = 0;

// Asociados: cuentas de usuario confirmadas, excluyendo administradores.
// Transacciones: depósitos y solicitudes de retiro registradas.
// Pagos: cantidad de retiros que ya fueron procesados.
$sqlEstadisticas = "
    SELECT
        (SELECT COUNT(*)
         FROM user
         WHERE UserTipo = 2 AND confirma = 1) AS asociados,
        ((SELECT COUNT(*) FROM depositos) +
         (SELECT COUNT(*) FROM retiros)) AS transacciones,
        (SELECT COUNT(*)
         FROM retiros
         WHERE estado = 1) AS pagos
";

$resultadoEstadisticas = $conn->query($sqlEstadisticas);

if ($resultadoEstadisticas !== false) {
    $estadisticas = $resultadoEstadisticas->fetch_assoc();
    $valorAsociados = (int)$estadisticas['asociados'];
    $valorTransacciones = (int)$estadisticas['transacciones'];
    $valorPagosTotal = (int)$estadisticas['pagos'];
}
