<?php

function verificarUsuarioActivo($conn)
{
    if (!isset($_SESSION['id_user'])) {
        return;
    }

    $idUserSesion = filter_var($_SESSION['id_user'], FILTER_VALIDATE_INT);
    if ($idUserSesion === false || $idUserSesion === null || $idUserSesion <= 0) {
        session_destroy();
        header('Location: index.php');
        exit;
    }

    $stmtBloqueo = $conn->prepare(
        'SELECT bloqueado FROM user WHERE id_user = ? AND UserTipo = 2 LIMIT 1'
    );

    if ($stmtBloqueo === false) {
        return;
    }

    $stmtBloqueo->bind_param('i', $idUserSesion);
    $stmtBloqueo->execute();
    $resultadoBloqueo = $stmtBloqueo->get_result();
    $usuarioBloqueado = $resultadoBloqueo->num_rows === 1
        && (int)$resultadoBloqueo->fetch_assoc()['bloqueado'] === 1;
    $stmtBloqueo->close();

    if ($usuarioBloqueado) {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?acceso=bloqueado');
        exit;
    }
}
