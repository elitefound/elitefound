<?php

$tablaVisualizar = "";

$sql_1 = "SELECT po.id, po.porcentaje, po.fecha, pl.plan
        FROM porcentajes AS po
        JOIN planes AS pl ON po.planes = pl.id_plan";
$resultado = $conn->query($sql_1);
if($resultado->num_rows > 0){
    while($row_2 = $resultado->fetch_assoc()){
        $tablaVisualizar .= '<tr>
            <td>'.$row_2["id"].'</td>
            <td>'.$row_2["plan"].'</td>
            <td>% '.$row_2["porcentaje"].'</td>
            <td>'.$row_2["fecha"].'</td>
        </tr>';
    }
}