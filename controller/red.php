<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../../config-ext.php');
    require_once('encoded.php');

    $Iduser = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $Nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $Apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
    $nivel = filter_input(INPUT_POST, 'nivel', FILTER_VALIDATE_INT);

    $red = patrocinados($Iduser, $Nombre, $Apellido, $conn, $nivel);
    echo $red;


}else{
    require_once('../../config-ext.php');
    require_once('encoded.php');
    $nivel = 1;
    $red = patrocinados($Iduser, $Nombre, $Apellido, $conn, $nivel);
}

function regresar($Iduser, $conn){
    $sql = "SELECT u.id_user, u.nombre, u.apellido, u.email
    FROM referidos r
    JOIN user u ON r.padre = u.id_user
    WHERE r.hijo = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $Iduser);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $nombre = decoded($row['nombre']);
            $apellido = decoded($row['apellido']);
            $email = decoded($row['email']);
            $id = $row['id_user'];
            $rango = rango($id, $conn);
        }
    }
    $regresarDatos = "'".$id."','".$nombre."','".$apellido;
    return $regresarDatos;
}

function patrocinados($Iduser, $nombrepadre, $apellidopadre, $conn, $nivel) {
    $sql = "SELECT u.id_user, u.nombre, u.apellido, u.email
    FROM referidos r
    JOIN user u ON r.hijo = u.id_user
    WHERE r.padre = ?";

    $nombre = "";
    $apellido = "";
    $username = "";
    $email = "";
    $id = "";
    $table = "";
    $btn = "";
    $btnVer = "";
    $rangopadre = rango($Iduser, $conn);
    $siguienteNivel = $nivel + 1;
    $regresarNivel = $nivel - 1;
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $Iduser);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $hijos = "";
        while ($row = $result->fetch_assoc()) {

            $nombre = decoded($row['nombre']);
            $apellido = decoded($row['apellido']);
            $email = decoded($row['email']);
            $id = $row['id_user'];
            $rango = rango($id, $conn);

            if($siguienteNivel <= 8){
                $enviarDatos = "'".$id."','".$nombre."','".$apellido."','".$siguienteNivel."'";
                $btnVer = '<button type="button" class="btn btn-info" onclick="verRed('.$enviarDatos.')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </button>';
            }


            $hijos .= '<tr>
                <th>'.$nombre.' '.$apellido.'</th>
                <th>'.$rango.'</th>
                <th>'.$email.'</th>
                <th>
                    '.$btnVer.'
                </th>
            </tr>';
        }

        if($nivel == 1){
            $btn = '';
        }else{
            $regresarDatos = regresar($Iduser, $conn)."','".$regresarNivel."'";
            $btn = '<button type="button" class="btn btn-info" onclick="verRed('.$regresarDatos.')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                        &nbsp;&nbsp;Volver
                    </button>';
        }

        $table = '
            <div class="row my-3">
                <div class="col-6">
                    '.$btn.'
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>    
                            '.$nombrepadre.' '.$apellidopadre.'
                    </p>
                </div>
                <div class="col-md-4">
                    '.$rangopadre.'
                </div>
                <div class="col-md-4">
                    <p style="text-align: right;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        </svg>
                        <strong>
                            Nivel:
                        </strong>
                            '.$nivel.'
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive tablaDepositos">
                        <table class="table table-hover text-center table-borderless">
                            <thead>
                                <tr class="cabeceraTable">
                                    <th>NOMBRE</th>
                                    <th>RANGO</th>
                                    <th>EMAIL</th>
                                    <th>RED</th>
                                </tr>
                                <tr class="espacioTabla">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="cuerpotabla">
                                '.$hijos.'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        ';
        
        $stmt->close();
        return $table;
    }
}

function rango($id_user, $conn){
    $rangoActual_5 = 0;
    $rangoActual = "";
    $sql_5 = "SELECT b.rango AS rango, l.rango AS nombre
        FROM beneficiosliderazgo b
        JOIN liderazgo l ON b.rango = l.id
        WHERE user = ? ORDER BY b.id DESC LIMIT 1";
    $stmt_5 = $conn->prepare($sql_5);
    $stmt_5->bind_param("i", $id_user);
    $stmt_5->execute();
    $result_5 = $stmt_5->get_result();

    if ($row_5 = $result_5->fetch_assoc()) {
        $rangoActual_5 = isset($row_5['rango']) ? $row_5['rango'] : 0;
    }

    if($rangoActual_5 == 0 || $rangoActual_5 == 1){
        $rangoActual = '';
    }else{
        $rangoActual = '<img src="img/rango/'.$rangoActual_5.'.png" style="height: 150px; display:block; margin: auto" alt="'.$rangoActual_5.'">';
    }

    return $rangoActual;
}