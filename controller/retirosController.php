<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    session_destroy();
    header("location: index.php");
    exit;
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if(!isset($_SESSION["id_user"]) || empty($_SESSION["id_user"])){
    header("location: index.php");
    session_destroy();
    exit;
}

$UserTipo = $_SESSION['UserTipo'];
if ($UserTipo === "1"){
    header("location: admin/index.php");
}

if(isset($_GET['mensaje'])){
    $variable1 = $_GET['mensaje'];
    if($variable1 === "Su depósito ha sido enviado para su revisión"){
        $variable1 = '<div class="alert alert-success" role="alert">
        '.$variable1.'
      </div>';
    }else{
        $variable1 = '<div class="alert alert-danger" role="alert">
        '.$variable1.'
      </div>';
    }
} else {
    $variable1 = "";
}

$userName = $_SESSION['userName'];
$email = $_SESSION['email'];
$Nombre = $_SESSION['Nombre'];
$Apellido = $_SESSION['Apellido'];
$Iduser = $_SESSION['id_user'];

require_once('../../config-ext.php');

$stmt = $conn->prepare("SELECT d.id_depositos, d.fecha, d.fechafinal, d.cantidad, d.estado, p.plan, p.id_Retiros
FROM depositos AS d
JOIN planes AS p ON d.id_plan = p.id_plan
WHERE d.id_user = ? AND d.estado = 1");
$stmt->bind_param("i", $Iduser);
$stmt->execute();
$result = $stmt->get_result();

$selectPlanes = "";
$final = "";
$diferencia = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $imprime = true;
        $inicio = $row["fecha"];
        $final = $row["fechafinal"];
        $estado = $row["estado"];

        $fechaInicio = new DateTime(date('Y-m-d', strtotime($inicio)));
        $fechaFinal = new DateTime(date('Y-m-d', strtotime($final)));
        $hoy = new DateTime(date('Y-m-d'));

        if ($hoy >= $fechaFinal) {
            if($estado == 1){
                // actualizar estado con una función
            }
            $final = "Finalizado";
        } else {
            $diferencia = $hoy->diff($fechaInicio);
            if (($diferencia->m < 3) || ($diferencia->m == 3 && $diferencia->d == 0)) {
                $final = "Anticipación";
            } else {
                $imprime = false;
            }
        }

        if($imprime){
            $selectPlanes .= '<option value="'.$row['id_depositos'].'">['.$row['plan'].'][&#36;US: '.$row['cantidad'].']['.$final.']</option>';
        }
    }
}

$sql2 = "SELECT r.fecha, r.cantidad, r.estado, p.plan
        FROM retiros AS r
        LEFT JOIN depositos AS d ON r.id_depositos = d.id_depositos
        LEFT JOIN planes AS p ON d.id_plan = p.id_plan
        WHERE r.id_user = $Iduser";

$tablaRetiros = "";
$totalRetiros = 0;

$result2 = $conn->query($sql2);

// Mostrar en una tabla
if ($result2->num_rows > 0) {

    while($row2 = $result2->fetch_assoc()) {
        if($row2["estado"] == "1"){
            $tablaRetiros .= "<tr>";
            $tablaRetiros .= "<td>" . $row2["fecha"] . "</td>";
            $tablaRetiros .= "<td>" . $row2["cantidad"] . "</td>";
            $tablaRetiros .= "<td>" . $row2["plan"] . "</td>";
            $tablaRetiros .= "</tr>";
        }
        $totalRetiros = $totalRetiros + $row2["cantidad"] + 10;
    }

}

$total_liderazgo = 0;
$sql_3 = "SELECT SUM(valor) AS totalliderazgo
            FROM beneficiosliderazgo
            WHERE user = ?";
$stmt_3 = $conn->prepare($sql_3);
$stmt_3->bind_param("i", $Iduser);
$stmt_3->execute();
$result_3 = $stmt_3->get_result();
$row = $result_3->fetch_assoc();
$total_liderazgo = !empty($row['totalliderazgo']) ? $row['totalliderazgo'] : 0;

$total_intereses = 0;
$sql_4 = "SELECT SUM(valor) AS totalPlanBeneficios 
        FROM beneficiosplan 
        WHERE user = ? AND fecha <= CURDATE()";
$stmt_4 = $conn->prepare($sql_4);
$stmt_4->bind_param("i", $Iduser);
$stmt_4->execute();
$result_4 = $stmt_4->get_result();
$row = $result_4->fetch_assoc();
$total_intereses = !empty($row['totalPlanBeneficios']) ? $row['totalPlanBeneficios'] : 0;

$total_referidos = 0;
$sql_5 = "SELECT SUM(valor) AS totalReferidos
                FROM beneficiosreferidos
                WHERE user = ?";
$stmt_5 = $conn->prepare($sql_5);
$stmt_5->bind_param("i", $Iduser);
$stmt_5->execute();
$result_5 = $stmt_5->get_result();
$row = $result_5->fetch_assoc();
$total_referidos = !empty($row['totalReferidos']) ? $row['totalReferidos'] : 0;

$total_beneficios = round(($total_liderazgo + $total_intereses + $total_referidos - $totalRetiros), 3);