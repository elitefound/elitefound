<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Planes = filter_input(INPUT_POST, 'Planes', FILTER_SANITIZE_STRING);
    if (empty($Planes)) {
        $Planes = null;
    }
    $Billetera = filter_input(INPUT_POST, 'Billetera', FILTER_SANITIZE_STRING);
    $fechaActual = date("Y-m-d");
    $Iduser = filter_input(INPUT_POST, 'Iduser', FILTER_SANITIZE_STRING);
    $totales = filter_input(INPUT_POST, 'totales', FILTER_SANITIZE_STRING);
    $ganancias = filter_input(INPUT_POST, 'ganancias', FILTER_SANITIZE_STRING);
    $proceder = !empty($Billetera);
    $mensaje = "";

    if($totales <= 50){
        $proceder = false;
    }
    
    if ($proceder) {
        require_once('../../../config-ext.php');
        if ($conn) {
            $sql = "INSERT INTO retiros (id_user, id_depositos, id_billeteraUser, fecha, cantidad, cantidadTotal) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $Iduser, $Planes, $Billetera, $fechaActual, $ganancias, $totales);
            mysqli_stmt_execute($stmt);
            
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $mensaje = "Su retiro ha sido enviado para su revisión";
                $sql2 = "UPDATE depositos SET estado = 3 WHERE id_depositos = ?";
                $stmt2 = mysqli_prepare($conn, $sql2);
                mysqli_stmt_bind_param($stmt2, "s", $Planes);
                mysqli_stmt_execute($stmt2);

                header("Location: ../retiros.php?mensaje=".$mensaje);
            } else {
                $mensaje = "Hubo un problema al procesar su solicitud";
                header("Location: ../retiros.php?mensaje=".$mensaje);
            }
        } else {
            $mensaje = "Hubo un problema al procesar su solicitud";
            header("Location: ../retiros.php?mensaje=".$mensaje);
        }
    } else {
        $mensaje .= "Datos errados";
        header("Location: ../retiros.php?mensaje=".$mensaje);
    }
}
?>