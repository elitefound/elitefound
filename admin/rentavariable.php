<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_plan = $_POST["id"];
    $porcentaje = $_POST["porcentaje"];
    $fecha = new DateTime($_POST["fecha"]);
    $fechadeGanancias = ($fecha->format('N') == 5) ? $fecha : (clone $fecha)->modify('next friday');
    $fecha_0 = $fechadeGanancias->format('Y-m-d');

    require_once("../../../config-ext.php");

    // Verificar si la combinación de fecha y plan ya existe
    $sql = "SELECT COUNT(*) AS total FROM porcentajes WHERE fecha = ? AND planes = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fecha_0, $id_plan);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row['total'] > 0) {
        echo "La combinación de fecha y plan ya existe en la tabla.";
    } else {
        $idProcentaje = registroBeneficios($id_plan, $porcentaje, $fecha_0, $conn);
        // Obtener depósitos solo una vez
        $sql = "SELECT id_depositos, id_user, fecha, fechafinal, cantidad FROM depositos WHERE estado = 1 AND id_plan = ? AND fecha <= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id_plan, $fecha_0);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $depositoUser = $row["id_user"];
                $depositoFecha = new DateTime($row["fecha"]);
                $depositoFechaFin = new DateTime($row["fechafinal"]);
                $meses = contarMeses($depositoFecha, $depositoFechaFin);
                $depositoCantidad = $row["cantidad"];
                $diasHabiles = 0;
                $diasHabiles2 = 0;

                // Calcular días hábiles
                for ($currentDate = clone $depositoFecha; $currentDate <= $depositoFechaFin; $currentDate->modify('+1 day')) {
                    if ($currentDate->format('N') < 6) {
                        $diasHabiles++;
                        if ($currentDate <= $fechadeGanancias) {
                            $diasHabiles2++;
                        }
                    }
                }

                if ($diasHabiles > 0) {
                    $valorGananciaMes =  $depositoCantidad * ($porcentaje / 100);

                    $gananciasDia = ($valorGananciaMes * $meses) / $diasHabiles;
                    $gananciasSemanal = ($diasHabiles2 > 5) ? $gananciasDia * 5 : $gananciasDia * $diasHabiles2;
                    beneficiosPlan($depositoUser, $fecha_0, $gananciasSemanal, $row["id_depositos"], $idProcentaje, $conn);
                }
            }
        }
    }
}

function beneficiosPlan($user, $fecha, $valor, $id_deposito, $idProcentaje, $conn) {
    $sql = "INSERT INTO beneficiosplan (user, fecha, valor, id_deposito, id_porcentaje) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issii", $user, $fecha, $valor, $id_deposito, $idProcentaje);
    $stmt->execute();
    $stmt->close();
}

function registroBeneficios($id_plan, $porcentaje, $fechadeGanancias, $conn) {

    $sql = "INSERT INTO porcentajes (planes, porcentaje, fecha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("iis", $id_plan, $porcentaje, $fechadeGanancias);
    if ($stmt->execute()) {
        $insertedId = $conn->insert_id;
        $stmt->close();
        return $insertedId;
    } else {
        $stmt->close();
        return null;
    }
}

function contarMeses($fechaInicio, $fechaFin) {
    // Verificar si las fechas ya son objetos DateTime
    if (!$fechaInicio instanceof DateTime) {
        $fechaInicio = new DateTime($fechaInicio);
    }
    if (!$fechaFin instanceof DateTime) {
        $fechaFin = new DateTime($fechaFin);
    }

    $diferencia = $fechaInicio->diff($fechaFin);
    
    return ($diferencia->y * 12) + $diferencia->m;
}