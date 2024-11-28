<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST["id"];
    $correo = $_POST["correo"];

    require_once("../../../config-ext.php");
    include("../controller/generarCodigo.php");

    $codigoNuevo = generarCodigo();
    echo "En construcción aun no se envia el mensaje: ".$codigoNuevo." ".$correo;
}
?>