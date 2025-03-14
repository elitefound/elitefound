<?php
    include(dirname(__FILE__).'/controller/dashboardController.php');
    include(dirname(__FILE__).'/controller/resumen.php');
    include(dirname(__FILE__).'/controller/footer.php');
    include(dirname(__FILE__).'/controller/simulador.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/tools/8_0_1_normalize.css">
    <link rel="stylesheet" href="css/tools/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/tools/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/tools/aos.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCalendario.css">

    <link rel="stylesheet" href="css/home/menu.css">
    <link rel="stylesheet" href="css/criptomonedas.css">

    <title>PANEL | ELITE FOUND</title>
</head>
<body>
<!-- inicio del menú -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
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
                        <a class="nav-link active" href="dashboard.php">Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="depositar.php">Depósitos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="retiros.php">Retiros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="referidos.php">Referidos</a>
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
<!-- fin del menú -->
<section class="seccion_oscura pt-5">
    <div class="row row-cols-2 row-cols-md-3 g-4 mt-3">
        <div class="col">
            <div class="container">
                <a href="depositar.php">
                    <div class="card" data-aos="zoom-in-right">
                        <h3 class="card-title">Depósito</h3>
                        <br>
                            <svg class="svgCard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.351 76.093">
                            <g id="Grupo_18" data-name="Grupo 18" transform="translate(-450.063 -331)">
                                <path id="Trazado_12" data-name="Trazado 12" d="M506.181,345.267c-9.968,0-18.072,10.653-18.072,23.779,0,13.145,8.1,23.779,18.072,23.779,9.987,0,18.072-10.634,18.072-23.779C524.253,355.92,516.168,345.267,506.181,345.267ZM494.254,384.74v-5.821h7.609V362.864l-3.424,3.424-4.185-5.327,8.922-7.609h6.962v24.73h7.99v6.658Z" fill="#00183b"/>
                                <path id="Trazado_13" data-name="Trazado 13" d="M506.181,345.267c-9.968,0-18.072,10.653-18.072,23.779,0,13.145,8.1,23.779,18.072,23.779,9.987,0,18.072-10.634,18.072-23.779C524.253,355.92,516.168,345.267,506.181,345.267ZM494.254,384.74v-5.821h7.609V362.864l-3.424,3.424-4.185-5.327,8.922-7.609h6.962v24.73h7.99v6.658Z" fill="#00183b"/>
                                <path id="Trazado_14" data-name="Trazado 14" d="M562.414,342.775a9.333,9.333,0,0,1-.114,1.465v-2.93A9.343,9.343,0,0,1,562.414,342.775Z" fill="#00183b"/>
                                <path id="Trazado_15" data-name="Trazado 15" d="M506.181,345.267c-9.968,0-18.072,10.653-18.072,23.779,0,13.145,8.1,23.779,18.072,23.779,9.987,0,18.072-10.634,18.072-23.779C524.253,355.92,516.168,345.267,506.181,345.267ZM494.254,384.74v-5.821h7.609V362.864l-3.424,3.424-4.185-5.327,8.922-7.609h6.962v24.73h7.99v6.658Z" fill="#00183b"/>
                                <path id="Trazado_16" data-name="Trazado 16" d="M552.674,331H459.708a9.645,9.645,0,0,0-9.645,9.645v56.822a9.641,9.641,0,0,0,9.645,9.626h92.966a9.626,9.626,0,0,0,9.626-9.626V340.645A9.629,9.629,0,0,0,552.674,331Zm1.065,54.007a10,10,0,0,0-2.739-.381,10.457,10.457,0,0,0-10.463,10.463,10.062,10.062,0,0,0,.989,4.394H471.084a10.323,10.323,0,0,0,.97-4.394,10.457,10.457,0,0,0-10.463-10.463,10.264,10.264,0,0,0-2.968.438V351.849a10.3,10.3,0,0,0,2.968.438,10.457,10.457,0,0,0,10.463-10.463,10,10,0,0,0-.514-3.215h70.823a10.165,10.165,0,0,0-.875,4.166,10.457,10.457,0,0,0,10.463,10.463,9.2,9.2,0,0,0,1.788-.171Z" fill="#00183b"/>
                            </g>
                            </svg>
                        <br>
                        <div class="card-body">
                            <div class="inputCard"><p class="card-text"><strong>Total depósitos: </strong>$US <?php echo $total_cantidad; ?><br><strong>Depósitos: </strong><?php echo $total_registros ?></p></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <a href="depositar.php">
                    <div class="card" data-aos="zoom-in-left">
                        <h3 class="card-title">Intereses</h3>
                        <br>
                        <svg class="svgCard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.135 94.24">
                        <g id="Grupo_19" data-name="Grupo 19" transform="translate(-1371.961 -337.76)">
                            <path id="Trazado_17" data-name="Trazado 17" d="M1399.005,377.91a27.045,27.045,0,1,0,25.53,35.958c1.829.076,3.5.1,4.863.1,8.3,0,27.619-.879,27.619-9.019,0-.024,0-.049,0-.073s0-.043,0-.063V393.948a3.578,3.578,0,0,0,.079-.745,3.439,3.439,0,0,0-.079-.7v-8.939a3.588,3.588,0,0,0,.079-.746,3.447,3.447,0,0,0-.079-.7v-9.951a3.587,3.587,0,0,0,.079-.746,3.551,3.551,0,0,0-.223-1.212,4.725,4.725,0,0,0,.144-1.121c0-.025,0-.048,0-.073s0-.044,0-.062V358.083a3.59,3.59,0,0,0,.079-.747,3.453,3.453,0,0,0-.079-.7v-9.951a3.5,3.5,0,0,0-.157-2,3.444,3.444,0,0,0-1.456-1.972c-5.644-4.786-23.62-4.95-26.006-4.95s-20.36.164-26,4.95a3.442,3.442,0,0,0-1.457,1.969,3.548,3.548,0,0,0-.158,2.005v9.951a3.369,3.369,0,0,0-.077.7,3.657,3.657,0,0,0,.077.747v10.866c0,.024,0,.047,0,.072s0,.043,0,.063a4.791,4.791,0,0,0,.144,1.122,3.568,3.568,0,0,0-.221,1.211,3.655,3.655,0,0,0,.077.746v5.889A27.351,27.351,0,0,0,1399.005,377.91Zm54.859,26.82c0,.068-.008.137-.006.2,0,.027,0,.058,0,.09-.156,3.032-11.071,5.487-24.464,5.487-1.332,0-2.629-.029-3.9-.077a27.025,27.025,0,0,0,.558-5.471c0-.477-.014-.953-.038-1.424,1.247.036,2.4.05,3.385.05,6.227,0,18.642-.494,24.466-4.172Zm0-10.387c0,.067-.008.137-.006.2,0,.027,0,.057,0,.09-.156,3.032-11.071,5.487-24.464,5.487-1.3,0-2.559-.029-3.8-.073a26.813,26.813,0,0,0-2.862-8.054c2.532.148,4.862.194,6.665.194,6.227,0,18.642-.5,24.466-4.173Zm0-25.478c0,.066-.008.137-.006.2,0,.027,0,.058,0,.09-.156,3.032-11.071,5.488-24.464,5.488s-24.312-2.457-24.465-5.49a1.457,1.457,0,0,0,0-.172c0-.033,0-.073,0-.114l-.006-6.334c5.822,3.682,18.243,4.175,24.471,4.175s18.642-.493,24.466-4.171ZM1429.4,341.75c13.889,0,22.5,2.579,23.95,4.188-1.453,1.608-10.06,4.188-23.95,4.188s-22.5-2.58-23.949-4.188C1406.9,344.329,1415.509,341.75,1429.4,341.75Zm0,12.366c2.2,0,17.644-.141,24.466-3.912v7.261c0,.068-.008.137-.006.2,0,.027,0,.058,0,.09-.156,3.031-11.071,5.488-24.464,5.488s-24.312-2.458-24.465-5.49a1.462,1.462,0,0,0,0-.172c0-.033,0-.073,0-.114l-.006-7.261C1411.747,353.975,1427.2,354.116,1429.4,354.116Zm0,25.479c2.2,0,17.644-.141,24.466-3.911v7.26c0,.068-.008.137-.006.2,0,.027,0,.058,0,.09-.156,3.031-11.071,5.487-24.464,5.487-3.215,0-6.281-.144-9.094-.4a27.1,27.1,0,0,0-15.375-9.745l0-2.891C1411.747,379.454,1427.2,379.6,1429.4,379.6Zm-6.812,25.36a23.58,23.58,0,1,1-23.581-23.58A23.607,23.607,0,0,1,1422.586,404.955Z" fill="#00183b"/>
                            <path id="Trazado_18" data-name="Trazado 18" d="M1380.784,404.953a18.221,18.221,0,1,0,18.221-18.222A18.243,18.243,0,0,0,1380.784,404.953Zm34.135,0a15.913,15.913,0,1,1-15.914-15.912A15.934,15.934,0,0,1,1414.919,404.953Z" fill="#00183b"/>
                            <path id="Trazado_19" data-name="Trazado 19" d="M1396.778,393.463v1.953a6.439,6.439,0,0,0-2.434,1.6,5.851,5.851,0,0,0-1.577,4.044,5.634,5.634,0,0,0,.454,2.263,6.062,6.062,0,0,0,2.1,2.483,13.756,13.756,0,0,0,2.954,1.517,4.839,4.839,0,0,1,1.625.923.857.857,0,0,1,.194.27.712.712,0,0,1,.051.286.587.587,0,0,1-.225.5,1.841,1.841,0,0,1-1.144.316,4.928,4.928,0,0,1-2.824-.84l-.682-.454a1.155,1.155,0,0,0-1.728.572l-1.075,3.006a1.151,1.151,0,0,0,.415,1.329l.4.284a7.771,7.771,0,0,0,2.338,1.082c.318.092.641.171.968.234v1.711a1.156,1.156,0,0,0,1.155,1.155h2.955a1.155,1.155,0,0,0,1.155-1.155v-2.029a6.614,6.614,0,0,0,2.682-1.833,6.15,6.15,0,0,0,1.514-4.053,6.5,6.5,0,0,0-.363-2.2,6.033,6.033,0,0,0-1.9-2.635,11.134,11.134,0,0,0-2.906-1.656,1.231,1.231,0,0,0-.119-.049,7.51,7.51,0,0,1-1.951-1.021.6.6,0,0,1-.151-.17.448.448,0,0,1-.015-.151.351.351,0,0,1,.1-.253,1.413,1.413,0,0,1,.921-.235,4.715,4.715,0,0,1,1.531.241,4.934,4.934,0,0,1,.921.424l.65.373a1.155,1.155,0,0,0,1.654-.593l1.123-2.96a1.156,1.156,0,0,0-.494-1.4l-.467-.274a8.429,8.429,0,0,0-2.565-.973v-1.623a1.154,1.154,0,0,0-1.154-1.155h-2.927A1.154,1.154,0,0,0,1396.778,393.463Zm2.31,2.8v-1.647h.617v1.461a1.155,1.155,0,0,0,1.043,1.15,6.623,6.623,0,0,1,2.281.618l-.3.785a6.44,6.44,0,0,0-.8-.327,7.057,7.057,0,0,0-2.272-.362,3.505,3.505,0,0,0-2.525.89,2.633,2.633,0,0,0-.8,1.908,2.559,2.559,0,0,0,.236,1.138,2.774,2.774,0,0,0,.711.915,9.575,9.575,0,0,0,2.658,1.45l0,0a8.983,8.983,0,0,1,2.374,1.325,3.762,3.762,0,0,1,1.2,1.632,4.236,4.236,0,0,1,.227,1.426,3.826,3.826,0,0,1-.944,2.533l0,0a4.525,4.525,0,0,1-2.368,1.377,1.153,1.153,0,0,0-.881,1.12v1.726h-.645v-1.56a1.155,1.155,0,0,0-1.053-1.15,8.146,8.146,0,0,1-1.577-.3,6.155,6.155,0,0,1-1.322-.54l.287-.8a7.71,7.71,0,0,0,3.531.894,3.915,3.915,0,0,0,2.646-.858,2.923,2.923,0,0,0,1.049-2.261,3.043,3.043,0,0,0-.236-1.2,3.16,3.16,0,0,0-.675-.987,7.055,7.055,0,0,0-2.417-1.449,11.5,11.5,0,0,1-2.466-1.251,3.739,3.739,0,0,1-1.328-1.528,3.3,3.3,0,0,1-.261-1.339,3.548,3.548,0,0,1,.951-2.46,4.371,4.371,0,0,1,2.177-1.211A1.153,1.153,0,0,0,1399.088,396.265Z" fill="#00183b"/>
                        </g>
                        </svg>

                        <br>
                        <div class="card-body">
                            <div class="inputCard"><p class="card-text"><strong>Total interés:</strong> $US <?php echo $total_intereses?><br><strong>Total beneficios: </strong>$US <?php echo $totalValor; ?></p></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <a href="referidos.php">
                    <div class="card" data-aos="zoom-in-right">
                        <h3 class="card-title">Referidos</h3>
                        <br>
                        <img class="svgCard" src="img/home/Grupo 21.png" alt="">
                        <br>
                        <div class="card-body">
                            <div class="inputCard"><p class="card-text"><strong>Bono de red: </strong>$US <?php echo $total_referidos?><br><strong>Volumen de equipo: </strong>$US  <?php echo $volumen?></p></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <a href="referidos.php">
                    <div class="card" data-aos="zoom-in-left">
                        <h3 class="card-title">Bonos</h3>
                        <br>
                            <?php echo $rangoActual?>
                        <br>          
                        <div class="card-body">
                            <div class="inputCard"><p class="card-text"><strong>Bonos: </strong>$US <?php echo $total_liderazgo?><br><strong>Rango:</strong> <?php echo $nombreRAngo ?></p></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <a href="retiros.php">
                    <div class="card" data-aos="zoom-in-right">
                        <h3 class="card-title">Retiros</h3>
                        <br>
                        <svg class="svgCard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.002 48.913">
                            <path id="Trazado_20" data-name="Trazado 20" d="M955.919,364H966.67c11.479,0,19.974,11.057,16.6,22.028q-.161.522-.348,1.059s10.166-4.384,6-24.174c-4-19-33-14.565-33-14.565V338.174l-21,18.739,21,18.044Z" transform="translate(-934.919 -338.174)" fill="#00183b"/>
                        </svg>
                        <br>
                        <div class="card-body">
                            <div class="inputCard"><p class="card-text"><strong>Beneficios: </strong>$US <?php echo $total_retiro?><br><strong>Depósitos: </strong>$US <?php echo $total_depositos?></p></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <div class="card" data-aos="zoom-in-left">
                    <h3 class="card-title">Herramientas</h3>
                    <br>
                    <img class="svgCard" src="img/home/planComercial.png" alt="">
                    <br>
                    <div class="card-body">
                        <div class="inputCard">
                            <p class="card-text">
                                <a href="presentation/ELITE FOUND 2024 - ES.pdf" target="_blank">
                                    <ins> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                        </svg>
                                         Presentación
                                    </ins>
                                </a>
                                <br>
                                <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalSimulador">
                                    <ins>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                         Simulador de inversión
                                    </ins>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $modalSimulador; ?>
<input type="hidden" id="user_value" value="<?php echo $Iduser?>">
<?php echo $footer ?>

<script src="js/tools/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/tools/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="js/tools/aos.js"></script>
<script src="js/criptomonedas.js"></script>
<script src="js/simulador.js"></script>
<script>
$(document).ready(function() {
        AOS.init();
        ajustarClase();
        fetchCryptoPrices();
    });

    window.addEventListener("scroll", function () {
        var header = document.querySelector("nav");
        header.classList.toggle("bg-dark", window.scrollY > 0);
        ajustarClase();
    });

    function ajustarClase() {
        const elemento = document.querySelector("nav");
        if (window.innerWidth <= 768) {
            elemento.classList.add('bg-dark');
        }
    }

    window.addEventListener('resize', ajustarClase);
</script>
</body>
</html>