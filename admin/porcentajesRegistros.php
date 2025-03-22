<?php

$tablaVisualizar = "";

$sql_1 = "SELECT po.id, po.porcentaje, po.fecha, pl.plan
        FROM porcentajes AS po
        JOIN planes AS pl ON po.planes = pl.id_plan ORDER BY pl.plan ASC, po.fecha ASC";

$tituloPlan = "";
$resultado = $conn->query($sql_1);
if($resultado->num_rows > 0){
    while($row_2 = $resultado->fetch_assoc()){
        if($tituloPlan !== $row_2["plan"]){
            $tituloPlan = $row_2["plan"];
            $tablaVisualizar .= '<tr class="table-dark"><td colspan="5" class="text-center"><strong>'.$tituloPlan.'</strong></td></tr>';
        }
        $tablaVisualizar .= '<tr>
            <td>'.$row_2["id"].'</td>
            <td>'.$row_2["plan"].'</td>
            <td>% '.$row_2["porcentaje"].'</td>
            <td>'.$row_2["fecha"].'</td>
            <td>
                <button type="button" class="btn btn-danger" onclick="eliminarPorcentaje('.$row_2["id"].')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                    </svg>
                </button>
            </td>
        </tr>';
    }
}