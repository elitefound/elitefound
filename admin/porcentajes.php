<?php
    include(dirname(__FILE__).'/sessionController.php');
    include(dirname(__FILE__).'/indexController.php');
    include('../controller/componentesAdmin.php');
    include('porcentajesController.php');
    include('porcentajesRegistros.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/tools/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/tools/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="../controller/sweetalert2/sweetalert2.css">

    <title>ADMIN | FOUND CAPITAL COMPANY</title>
</head>
<body>
    <?php echo $menu; ?>

    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col table-responsive">
                    <caption>
                        <h2>Planes</h2>
                    </caption>
                    <table class="table">
                        <tr>
                            <th>Plan</th>
                            <th>Porcentaje</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                        <?php echo $tablaPorcentaje; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col table-responsive">
                    <caption>
                        <h2>
                            Registros
                        </h2>
                    </caption>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Plan</th>
                            <th>Porcentaje</th>
                            <th>Fecha</th>
                        </tr>
                        <?php echo $tablaVisualizar; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <script src="../js/tools/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../js/tools/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
    <script src="porcentajes.js"></script>
    <script src="../controller/sweetalert2/sweetalert2.all.js"></script>
</body>
</html>