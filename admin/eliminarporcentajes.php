<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../../config-ext.php");
    if (isset($_POST["id"]) && filter_var($_POST["id"], FILTER_VALIDATE_INT)) {
        $id = $_POST["id"];
        
        // Iniciar una transacción
        $conn->begin_transaction();
        
        try {
            $sql = "DELETE FROM beneficiosplan WHERE id_porcentaje = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();

            $sql_2 = "DELETE FROM porcentajes WHERE id = ?";
            $stmt_2 = $conn->prepare($sql_2);
            $stmt_2->bind_param("i", $id);
            $stmt_2->execute();
            $stmt_2->close();

            // Confirmar la transacción
            $conn->commit();
            echo "Registros eliminados con éxito";
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $conn->rollback();
            echo "Error al eliminar registros: " . $e->getMessage();
        }
    } else {
        echo "ID no válido.";
    }
    $conn->close(); // Cerrar la conexión
}