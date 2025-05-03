<?php
require_once('../../config-ext.php');
$planes = "";

$sql = "SELECT * FROM planes WHERE visibilidad = 1";

$result = $conn->query($sql);
$selectColor = 0;
$calcularTopTarjeta = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $selectColor++;

        switch ($selectColor) {
            case 1:
                $color = "panelColor_1";
                break;
                case 2:
                    $color = "panelColor_2";
                    break;
                    case 3:
                        $color = "panelColor_3";
                        break;
                        case 4:
                            $color = "panelColor_4";
                            $selectColor = 0;
                            break;
        }

        $cadena = "";
        $listado = "";
        $cadena = $row['items'];
                        $elementos = explode("|", $cadena);
                        foreach ($elementos as $elemento) {
                            $listado .= '&#x2022; '.$elemento.'<br>';
                        }

        $calcularTopTarjeta++;
        
        $planes .= '
            <li class="tarjeta w-100" style="padding-top:'.($calcularTopTarjeta+1.5).'em">
                <div class="card-body">
                    <div class="panel w-100" style="background-image: url(\'img/planes/plan_'.$row['id_plan'].'.png\')">
                        <div class="cuerpoTarjeta row w-100 shadow '.$color.'">
                            <div class="col textoIzquierdo p-3">

                                <div class="row">
                                    <div class="col">
                                        <p class="tituloTarjeta">
                                            '.$row['plan'].'
                                        </p>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="listadoTarjeta">'.$listado.'</p>
                                    </div>
                                </div>
               
                                <a class="terminosTarjeta" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalGeneralTerms">*Términos y condiciones</a>

                            </div>
                            <div class="col imgTarjetaScroll" style="background-image: url(\'img/planes/plan_'.$row['id_plan'].'.png\')">

                            </div>
                        </div>
                    </div>
                </div>
            </li>
        ';
    }
}

?>