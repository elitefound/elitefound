<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once("../../../config-ext.php");

    $dato = $_POST["dato"];
    $array = explode(";", $dato);
    $id_depositos = $array[0];
    $id_retiros = $array[1];
    $fondo = $array[2];

    if($id_depositos != ""){
        depositoEstado($id_depositos, $conn);
    }

    if($id_retiros != ""){
        retirosEstado($id_retiros, $conn);
        retencion($id_retiros, $fondo, $conn);
    }

    echo $id_depositos;
}

function depositoEstado($id_depositos, $conn) {

    $stmt = $conn->prepare("UPDATE depositos SET estado = ? WHERE id_depositos = ?");
    $estado = 2;
    $stmt->bind_param("ii", $estado, $id_depositos);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

function retirosEstado($id_retiros, $conn) {

    $stmt = $conn->prepare("UPDATE retiros SET estado = ? WHERE id_retiros = ?");
    $estado = 1;
    $stmt->bind_param("ii", $estado, $id_retiros);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

function retencion($id_retiros, $fondo, $conn){

    $sql = "INSERT INTO retencion (id_retiro, cantidad) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_retiros, $fondo);
    $stmt->execute();
    $stmt->close();
}
?>