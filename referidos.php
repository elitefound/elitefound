<?php
    include(dirname(__FILE__).'/controller/referidosController.php');
    include(dirname(__FILE__).'/controller/footer.php');
    include(dirname(__FILE__).'/controller/red.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REFERIDOS | ELITE FOUND</title>
    <link rel="stylesheet" href="css/tools/8_0_1_normalize.css">
    <link rel="stylesheet" href="css/tools/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/tools/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/tools/aos.css" type="text/css">
    <link rel="stylesheet" href="css/home/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/criptomonedas.css">
</head>
<!-- inicio del menú -->
<header>
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="index.php"><svg class="ps-1" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 571.13 607.86">
                    <path d="M560.72,491.08c-10.72,11.1-20.93,22.74-32.24,33.2-44.46,41.09-96.26,68.19-156.14,78.58-81.01,14.06-156.33-1.5-224.3-47.57C69.32,501.94,22.82,426.92,5.87,333.85-7.37,261.09,1.86,190.79,32.81,123.46c.69-1.49,1.44-2.96,2.88-4.21-1.07,3.97-2.22,7.91-3.19,11.91-29.63,122.32-4.07,231.48,80.73,324.94,51.37,56.61,116.23,90.62,192.17,101.66,92.73,13.49,176.33-9.28,250.83-65.84,1.02-.77,2.09-1.48,3.13-2.21,.45,.46,.9,.91,1.35,1.37Z"/>
                    <path d="M165.94,452.62c-74.76-56.13-114.74-130.47-112.78-224.53,1.92-91.79,43.65-163.24,117.79-216.33-93.67,145.96-100.35,292.68-5.01,440.86Z"/>
                    <path d="M173.36,224.69c12.66,95.44,92.09,155.45,173.17,157.64,87.91,2.37,170.1-61.34,183.3-156.71,2.48,29.54-2.46,57.88-14.5,85-12.12,27.29-29.99,50.19-53.59,68.52-61.07,47.44-144.85,50.71-209.33,8.1-65.38-43.21-85.07-115.69-79.05-162.55Z"/>
                    <path d="M512.44,363.25c29.66-40.97,41.13-86.35,32.36-136.21-6.79-38.63-25.29-71.19-54.34-97.58-59.77-54.32-153.78-61.78-223.66-7.55,3.75-10.19,36.37-35.29,59.25-45.63,23.43-10.58,48.01-15.69,73.69-15.39,72.97,.83,137.84,47.33,161.62,115.6,24.06,69.06,2.06,143.29-48.94,186.78Z"/>
                    <path d="M136.16,212.9c-.43-57.79,31.98-144.63,120.89-189.43,81.12-40.87,175.8-25.67,236.48,24.76-13.53-4.1-27.18-8.73-41.09-12.35-46.41-12.08-93-14.35-139.53-.64-48.03,14.15-86.53,42.49-118.48,80.34-23.47,27.8-41.8,58.75-55.87,92.25-.61,1.45-1.34,2.85-2.4,5.07Z"/>
                    <path d="M412.23,237.7c.25,30.38-24.49,55.9-54.5,56.2-31.83,.32-57.31-24.11-57.54-55.17-.24-31.26,24.35-56.38,55.52-56.7,31.14-.32,56.27,24.43,56.53,55.67Z"/>
                </svg> ELITE FOUND</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-centrado">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="depositar.php">Depósitos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="retiros.php">Retiros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="referidos.php">Referidos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <?php echo $userName ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="perfil.php" class="dropdown-item">Perfil</a></li>
                            <li>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <button type="submit" name="logout" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="seccion_clara pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>REFERIDOS</h1>
                <hr>
                <br></br>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h4>¡ESTE ES EL CORAZÓN DE SU INGRESO RESIDUAL DE POR VIDA!</h4>
                <br>
                <h6>Genere comisiones residuales día a día de las compras de licencias generadas en su<br>organización, hasta <strong>ocho niveles</strong> de  profundidad.</h6>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-7">
                <label for="linkBilletera" class="form-label">Link referido</label>
                <div class="mb-3 input-group text-center">
                    <input id="textoParaCopiar" type="text" class="form-control" value="https://elitefound.com?id=<?php echo urlencode($userName)?>" readonly>
                        <button id="botonCopiar" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                            </svg>
                        </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="seccion_oscura">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>BONO DE RED</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col my-5">
                <div class="table-responsive tablaDepositos">
                    <table class="table table-hover text-center table-borderless">
                        <thead>
                            <tr class="cabeceraTable">
                                <th>FECHA</th>
                                <th>NIVEL</th>
                                <th>GANANCIAS</th>
                            </tr>
                            <tr class="espacioTabla">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpotabla">
                            <?php echo $referidosRegistro; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    Total bonos de red: <?php echo "&#36;US ".number_format($total, 2, '.', ','); ?>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="seccion_clara">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>RED</h1>
                <hr>
            </div>
        </div>
        <div id="miRed">
            <?php echo $red; ?>
        </div>
    </div>
</section>
<?php echo $footer ?>

<script src="js/tools/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/tools/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="js/tools/aos.js"></script>
<script src="js/criptomonedas.js"></script>
<script src="js/Redreferidos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
        ajustarClase();
        fetchCryptoPrices();
    });

    window.addEventListener("scroll", function () {
        var header = document.querySelector("nav");
        header.classList.toggle("bg-dark", window.scrollY > 0);
        header.classList.toggle("navbar-dark", window.scrollY > 0);
        ajustarClase();
    });

    function ajustarClase() {
        const elemento = document.querySelector("nav");
        if (window.innerWidth <= 768) {
            elemento.classList.add('bg-dark');
            elemento.classList.add('navbar-dark');
        }
    }

    window.addEventListener('resize', ajustarClase);

    $(document).ready(function() {
            $('#botonCopiar').click(function() {
                var texto = $('#textoParaCopiar');
                texto.select();
                document.execCommand('copy');
            });
        });
</script>
</body>
</html>