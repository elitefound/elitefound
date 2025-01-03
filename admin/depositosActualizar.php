<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../../config-ext.php");

    $datos = filter_var($_POST["datos"], FILTER_SANITIZE_STRING);
    $arraydatos = explode(",", $datos);

    $id_depositos = $arraydatos[0];

    $id_user = $arraydatos[1];
 
    $nombre = $arraydatos[2];
    $apellido = $arraydatos[3];
    $email = $arraydatos[4];
    $plan = $arraydatos[5];
    $porcentajeMin = empty($arraydatos[6]) || $arraydatos[6] == 0 ? "" : $arraydatos[6];
    $porcentajeMax = empty($arraydatos[7]) || $arraydatos[7] == 0 ? "" : $arraydatos[7];
    $fijo = empty($arraydatos[8]) || $arraydatos[8] == 0 ? "" : $arraydatos[8];

    $tiempo = $arraydatos[9];
    $multiplicador = $arraydatos[10];
    $billetera = $arraydatos[11];
    $fecha = $arraydatos[12];
    $inversion = $arraydatos[13];
    $hash = $arraydatos[14];
    $estado = $arraydatos[15];
    $id_interes = $arraydatos[16];
    $bonos = $arraydatos[17];

    $diaInicial = diaInicial();
    $diaFinal = diaFinal($diaInicial, $tiempo, $multiplicador);
    $contarDias = contarDias($diaInicial, $diaFinal);
    cambiarEstado(1, $diaInicial, $id_depositos, $diaFinal, $conn);
        
    if($fijo !== ""){
        $ganancias = gananciasDiarias($inversion, $multiplicador, $fijo, $contarDias);
        $gananciasViernes = crearGanancias($id_user, $diaInicial, $diaFinal, $ganancias, $id_depositos, $conn);
    }

    if($bonos == 1){
        $inversionPersonal = inversionPersonal($id_user, $conn);
        $equipo = equipo($id_user, $conn);
        $equipo = substr($equipo, 0, -1);
        $volumen = volumen($equipo, $conn);
        $actualizacionInversion = $inversionPersonal + $inversion;
        $rango = rango($actualizacionInversion, $volumen, $conn);
        $beneficioRango = cargarrango($id_user, $rango, $conn);
        
        $buscarReferidos = buscarReferidos($id_user, $conn);
        $buscarReferidos = substr($buscarReferidos, 0, -1);
        actualizarRangoReferidos($buscarReferidos, $conn);
        $bonodeREdPreuba = distribuirBonodeRed($buscarReferidos, $id_user, $inversion, $conn);
    }

    $verificarReferidoNoBono = verificarReferidoNoBono($id_user, $inversion, $conn); // falta verificar

    echo $verificarReferidoNoBono;

}

function inversionPersonal($id_user, $conn) {
    $sql = "SELECT SUM(cantidad) AS total_cantidad FROM depositos WHERE id_user = ? AND estado = 1 AND bono = 1";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        return 0;
    }

    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_cantidad = !empty($row['total_cantidad']) ? $row['total_cantidad'] : 0;
        return $total_cantidad;
    } else {
        return 0;
    }
}

function equipo($id_user, $conn) {
    $Registro = "";
    $sql = "SELECT hijo FROM referidos WHERE padre = $id_user";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $Registro .= $row["hijo"].",";
            $Registro .= equipo($row["hijo"], $conn);
        }
    }

    return $Registro;
}

function volumen($equipo, $conn){
    $array = explode(",", $equipo);
    $inversion = 0;
    foreach ($array as $datos){
        $inversion = $inversion + inversionPersonal($datos, $conn);
    }

    return $inversion;
}

function rango($inversionPersonal, $volumen, $conn) {

    $stmt = $conn->prepare("SELECT id FROM liderazgo WHERE inversionpersonal <= ? AND volumendered <= ? ORDER BY inversionpersonal DESC, volumendered DESC LIMIT 1");
    $stmt->bind_param("dd", $inversionPersonal, $volumen);
    $stmt->execute();
    $result = $stmt->get_result();
    $registros = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $registros = $row["id"];
    }

    $stmt->close();

    return $registros;
}

function cargarrango($id_user, $rango, $conn) {

    $stmt = $conn->prepare("
        SELECT l.bono
        FROM liderazgo l
        LEFT JOIN beneficiosliderazgo bl ON bl.user = ? AND bl.rango = l.id
        WHERE l.id = ? AND bl.user IS NULL
    ");

    $stmt->bind_param("ii", $id_user, $rango);
    $stmt->execute();
    $stmt->bind_result($bono);
    $stmt->fetch();
    $stmt->close();
    if ($bono === null) {
        return null;
    }
    $stmt = $conn->prepare("
        INSERT INTO beneficiosliderazgo (user, fecha, valor, rango)
        VALUES (?, NOW(), ?, ?)
    ");

    $stmt->bind_param("iii", $id_user, $bono, $rango);
    
    if (!$stmt->execute()) {
        echo "Error en la ejecución: " . $stmt->error;
        return null;
    }

    $stmt->close();
    return $bono;
}

function diaInicial(){
    $fechaActual = new DateTime();
    $dia = $fechaActual->format('N');

    if ($dia == 5) {
        $fechaActual->modify('+3 days');
    } elseif ($dia == 6) {
        $fechaActual->modify('+2 days');
    } elseif ($dia == 7) {
        $fechaActual->modify('+1 day');
    } else {
        $fechaActual->modify('+1 day');
    }

    return $fechaActual->format('Y-m-d');
}

function diaFinal($diaInicial, $tiempo, $multiplicador){

    $fechaFinal = new DateTime($diaInicial);

    switch ($tiempo) {
        case 1: // Días hábiles
            $diasAgregados = 0;
            while ($diasAgregados < $multiplicador) {
                $fechaFinal->modify('+1 day');
                if ($fechaFinal->format('N') < 6) {
                    $diasAgregados++;
                }
            }
            break;
        case 2: // Semanas
            $fechaFinal->modify('+' . ($multiplicador * 7) . ' days');
            break;
        case 3: // Meses
            $fechaFinal->modify('+' . $multiplicador . ' months');
            break;
        case 4: // Años
            $fechaFinal->modify('+' . $multiplicador . ' years');
            break;
    }

    $diasRestantes = $fechaFinal->format('N');
    if ($diasRestantes == 6) {
        $fechaFinal->modify('+1 day');
    } elseif ($diasRestantes == 7) {
        $fechaFinal->modify('+2 days');
    }

    return $fechaFinal->format('Y-m-d');

}

function contarDias($diaInicial, $diaFinal){
    $diaInicial = new DateTime($diaInicial);
    $diaFinal = new DateTime($diaFinal);
    $diasLaborales = 0;

    while ($diaInicial <= $diaFinal) {
        if ($diaInicial->format('N') < 6) {
            $diasLaborales++;
        }
        $diaInicial->modify('+1 day');
    }

    return $diasLaborales;
}

function gananciasDiarias($inversion, $multiplicador, $fijo, $contarDias){
    $ganancias = (($inversion*($fijo/100))*12)/$contarDias;
    return $ganancias;
}

function crearGanancias($id_user, $diaInicial, $diaFinal, $ganancias, $id_depositos, $conn){
    $diaInicial = new DateTime($diaInicial);
    $diaFinal = new DateTime($diaFinal);
    $ganaciasemanal = 0;
    $arrayGanancias = 0;

    while ($diaInicial <= $diaFinal) {
        if ($diaInicial->format('N') < 6) {
            $ganaciasemanal++;
            if($diaInicial->format('N') == 5){
                $arrayGanancias = $ganaciasemanal * $ganancias;
                subirGanaciasFijas($arrayGanancias, $diaInicial->format('Y-m-d'), $id_user, $id_depositos, $conn);
                $ganaciasemanal = 0;
            }
        }
        $diaInicial->modify('+1 day');
    }
    if($ganaciasemanal > 0){
        $arrayGanancias = $ganaciasemanal * $ganancias;
        subirGanaciasFijas($arrayGanancias, $diaInicial->format('Y-m-d'), $id_user, $id_depositos, $conn);
    }
    
    return $arrayGanancias;
}

function subirGanaciasFijas($Ganancias, $diaInicial, $id_user, $id_depositos, $conn) {
    $diaInicial = new DateTime($diaInicial);
    $fechaFormateada = $diaInicial->format('Y-m-d');

    $sql = "INSERT INTO beneficiosplan (user, fecha, valor, id_deposito) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdi", $id_user, $fechaFormateada, $Ganancias, $id_depositos);
    $stmt->execute();
}

function cambiarEstado($valor, $fecha, $idDeposito, $diaFinal, $conn) {
    $sql = "UPDATE depositos SET estado = ?, fecha = ?, fechafinal = ? WHERE id_depositos = ?";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("issi", $valor, $fecha, $diaFinal, $idDeposito);
    $stmt->execute();
}

function buscarReferidos($id_user, $conn, $contador = 0){

    $sql_0 = "SELECT * FROM bonored";
    $result_0 = $conn->query($sql_0);

    $Registro = "";
    $sql = "SELECT padre FROM referidos WHERE hijo = $id_user";
    if ($result_0->num_rows > 0) {
        $valorBonos = $result_0->num_rows;
    }

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $contador++;
            if($contador <= $valorBonos){
                $Registro .= $row["padre"].",";
                $Registro .= buscarReferidos($row["padre"], $conn, $contador);
            }else{
                break;
            }
        }
    }

    return $Registro;
}

function actualizarRangoReferidos($buscarReferidos, $conn){
    $arrayBuscarReferidos = explode(",", $buscarReferidos);
    $inversion = "";
    $equipo = "";
    $volumen = "";
    $rango = "";
    $beneficioRango = "";

    foreach ($arrayBuscarReferidos as $datos){
        $inversion = inversionPersonal($datos, $conn);
        $equipo = equipo($datos, $conn);
        $equipo = substr($equipo, 0, -1);
        $volumen = volumen($equipo, $conn);
        $rango = rango($inversion, $volumen, $conn);
        cargarrango($datos, $rango, $conn);
    }

    return;
}

function distribuirBonodeRed($buscarReferidos, $id_user, $inversionPersonal, $conn) {
    $arrayBuscarReferidos = explode(",", $buscarReferidos);
    $Ganancias = 0;
    $inversionPadre = 0;
    $msm = "";
    $sql = "SELECT * FROM bonored";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $resultArray = [];
        $index = 0;

        while ($row = $result->fetch_assoc()) {
            if (isset($arrayBuscarReferidos[$index]) && $arrayBuscarReferidos[$index] != "") {
                $inversionPadre = inversionPersonal($arrayBuscarReferidos[$index], $conn);

                $ElRAngo = verificarRangoReferidos($arrayBuscarReferidos[$index], $row["patrocinio"], $row["rango"], $conn);
                
                if($row["rango"] === NULL && $row["inversion"] <= $inversionPadre){
                    $Ganancias = (float)$inversionPersonal * ((float)$row["porcentaje"] / 100);
                    AgregarBonoDeRed($arrayBuscarReferidos[$index], $Ganancias, $id_user, $conn);
                    $resultArray[] = "1 "."padre: ".$arrayBuscarReferidos[$index]." ganancia: ".$Ganancias." hijo: ".$id_user." rango: ".$row["rango"]." inversionRequerida: ".$row["inversion"]." inversionPadre: ".$inversionPadre;
                }elseif($row["rango"] != NULL && $row["inversion"] <= $inversionPadre){
                    if($ElRAngo !== false){
                        $Ganancias = (float)$inversionPersonal * ((float)$row["porcentaje"] / 100);
                        AgregarBonoDeRed($arrayBuscarReferidos[$index], $Ganancias, $id_user, $conn);
                        $resultArray[] = "2 "."padre: ".$arrayBuscarReferidos[$index]." ganancia: ".$Ganancias." hijo: ".$id_user." rango: ".$row["rango"]." inversionRequerida: ".$row["inversion"]." inversionPadre: ".$inversionPadre;
                    }else{
                        $Ganancias = 0;
                        AgregarBonoDeRed($arrayBuscarReferidos[$index], $Ganancias, $id_user, $conn);
                        $resultArray[] = "4 "."padre: ".$arrayBuscarReferidos[$index]." ganancia: ".$Ganancias." hijo: ".$id_user." rango: ".$row["rango"]." inversionRequerida: ".$row["inversion"]." inversionPadre: ".$inversionPadre;
                    }
                }else{
                    $Ganancias = 0;
                    AgregarBonoDeRed($arrayBuscarReferidos[$index], $Ganancias, $id_user, $conn);
                    $resultArray[] = "5 "."padre: ".$arrayBuscarReferidos[$index]." ganancia: ".$Ganancias." hijo: ".$id_user." rango: ".$row["rango"]." inversionRequerida: ".$row["inversion"]." inversionPadre: ".$inversionPadre;
                }
            }
            $index++;
        }

        $msm = implode("\n", $resultArray);
    } else {
        $msm = "No se encontraron registros.";
    }

    return $msm;
}

function AgregarBonoDeRed($id_user, $Ganancias, $referido, $conn) {
    $fechaFormateada = date('Y-m-d');
        $sql = "INSERT INTO beneficiosreferidos (user, fecha, valor, referido) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }
        $stmt->bind_param("isds", $id_user, $fechaFormateada, $Ganancias, $referido);
        $stmt->execute();
        $stmt->close();
    return true;
}

function verificarRangoReferidos($id_user, $patrocinio, $rango, $conn) {
    $id_user = (int)$id_user;
    $sql_1 = "SELECT hijo FROM referidos WHERE padre = ?";
    $stmt_1 = $conn->prepare($sql_1);
    $verificarRango = [];
    $a = 0;

    if (!$stmt_1) {
        return false;
    }
    
    $stmt_1->bind_param("i", $id_user);
    $stmt_1->execute();
    $result_1 = $stmt_1->get_result();
    
    if ($result_1) {
        $referidos_ids = [];   
        while ($row = $result_1->fetch_assoc()) {
            $referidos_ids[] = (int)$row['hijo'];
        }
    }

    if (count($referidos_ids) >= $patrocinio) {
        foreach ($referidos_ids as $id) {
            $rangoVerificacion = verificarRango($id, $conn);
            if ($rangoVerificacion !== null && (int)$rangoVerificacion['rango'] >= $rango) {
                $a++;
            }
        }
    }

    if((int)$a >= (int)$patrocinio){
        return true;
    }else{
        return false;
    }
}

function verificarRango($id_user, $conn) {
    $stmt = $conn->prepare("SELECT rango FROM beneficiosliderazgo WHERE user = ? ORDER BY rango DESC LIMIT 1");
    $stmt->bind_param("s", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function verificarReferidoNoBono($id_user, $inversion, $conn) {

    $stmt = $conn->prepare("SELECT padre FROM referidos WHERE hijo = ?");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    $Registro = null;
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Registro = $row["padre"];
    }

    if ($Registro !== null) {
        $rango = verificarRango($Registro, $conn);
        if ($rango !== null && isset($rango['rango'])) {
            $rango_2 = (int)$rango['rango'];
        } else {
            $rango_2 = 0;
        }

        if ($rango_2 >= 1) {
            return false;
        }
    }
    
    $porcentaje = porcentajeGanaciaNoBono($Registro, $conn);

    if($porcentaje != false){
        $Ganancias = (float)$inversion * ($porcentaje / 100);
        AgregarBonoDeRed($Registro, $Ganancias, $id_user, $conn);
        return "si se pudo";
    }else{
        return "no se pudo";
    }
}

function porcentajeGanaciaNoBono($id_user, $conn) {
    $sql = "
        SELECT p.fijoPorcentaje
        FROM depositos d
        JOIN planes p ON d.id_plan = p.id_plan
        WHERE d.id_user = ? AND d.bono = 0
        LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        return $row['fijoPorcentaje'];
    } else {
        return false;
    }
}


?>