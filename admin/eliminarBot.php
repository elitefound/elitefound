<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST["id"];
    require_once("../../../config-ext.php");

    $sql = "
        DELETE FROM referidos WHERE hijo = $id_usuario;
        DELETE FROM codigoemail WHERE id_user = $id_usuario;
        DELETE FROM user WHERE id_user = $id_usuario;
    ";

    if ($conn->multi_query($sql)) {
        echo "Registros eliminados correctamente";
    } else {
        echo "Error al eliminar registros: " . $conn->error;
    }
}
?>