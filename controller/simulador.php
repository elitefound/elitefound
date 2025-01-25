<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../../config-ext.php');
    
    $valor = $_POST['dato'];
    $sql = "SELECT * FROM planes WHERE id_plan = $valor";
    $result = $conn->query($sql);
    $intereses = "";
    $tiempo = [];
    $arrayPagos = [];
    $pagos = 0;
    $optionPagos = "";
    $retiroTiempo = 0;
    $retiroMul = 0;
    $porcentajeMin = 0;
    $porcentajeMax = 0;
    $fijo = 0;
    $porcentajesTotal = "";
    $mensajeParcial = "";
    $mensajeTotal = "";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $intereses = '<input type="hidden" id="intereses" name="intereses" value="'.$row['id_interes'].'">';
            $tiempo = explode(",", $row['tiempo']);
            $retiroTiempo = '<input type="hidden" id="retiroTiempo" name="retiroTiempo" value="'.$tiempo[0].'">';
            $retiroMul = '<input type="hidden" id="retiroMul" name=retiroMul" value="'.$tiempo[1].'">';
            $arrayPagos = explode(",", $row['pagos']);
            foreach ($arrayPagos as $pagos) {
                $optionPagos .= '<option value="'.$pagos.'">'.$pagos.'</option>';
            }

            switch ($tiempo[0]) {
                case "1":
                    $mensajeTotal = "Día x ".$tiempo[1];
                    break;
                case "2":
                    $mensajeTotal = "Semana x ".$tiempo[1];
                    break;
                case "3":
                    $mensajeTotal = "Mes x ".$tiempo[1];
                    break;
                case "4":
                    $mensajeTotal = "Año x ".$tiempo[1];
                    break;
            }

            switch ($row['id_interes']) {
                case "1":
                    $mensajeParcial = "Día";
                    break;
                case "2":
                    $mensajeParcial = "Semana";
                    break;
                case "3":
                    $mensajeParcial = "Mes";
                    break;
                case "4":
                    $mensajeParcial = "Año";
                    break;
            }

            if($row['fijo'] == "0"){
                $porcentajeMin = '<input id="PorcentajeMin" name="PorcentajeMin" class="form-control" type="number" value="'.$row['porcentajeMin'].'" readonly></input>';
                $porcentajeMax = '<input id="PorcentajeMax" name="PorcentajeMax" class="form-control" type="number" value="'.$row['porcentajeMax'].'" readonly></input>';

                $porcentajesTotal = '
                <div class="alert alert-primary" role="alert">
                    Los valores mostrados corresponden a las ganancias máximas. Tenga en cuenta que el plan es variable y los montos pueden estar sujetos a cambios.
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 text-center">
                            <label for="PorcentajeMin" class="form-label">Porcentaje Mínimo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">%</span>
                                '.$porcentajeMin.'
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 text-center">
                            <label for="PorcentajeMax" class="form-label">Porcentaje Máximo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">%</span>
                                '.$porcentajeMax.'
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }else{
                $porcentajesTotal = '
                <div class="mb-3 text-center">
                    <label for="PorcentajeMax" class="form-label">Porcentaje Fijo</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">%</span>
                        <input id="PorcentajeMax" name="PorcentajeMax" class="form-control" type="number" value="'.$row['fijo'].'" readonly></input>
                    </div>
                </div>
                ';
            }

        }
    }
    $construccionHTML =    
    
    $porcentajesTotal.'
    <div class="mb-3 text-center">
        <label for="CantidadInversion" class="form-label">Cantidad</label>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <select id="CantidadInversion" name="CantidadInversion" class="form-select" onchange="calcularSimulador()">
                <option value="" selected disabled>Seleccione...</option>
                    '.$optionPagos.'
            </select>
            <span class="input-group-text">USD</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3 text-center">
                <label for="fechaMin" class="form-label">Fecha Inicial</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/></svg></span>
                    <input id="fechaMin" name="fechaMin" class="form-control" type="datetime-local" readonly></input>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3 text-center">
                <label for="fechaMax" class="form-label">Fecha Final</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/></svg></span>
                    <input id="fechaMax" name="fechaMax" class="form-control" type="datetime-local" readonly></input>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 text-center">
        <label for="CantidadGanancia" class="form-label">Ganancia '.$mensajeParcial.'</label>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input id="CantidadGanancia" name="CantidadGanancia" class="form-control" type="number" readonly></input>
            <span class="input-group-text">USD</span>
        </div>
    </div>
    <div class="mb-3 text-center">
        <label for="TotalGanancia" class="form-label">Ganancia '.$mensajeTotal.'</label>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input id="TotalGanancia" name="TotalGanancia" class="form-control" type="number" min="0" max="100" readonly></input>
            <span class="input-group-text">USD</span>
        </div>
    </div> 
    '.$intereses.$retiroTiempo.$retiroMul;

    echo $construccionHTML;
}else{
    require_once('../../config-ext.php');

    $sql = "SELECT * FROM planes WHERE visibilidad = 1";
    $optionPlanes = "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $optionPlanes .= '<option value="'.$row['id_plan'].'">'.$row['plan'].'</option>';
        }
    }
    
    $modalSimulador = '
    <div class="modal fade" id="modalSimulador" tabindex="-1" aria-labelledby="modalSimuladorLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body seccion_oscura">
            <div class="formDepositar seccion_clara">
                <div class="container">
                    <h3>Simulador de inversión</h3>
                    <br>
                    <div class="mb-3 text-center">
                        <label for="simuladorPlan" class="form-label">Plan de Inversión</label>
                        <select id="simuladorPlan" name="simuladorPlan" class="form-select" onchange="simulador()">
                            <option value="" selected disabled>Seleccione...</option>
                            '.$optionPlanes.'
                        </select>
                    </div>
                    <div id="calculado"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    ';
}