<?php
require_once('../../config-ext.php');
$planes = "";

$sql = "SELECT * FROM planes WHERE visibilidad = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        if($row['imagen'] == null){
            $imgPlan = "img/home/planComercial.png";
        }else{
            $imgPlan = "img/home/".$row['imagen'];
        }

        $cadena = "";
        $listado = "";
       $planes .= '
        <article data-aos="zoom-in">
            <div class="tarjeta">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="card-title">'.$row['plan'].'</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">OBTENGA SU PRIMERA GANANCIA</h6>
                            </div>
                            <div class="col-3">
                                <img src="'.$imgPlan.'" alt="">
                            </div>
                        </div><table class="table table-borderless table-hover">';
        $cadena = $row['items'];

        $elementos = explode("|", $cadena);
        foreach ($elementos as $elemento) {
            $listado .= '<tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32.42" height="25.5" viewBox="0 0 32.42 25.5">
                                <path id="Trazado_376" data-name="Trazado 376" d="M340.913,6932.681l7.98,7.98,22.319-22.318" transform="translate(-339.853 -6917.282)" fill="none" stroke="#39b54a" stroke-miterlimit="10" stroke-width="3"/>
                            </svg>
                            </td>
                            <td>
                                '.$elemento.'
                            </td>
                        </tr>';
        }

        $planes .= $listado.'
                    </table>
                    </div>
                    <br>
                    <a href="planes.php#inicial" class="btn btn-articule mb-3">Saber más</a>
                    <p class="text-center"><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalGeneralTerms">*Términos y condiciones</a></p>
                </div>
            </div>
        </article>
       ';
    }
}

?>