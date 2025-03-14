<?php

    require_once("../../../config-ext.php");
    include("../controller/encoded.php");

    $sql = "SELECT r.id_retiros, u.username, d.id_depositos, d.archivo, d.cantidad AS deposito, d.fechafinal, b.link, r.fecha, r.estado, r.cantidad AS solicitado, r.cantidadTotal
    FROM retiros r
    JOIN user u ON r.id_user = u.id_user
    LEFT JOIN depositos d ON r.id_depositos = d.id_depositos
    JOIN billeterauser b ON r.id_billeteraUser = b.id_billeteraUser
    ORDER BY r.estado ASC, r.fecha";

    $resultadosRetiros = "";

    $resultados = $conn->query($sql);

    if($resultados->num_rows > 0){
        while($row = $resultados->fetch_assoc()) {
            $username = $row["username"];
            $id_depositos = $row["id_depositos"];
            $archivo = $row["archivo"];
            $deposito = $row["deposito"];
            $fechafinal = $row["fechafinal"];
            $billetera = $row["link"];
            $fecha = $row["fecha"];
            $solicitado = $row["solicitado"];
            $cantidadTotal = $row["cantidadTotal"];
        
            if($id_depositos === Null){
                $resumenDeposito = "N/A";
                $calcular = 10;
            }else{
                $calcular = ($deposito * 0.3)+10; 
                $resumenDeposito = "<a target=\"_blank\" href=\"https://tronscan.org/#/transaction/".$archivo."\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
                        <path d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0\"/>
                    </svg>
                </a>
                <hr>
                <p><strong>Deposito: </strong>".$deposito."</p>
                <hr>
                <strong>Fecha final: </strong>".$fechafinal."</p>";
            }

            $enviarRetiro = $id_depositos.";".$row["id_retiros"].";".$calcular;

            if($row["estado"] == "0"){
                $estado = "<td class=\"table-danger\"><button type=\"button\" class=\"btn btn-danger\" onclick=\"retiro('".$enviarRetiro."')\">Aceptar</button></td>";
            } else if ($row["estado"] == "1"){
                $estado = "<td class=\"table-secondary\">Retirado</td>";
            }else{
                $estado = "<td></td>";
            }

            $resultadosRetiros .= "<tr>
                <td>".$username."</td>
                <td>".$resumenDeposito."</td>
                <td>".$billetera."</td>
                <td>".$fecha."</td>
                <td>".$solicitado."</td>
                <td>".$cantidadTotal." <strong>[Enviar]</strong><br><hr>".$calcular." <strong>[Retención]</strong></td>
                ".$estado."
            </tr>";

        }
    }