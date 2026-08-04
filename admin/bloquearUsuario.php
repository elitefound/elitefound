<?php
session_start();

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !isset($_SESSION['loggedin'], $_SESSION['UserTipo']) ||
    $_SESSION['loggedin'] !== true ||
    $_SESSION['UserTipo'] != '1'
) {
    http_response_code(403);
    echo 'ERROR_NO_AUTORIZADO';
    exit;
}

$idUser = filter_input(INPUT_POST, 'idUser', FILTER_VALIDATE_INT);
$bloqueado = filter_input(INPUT_POST, 'bloqueado', FILTER_VALIDATE_INT);

if (
    $idUser === false || $idUser === null || $idUser <= 0 ||
    $bloqueado === false || $bloqueado === null ||
    !in_array($bloqueado, [0, 1], true)
) {
    http_response_code(400);
    echo 'ERROR_DATOS_INVALIDOS';
    exit;
}

require_once('../../../config-ext.php');

// Sólo se administran cuentas de usuario; una cuenta administrativa no puede bloquearse aquí.
$stmt = $conn->prepare(
    'UPDATE user SET bloqueado = ? WHERE id_user = ? AND UserTipo = 2'
);

if ($stmt === false) {
    http_response_code(500);
    echo 'ERROR_CONSULTA';
    exit;
}

$stmt->bind_param('ii', $bloqueado, $idUser);

if (!$stmt->execute()) {
    $stmt->close();
    http_response_code(500);
    echo 'ERROR_ACTUALIZACION';
    exit;
}

$actualizado = $stmt->affected_rows === 1;
$stmt->close();

if (!$actualizado) {
    http_response_code(409);
    echo 'ERROR_SIN_CAMBIOS';
    exit;
}

echo 'OK';
