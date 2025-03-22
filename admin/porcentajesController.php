<?php
    require_once("../../../config-ext.php");
    $fecha_actual = date('Y-m-d');
    $sql = "SELECT id_plan, plan, porcentajeMin, porcentajeMax, tiempo FROM planes WHERE fijo = 0 ORDER BY plan ASC";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $tablaPorcentaje = "";
        while($row = $result->fetch_assoc()){

            $tablaPorcentaje .= '<tr>
                            <td><input class="form-control" type="text" name="plan_'.$row["id_plan"].'" id="plan_'.$row["id_plan"].'" value="'.$row["plan"].'" readonly></td>
                            <td><input class="form-control" type="number" name="porcentaje_'.$row["id_plan"].'" id="porcentaje_'.$row["id_plan"].'" min="'.$row["porcentajeMin"].'" max="'.$row["porcentajeMax"].'" step="0.1"></td>
                            <td><input class="form-control" type="date" name="fecha_'.$row["id_plan"].'" id="fecha_'.$row["id_plan"].'" value='.$fecha_actual.'></td>
                            <td>
                                <button type="button" class="btn btn-success" onclick="agregarPorcentaje('.$row["id_plan"].')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr><input type="hidden" name="tiempo_'.$row["id_plan"].'" id="tiempo_'.$row["id_plan"].'" value="'.$row["tiempo"].'">';
        }
    }
?>