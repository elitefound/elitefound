<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_plan = $_POST["id"];
    $porcentaje = $_POST["porcentaje"];
    $fecha = new DateTime($_POST["fecha"]);
    $Registro = [];
    
    require_once("../../../config-ext.php");
    
    $sql = "SELECT id_depositos, id_user, fecha, fechafinal, cantidad FROM depositos WHERE estado = 1 AND id_plan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_plan);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $depositoUser = $row["id_user"];
            $depositoFecha = new DateTime($row["fecha"]);
            $depositoFechaFin = new DateTime($row["fechafinal"]);
            $depositoCantidad = $row["cantidad"];
            $diasHabiles = 0;
            $diasHabiles2 = 0;
            $gananciasDia = 0;
            $gananciasSemanal = 0;
                $fechadeGanancias = ($fecha->format('N') == 5) ? $fecha : (clone $fecha)->modify('next friday');
                
                while ($depositoFecha <= $depositoFechaFin) {
                    if ($depositoFecha->format('N') < 6) {
                        $diasHabiles++;
                        if ($depositoFecha <= $fechadeGanancias) {
                            $diasHabiles2++;
                        }
                    }
                    $depositoFecha->modify('+1 day');
                }

                if ($diasHabiles > 0) {
                    $gananciasDia = (($depositoCantidad * ($porcentaje / 100)) * 12) / $diasHabiles;
                    $gananciasSemanal = ($diasHabiles2 > 5) ? $gananciasDia * 5 : $gananciasDia * $diasHabiles2;
                    $idProcentaje = registroBeneficios($id_plan, $porcentaje, $fechadeGanancias, $conn);
                    beneficiosPlan($depositoUser, $fechadeGanancias, $gananciasSemanal, $row["id_depositos"], $idProcentaje, $conn);
                }
        }
    }
    
    echo implode(',', $Registro);
}

function beneficiosPlan($user, $fecha, $valor, $id_deposito, $idProcentaje, $conn) {
    $sql = "INSERT INTO beneficiosplan (user, fecha, valor, id_deposito, id_porcentaje) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issii", $user, $fecha->format('Y-m-d'), $valor, $id_deposito, $idProcentaje);
    $stmt->execute();
}

function registroBeneficios($id_plan, $porcentaje, $fechadeGanancias, $conn) {
    $sql = "INSERT INTO porcentajes (planes, porcentaje, fecha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("iis", $id_plan, $porcentaje, $fechadeGanancias->format('Y-m-d'));
    if ($stmt->execute()) {

        $insertedId = $conn->insert_id;
        echo "Registro insertado con éxito. ID: " . $insertedId;
        return $insertedId;
    } else {
        echo "Error al insertar: " . $stmt->error;
        return null;
    }

    $stmt->close();
}
