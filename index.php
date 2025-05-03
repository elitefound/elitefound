<?php
    include(dirname(__FILE__).'/controller/sessionController.php');
    //include(dirname(__FILE__).'/controller/selectPlanes.php');
    include(dirname(__FILE__).'/controller/selectPlanesNew.php');
    include(dirname(__FILE__).'/controller/footer.php');

    $base = 1.05;
    $dia_actual = date("z");
    $exponente = pow($base, $dia_actual);
    $valorAsociados = (int) ($exponente * 0.338);
    $valorTransacciones = (int) ($exponente * 0.13);
    $valorPagosTotal = (int) ($exponente + 770);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/tools/8_0_1_normalize.css">
    <link rel="stylesheet" href="css/tools/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/tools/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/tools/aos.css" type="text/css">
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" href="css/home/homeStyle.css">
    <link rel="stylesheet" href="css/home/menu.css">
    <link rel="stylesheet" href="css/criptomonedas.css">
    <link rel="stylesheet" href="css/cargaSecuencialInteractiva.css">
    <link rel="stylesheet" href="css/tarjetasScroll.css">

    <title>INICIO | ELITE FOUND</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6LdDK4sqAAAAAC_ZMNbh9LH2V-BsW56Swj7QrDPz"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <svg class="ps-1" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 571.13 607.86">
                    <path d="M560.72,491.08c-10.72,11.1-20.93,22.74-32.24,33.2-44.46,41.09-96.26,68.19-156.14,78.58-81.01,14.06-156.33-1.5-224.3-47.57C69.32,501.94,22.82,426.92,5.87,333.85-7.37,261.09,1.86,190.79,32.81,123.46c.69-1.49,1.44-2.96,2.88-4.21-1.07,3.97-2.22,7.91-3.19,11.91-29.63,122.32-4.07,231.48,80.73,324.94,51.37,56.61,116.23,90.62,192.17,101.66,92.73,13.49,176.33-9.28,250.83-65.84,1.02-.77,2.09-1.48,3.13-2.21,.45,.46,.9,.91,1.35,1.37Z"/>
                    <path d="M165.94,452.62c-74.76-56.13-114.74-130.47-112.78-224.53,1.92-91.79,43.65-163.24,117.79-216.33-93.67,145.96-100.35,292.68-5.01,440.86Z"/>
                    <path d="M173.36,224.69c12.66,95.44,92.09,155.45,173.17,157.64,87.91,2.37,170.1-61.34,183.3-156.71,2.48,29.54-2.46,57.88-14.5,85-12.12,27.29-29.99,50.19-53.59,68.52-61.07,47.44-144.85,50.71-209.33,8.1-65.38-43.21-85.07-115.69-79.05-162.55Z"/>
                    <path d="M512.44,363.25c29.66-40.97,41.13-86.35,32.36-136.21-6.79-38.63-25.29-71.19-54.34-97.58-59.77-54.32-153.78-61.78-223.66-7.55,3.75-10.19,36.37-35.29,59.25-45.63,23.43-10.58,48.01-15.69,73.69-15.39,72.97,.83,137.84,47.33,161.62,115.6,24.06,69.06,2.06,143.29-48.94,186.78Z"/>
                    <path d="M136.16,212.9c-.43-57.79,31.98-144.63,120.89-189.43,81.12-40.87,175.8-25.67,236.48,24.76-13.53-4.1-27.18-8.73-41.09-12.35-46.41-12.08-93-14.35-139.53-.64-48.03,14.15-86.53,42.49-118.48,80.34-23.47,27.8-41.8,58.75-55.87,92.25-.61,1.45-1.34,2.85-2.4,5.07Z"/>
                    <path d="M412.23,237.7c.25,30.38-24.49,55.9-54.5,56.2-31.83,.32-57.31-24.11-57.54-55.17-.24-31.26,24.35-56.38,55.52-56.7,31.14-.32,56.27,24.43,56.53,55.67Z"/>
                </svg>
                 ELITE FOUND
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-centrado">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">Mercados</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.google.com/finance/quote/.INX:INDEXSP" target="_blank">INDEXSP</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="planes.php">Planes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="company.php">Compañía</a>
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
                        <?php echo $menuPerfil ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="subscribe.php" id="subscribe" method="post">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                   
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="espacio">
                        <img src="img/home/Grupo 21.png" alt="">
                        </div>
                        <div class="bodyModal">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.287" height="30.338" viewBox="0 0 23.287 30.338">
                                        <path id="Trazado_8" data-name="Trazado 8" d="M735.211,481.489a7.259,7.259,0,1,0-6.465,0,11.608,11.608,0,0,0-8.411,11.133V498.1h23.287v-5.479A11.608,11.608,0,0,0,735.211,481.489Z" transform="translate(-720.335 -467.763)" fill="#e3e3e3"/>
                                    </svg>
                                </span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="EmailUser" id="EmailUser" placeholder="Email ID">
                                    <label for="EmailUser">Correo electrónico</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.854" height="33.354" viewBox="0 0 26.854 33.354">
                                        <g id="Grupo_12" data-name="Grupo 12" transform="translate(-717.49 -569.782)">
                                            <path id="Trazado_9" data-name="Trazado 9" d="M741.427,580.808h-2.033V578.27a8.488,8.488,0,0,0-16.977,0v2.538H720.38a2.9,2.9,0,0,0-2.89,2.889V600.22a2.909,2.909,0,0,0,2.89,2.916h21.047a2.916,2.916,0,0,0,2.917-2.916V583.7A2.909,2.909,0,0,0,741.427,580.808Zm-15.173-2.538a4.652,4.652,0,1,1,9.3,0v2.538h-9.3Zm6.222,17.218v4.221a.317.317,0,0,1-.333.306h-2.02a.312.312,0,0,1-.308-.306v-4.221a3.708,3.708,0,1,1,2.661,0Z" fill="#e3e3e3"/>
                                        </g>
                                    </svg>
                                 </span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="passUser" id="passUser" placeholder="Password">
                                    <label for="passUser">Contraseña</label>
                                </div>
                                <button type="button" class="input-group-text" onclick="togglePassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" fill="#e3e3e3"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" fill="#e3e3e3"/></svg>
                                </button>
                            </div>
                        </div>
                        <div id="respuesta" style="color: red"></div>
                        <div class="row modalFoo">
                            <div class="col">
                                <p style="text-align: right;"><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#olvidoPass"><i>¿Has olvidado tu contraseña?</i></button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="btnLogin">
                        <button id="btnAcceso" type="button" class="btn">ACCESO</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="olvidoPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="olvidoPassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/changepassword.php" method="post">
                <div class="modal-body formDepositar_1">
                    <div class="row">
                        <div class="col">
                            <h1 class="modal-title">¿Has olvidado tu contraseña?</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="email" class="form-control inputRegistro" name="EmailUser" id="EmailUser" placeholder="Email ID" required>
                                <label for="EmailUser">Correo electrónico</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none";>
                    <button type="submit" class="btn  botonRegistro">Enviar correo</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="registroForm">

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <p class="modal-title">REGISTRO</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <?php echo $referido; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control inputRegistro" name="Nombre" id="floatingInputNombre" placeholder="Nombre" required>
                                <label for="floatingInputNombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control inputRegistro" name="Apellido" id="floatingInputApellido" placeholder="Apellido" required>
                                <label for="floatingInputApellido">Apellido</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="email" class="form-control inputRegistro" name="Email" id="floatingInputemail" placeholder="Correo electrónico" required>
                                <label for="floatingInputemail">Correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control inputRegistro" name="userName" id="floatingInputuserName" placeholder="Nombre de usuario" required>
                                <label for="floatingInputuserName">Nombre de usuario</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control inputRegistro" name="Password_1" id="floatingInputpassword" placeholder="Contraseña" aria-describedby="validationServer03Feedback" required>
                                <label for="floatingInputpassword">Contraseña</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <p><strong>Crea tu contraseña siguiendo estas reglas</strong></p>
                                    <ol>
                                        <li>Mínimo 8 caracteres de longitud.</li>
                                        <li>Una letra mayúscula y una minúscula.</li>
                                        <li>Un número.</li>
                                        <li>Un carácter que no sea una letra ni número.</li>
                                    </ol>
                                </div>
                                <div class="valid-feedback">
                                    ¡Muy Bien!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control inputRegistro" name="Password_2" id="floatingInputpasswordConf" placeholder="Contraseña" required>
                                <label for="floatingInputpasswordConf">Confirmar contraseña</label>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    La contraseña debe ser igual.
                                </div>
                                <div class="valid-feedback">
                                    ¡Muy Bien!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control inputRegistro" name="Cedula" id="floatingInputCedula" placeholder="Cédula" required>
                                <label for="floatingInputCedula">Documento de identidad</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" name="terminosCheck" type="checkbox" id="terminosCheck">
                                <label class="form-check-label" for="terminosCheck">
                                    <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalGeneralTerms">Acepto los términos de uso</a>
                                </label>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="modal-footer" style="border: none;">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="condicion" id="condicion" style="display: none">
                            <button id="registrarse" type="button" class="btn botonRegistro">Regístrate ahora</button>
                        </div>
                    </div>  
                </div>

            </form>
        </div>
    </div>
</div>

<?php echo isset($prueba) ? $prueba : ''; ?>
<div class="espacioMenu"></div>

    <div id="carouselExampleCaptions" class="carousel slide seccion_1 centrarElementos" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <!--<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
        </div>
        <div class="carousel-inner">
            <!--<div class="carousel-item">
                <img src="img/home/homeFondo.png" class="d-block" alt="..." style="filter: brightness(0.4);">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <div class="row">
                        <div class="col-12 textoCentro robot">
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="carousel-item active">
                <img src="img/home/Banner_1.png" class="d-block" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-start">
                    <div class="row">
                        <div class="col-12 col-md-7 textoIzquierdo robot">
                            <h1><strong>Invierte en tu futuro, desde cualquier lugar, en cualquier momento.</strong></h1>
                            <p class="robot">Accede a mercados globales, rentabilidad constante y atención personalizada 24/7</p>
                            <br>
                            <div>
                                <button class="btn-Verde mb-3 p-2 rounded" data-bs-toggle="modal" data-bs-target="#Registro">Comenzar a Invertir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>--> 
    </div>
    <div class="row">
        <div class="col">
            <div class="marquee-container robot">
                <div class="marquee" id="cryptoTable"><p>Cargando valores del mercado.... Cargando valores del mercado.... Cargando valores del mercado.... Cargando valores del mercado.... Cargando valores del mercado.... Cargando valores del mercado.... Cargando valores del mercado....</p></div>
            </div>
        </div>
    </div>

<section class="seccion_oscura seccion_2 robot">
    <div class="customers marcador"><p><?php echo $valorAsociados; ?>k</p><p>Asociados</p></div>
    <div class="transactions marcador"><p><?php echo $valorTransacciones; ?>M</p><p>Transacciones totales</p></div>
    <div class="payments marcador"><p><?php echo $valorPagosTotal; ?></p><p>Pagos totales</p></div>
    <div data-aos="zoom-in-right" class="info m-3"><p><br>En ELITE FOUND, nos enfocamos en decisiones financieras inteligentes y seguras. Te ofrecemos acceso a mercados sólidos y diversificados como el S&P 500, NASDAQ, Bolsa de Tokio, Bolsa de Londres, materias primas y criptomonedas con alto potencial. Nuestro objetivo es brindarte confianza y rentabilidad en cada inversión.</p></div>
    <div data-aos="zoom-in-left" class="ilustracion mb-3 p-2"><br><img class="p-3" src="img/home/ilustracion1.png" alt=""></div>
</section>

<section class="seccion_clara robot textoCentro" id="Mercados">
    <h1 class="mt-3 textoCentro">MERCADOS</h1>
    <div class="articulosx4 mt-5">
        <article data-aos="zoom-in-right">

                <a href="#" class="tarjetax4">
                    <p><img src="img/home/mercado_1.png" alt=""><br>
                    <strong>MATERIAS<br>PRIMAS</strong></p>
                    <a class="btnHover" href="#"><p class="back p-3">Invierte en materias primas como oro, plata, petróleo, gas natural, azúcar y más, con oportunidades diversificadas y rentables en nuestro fondo.</p></a>
                </a>

        </article>
        <article data-aos="zoom-in-left">

                <a href="#" class="tarjetax4">
                    <p><img src="img/home/mercado_2.png" alt=""><br>
                    <strong>ÍNDICES<br>BURSÁTILES</strong></p>
                    <a class="btnHover" href="#"><p class="back p-3">Invierte en oportunidades que siguen los principales índices bursátiles globales, diversificando tu cartera y maximizando tu rentabilidad</p></a>
                </a>

        </article>
        <article data-aos="zoom-in-right">

                <a href="#" class="tarjetax4">
                    <p><img src="img/home/mercado_3.png" alt=""><br>
                    <strong>CRIPTO<br>MONEDAS</strong></p>
                    <a class="btnHover" href="#"><p class="back p-3">Invierte en criptomonedas como Bitcoin las 24 horas del día, aprovechando la flexibilidad y el potencial de crecimiento que ofrecemos</p></a>
                </a>

        </article>
        <article data-aos="zoom-in-left">

                <a href="#" class="tarjetax4">
                    <p><img src="img/home/mercado_4.png" alt=""><br>
                    <strong>ETF</strong></p>
                    <a class="btnHover" href="#"><p class="back p-3">Accede a ETFs líderes globales, una forma inteligente de diversificar y potenciar tus inversiones con nuestro fondo.</p></a>
                </a>

        </article>
    </div>
</section>

<section class="seccion_clara robot">
    <div class="row">
        <div class="col-md-6">
            <p class="display-2" class="mt-3 textoIzquierdo" style="font-weight: 900;">¿Por qué invertir con nosotros?</p><br>
            <div class="containercargaSecuencial">
                <div class="box" id="box1">
                    <div class="title"><svg width="29" height="29" data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.05 19.03">
                        <path d="M18.21,4.68 A3.68,3.68 0 1,0 10.85,4.68 A3.68,3.68 0 1,0 18.21,4.68 M26.94,6.98 A2.74,2.74 0 1,0 21.46,6.98 A2.74,2.74 0 1,0 26.94,6.98 M7.6,6.98 A2.74,2.74 0 1,0 2.12,6.98 A2.74,2.74 0 1,0 7.6,6.98 M6.83,18.03H23.14v-3.2s-2.47-3.19-8.65-3.19c-5.74,0-8.65,3.19-8.65,3.19v3.2Z M2.66,13.23v4.8s-1.65,0-1.65,0v-2.4s-.14-1.67,1.65-2.4Z M26.39,13.23v4.8s1.65,0,1.65,0v-2.4s.14-1.67-1.65-2.4Z" fill="none" stroke-miterlimit="10" stroke-width="2px" stroke="#1E1E1E"/></svg> Acompañamiento</div>
                    <div class="description" style="padding-left: 32px">Tu éxito es nuestro éxito. Te brindamos servicio excepcional, apoyo constante y priorizamos tu satisfacción en cada paso.</div>
                    <div class="progress-bar"><div class="progress"></div></div>
                </div>
                <div class="box" id="box2">
                    <div class="title"><svg width="29" height="29" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="seccionWhy" d="M28.75 7.5L16.875 19.375L10.625 13.125L1.25 22.5M28.75 7.5H21.25M28.75 7.5V15" stroke="#1E1E1E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> Rentabilidad</div>
                    <div class="description" style="padding-left: 32px">Buscamos tu crecimiento financiero sostenible. Ofrecemos rentabilidad semanal atractiva en paquetes desde $50 hasta $10,000, con resultados constantes.</div>
                    <div class="progress-bar"><div class="progress"></div></div>
                </div>
                <div class="box" id="box3">
                    <div class="title"><svg width="29" height="29" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="seccionWhy" d="M27.5 15C27.5 21.9036 21.9036 27.5 15 27.5M27.5 15C27.5 8.09644 21.9036 2.5 15 2.5M27.5 15H2.5M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15M15 27.5C18.1266 24.0771 19.9034 19.635 20 15C19.9034 10.365 18.1266 5.92294 15 2.5M15 27.5C11.8734 24.0771 10.0966 19.635 10 15C10.0966 10.365 11.8734 5.92294 15 2.5M2.5 15C2.5 8.09644 8.09644 2.5 15 2.5" stroke="#1E1E1E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> Acceso</div>
                    <div class="description" style="padding-left: 32px">Ya seas experto o principiante, en ELITE FOUND todos son bienvenidos. Nuestros paquetes se adaptan a tu nivel y experiencia.</div>
                    <div class="progress-bar"><div class="progress"></div></div>
                </div>
                <div class="box" id="box3">
                    <div class="title"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="seccionWhy" d="M8.45833 13.2917V8.45841C8.45833 6.85607 9.09486 5.31934 10.2279 4.18631C11.3609 3.05328 12.8977 2.41675 14.5 2.41675C16.1024 2.41675 17.6391 3.05328 18.7721 4.18631C19.9051 5.31934 20.5417 6.85607 20.5417 8.45841V13.2917M6.04167 13.2917H22.9583C24.293 13.2917 25.375 14.3737 25.375 15.7084V24.1667C25.375 25.5014 24.293 26.5834 22.9583 26.5834H6.04167C4.70698 26.5834 3.625 25.5014 3.625 24.1667V15.7084C3.625 14.3737 4.70698 13.2917 6.04167 13.2917Z" stroke="#1E1E1E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> Seguridad</div>
                    <div class="description">Garantizamos los más altos estándares de seguridad para proteger tu información en todo momento.</div>
                    <div class="progress-bar"><div class="progress"></div></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center centrarElementos imagenContacto">
            <a href="contacto.php"><img class="img-fluid w-75" src="img/home/mesa-de-ayuda 1.gif" alt=""></a>
        </div>
    </div>
</section>

<section class="seccion_clara robot">

    <div class="containerCards">
        <ul id="cards">
            <!-- planes inicio -->
            <?php echo $planes ?>
            <!-- planes final -->
        </ul>
    </div>
    
</section>

<div style="width: 100vw; background: linear-gradient(0deg,rgba(33, 37, 41, 1) 50%, rgba(255, 255, 255, 1) 50%); background-attachment: fixed;">
    <?xml version="1.0" encoding="UTF-8"?>
    <svg id="Capa_2" data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 165.83" style="width: 100%; margin: auto">
    <defs>
        <style>
        .cls-1 {
            fill: #2ad47b;
        }
        </style>
    </defs>
    <g id="Capa_2-2" data-name="Capa 2">
        <g>
        <path class="cls-1" d="M149.61,127.35c-1.98,0-3.05,1.47-3.22,4.41l-.02,1.07c0,1.76,.28,3.05,.83,3.87s1.37,1.23,2.44,1.23c2.11,0,3.19-1.62,3.23-4.87v-.6c0-3.41-1.09-5.12-3.27-5.12Z"/>
        <path class="cls-1" d="M88.16,127.35c-1.73,0-2.77,1.15-3.09,3.45h5.98v-.46c.02-.95-.22-1.68-.72-2.21s-1.22-.78-2.16-.78Z"/>
        <path class="cls-1" d="M152.77,43.94c.02-.95-.22-1.68-.72-2.21s-1.22-.78-2.16-.78c-1.73,0-2.77,1.15-3.09,3.45h5.98v-.46Z"/>
        <path class="cls-1" d="M184.73,43.94c.02-.95-.22-1.68-.72-2.21s-1.22-.78-2.16-.78c-1.73,0-2.77,1.15-3.09,3.45h5.98v-.46Z"/>
        <path class="cls-1" d="M0,0V165.83H288V0H0ZM172.72,46.21c0-1.95,.36-3.66,1.08-5.15s1.77-2.64,3.16-3.45,3.02-1.22,4.92-1.22c2.67,0,4.78,.83,6.33,2.49s2.32,3.97,2.32,6.93v2.3h-11.78c.21,1.07,.67,1.9,1.39,2.51s1.64,.91,2.78,.91c1.88,0,3.34-.66,4.39-1.97l2.71,3.2c-.74,1.02-1.78,1.83-3.14,2.43s-2.81,.91-4.37,.91c-2.92,0-5.28-.87-7.08-2.61s-2.71-4-2.71-6.79v-.49Zm-13.22-9.47h2.43v-4.73h5.92v4.73h3.13v4.11h-3.13v8.7c0,.71,.13,1.21,.39,1.49s.77,.42,1.53,.42c.59,0,1.08-.04,1.48-.11v4.24c-1.07,.34-2.18,.51-3.34,.51-2.04,0-3.54-.48-4.52-1.44s-1.46-2.42-1.46-4.38v-9.44h-2.43v-4.11Zm-18.74,9.47c0-1.95,.36-3.66,1.08-5.15s1.77-2.64,3.16-3.45,3.02-1.22,4.92-1.22c2.67,0,4.78,.83,6.33,2.49s2.32,3.97,2.32,6.93v2.3h-11.78c.21,1.07,.67,1.9,1.39,2.51s1.64,.91,2.78,.91c1.88,0,3.34-.66,4.39-1.97l2.71,3.2c-.74,1.02-1.78,1.83-3.14,2.43s-2.81,.91-4.37,.91c-2.92,0-5.28-.87-7.08-2.61s-2.71-4-2.71-6.79v-.49Zm-19.83-9.47h5.55l.19,2.23c1.31-1.72,3.12-2.58,5.43-2.58,1.98,0,3.46,.59,4.44,1.78s1.49,2.96,1.52,5.34v12.25h-5.94v-12.01c0-.96-.19-1.67-.58-2.12s-1.09-.68-2.11-.68c-1.16,0-2.02,.46-2.58,1.37v13.43h-5.92v-19.02Zm-.97,57.31c.62,.56,.93,1.27,.93,2.14s-.31,1.58-.93,2.14-1.4,.83-2.34,.83-1.73-.28-2.35-.84-.92-1.27-.92-2.13,.31-1.56,.92-2.13,1.4-.84,2.35-.84,1.72,.28,2.34,.83Zm-11.9-70.74h6.26l-4.89,5.52h-4.83s3.46-5.52,3.46-5.52Zm-10.76,6.86h6.21v17c.07,2.8,1.37,4.2,3.9,4.2,1.28,0,2.24-.35,2.9-1.05s.98-1.85,.98-3.43V30.16h6.17v16.75c0,1.9-.4,3.54-1.21,4.93s-1.97,2.45-3.48,3.17-3.3,1.09-5.36,1.09c-3.12,0-5.57-.81-7.37-2.43s-2.71-3.83-2.74-6.64V30.16Zm-60.38,111.99h-6.15v-25.59h6.15v25.59Zm21.04,0h-5.94v-12.01c0-.96-.19-1.67-.58-2.12s-1.09-.68-2.11-.68c-1.16,0-2.02,.46-2.58,1.37v13.43h-5.92v-19.02h5.55l.19,2.23c1.31-1.72,3.12-2.58,5.43-2.58,1.98,0,3.46,.59,4.44,1.78s1.49,2.96,1.52,5.34v12.25Zm13.9,0h-6.05l-6.21-19.02h6.26l2.95,11.97,3.01-11.97h6.24l-6.21,19.02Zm24.96-7.65h-11.78c.21,1.07,.67,1.9,1.39,2.51s1.64,.91,2.78,.91c1.88,0,3.34-.66,4.39-1.97l2.71,3.2c-.74,1.02-1.78,1.83-3.14,2.43s-2.81,.91-4.37,.91c-2.92,0-5.28-.87-7.08-2.61s-2.71-4-2.71-6.79v-.49c0-1.95,.36-3.66,1.08-5.15s1.77-2.64,3.16-3.45,3.02-1.22,4.92-1.22c2.67,0,4.78,.83,6.33,2.49s2.32,3.97,2.32,6.93v2.3Zm13.89-6.01l-1.95-.14c-1.86,0-3.06,.59-3.59,1.76v12.04h-5.92v-19.02h5.55l.19,2.44c1-1.86,2.38-2.79,4.17-2.79,.63,0,1.18,.07,1.65,.21l-.11,5.5Zm.16-29.54h-17.86v-3.87l8.23-8.65c2.03-2.31,3.04-4.14,3.04-5.5,0-1.1-.24-1.94-.72-2.51s-1.18-.86-2.09-.86-1.63,.38-2.2,1.15-.84,1.73-.84,2.87h-5.94c0-1.57,.39-3.02,1.18-4.35s1.88-2.37,3.27-3.12,2.95-1.12,4.68-1.12c2.77,0,4.9,.64,6.39,1.92s2.24,3.11,2.24,5.5c0,1.01-.19,1.99-.56,2.94s-.96,1.96-1.75,3.01-2.07,2.45-3.82,4.21l-3.3,3.81h10.07v4.57Zm7.91,30.82c.52,.33,1.34,.6,2.47,.81s2.12,.46,2.98,.76c2.86,.98,4.29,2.75,4.29,5.29,0,1.73-.77,3.15-2.31,4.24s-3.54,1.63-5.99,1.63c-1.63,0-3.08-.29-4.36-.88s-2.27-1.38-2.99-2.39-1.07-2.07-1.07-3.18h5.54c.02,.88,.32,1.52,.88,1.92s1.28,.61,2.16,.61c.81,0,1.42-.16,1.82-.49s.61-.76,.61-1.28-.26-.91-.79-1.21-1.53-.62-3.01-.95-2.7-.76-3.66-1.29-1.69-1.18-2.2-1.94-.76-1.63-.76-2.62c0-1.75,.72-3.18,2.16-4.32s3.33-1.7,5.66-1.7c2.51,0,4.52,.57,6.05,1.71s2.29,2.63,2.29,4.48h-5.94c0-1.52-.8-2.29-2.41-2.29-.62,0-1.14,.17-1.56,.52s-.63,.78-.63,1.29,.26,.96,.77,1.28Zm18.76,12.38h-5.94v-19.02h5.94v19.02Zm-.63-21.85c-.61,.54-1.4,.81-2.37,.81s-1.76-.27-2.37-.81-.91-1.23-.91-2.07,.3-1.54,.91-2.07,1.4-.81,2.37-.81,1.76,.27,2.37,.81,.91,1.23,.91,2.07-.3,1.54-.91,2.07Zm1.39-22.07c-1.32,.71-2.89,1.07-4.69,1.07-1.61,0-3.11-.33-4.52-.99-1.41-.66-2.51-1.57-3.3-2.72-.8-1.15-1.19-2.46-1.18-3.91h5.94c.06,.94,.36,1.68,.9,2.23,.54,.55,1.25,.82,2.13,.82,1.99,0,2.99-1.47,2.99-4.42,0-2.72-1.22-4.09-3.66-4.09-1.38,0-2.41,.44-3.09,1.33l-4.71-1.11,1.56-13.09h14.96v4.61h-10.14l-.58,5.08c.42-.25,.98-.46,1.66-.65s1.36-.28,2.01-.28c2.54,0,4.5,.75,5.86,2.26s2.05,3.62,2.05,6.34c0,1.64-.37,3.13-1.1,4.46s-1.76,2.35-3.08,3.07Zm20.5,34.6c0,2.96-.82,5.32-2.47,7.06s-3.88,2.61-6.69,2.61-4.88-.81-6.52-2.43-2.53-3.82-2.65-6.6l-.02-1c0-1.9,.37-3.59,1.11-5.07s1.8-2.62,3.18-3.42,3.01-1.2,4.87-1.2c2.85,0,5.09,.88,6.73,2.65s2.46,4.16,2.46,7.2v.21Zm-4.13-43.41l-2.53,2.78v6.75h-6.17v-25.59h6.17v11.29l2.14-3.25,5.52-8.03h7.63l-8.65,11.32,8.65,14.27h-7.31l-5.45-9.53Zm23.77,52.73h-5.94v-12.01c0-.96-.19-1.67-.58-2.12s-1.09-.68-2.11-.68c-1.16,0-2.02,.46-2.58,1.37v13.43h-5.92v-19.02h5.55l.19,2.23c1.31-1.72,3.12-2.58,5.43-2.58,1.98,0,3.46,.59,4.44,1.78s1.49,2.96,1.52,5.34v12.25Zm9.53,0h-5.94v-19.02h5.94v19.02Zm-.63-21.85c-.61,.54-1.4,.81-2.37,.81s-1.76-.27-2.37-.81-.91-1.23-.91-2.07,.3-1.54,.91-2.07,1.4-.81,2.37-.81,1.76,.27,2.37,.81,.91,1.23,.91,2.07-.3,1.54-.91,2.07Zm1.04-23.92h-5.54v-6.87h-6.01v-5.08h6.01v-6.68h5.54v6.68h5.99v5.08h-5.99v6.87Zm9.18,33.39c.52,.33,1.34,.6,2.47,.81s2.12,.46,2.98,.76c2.86,.98,4.29,2.75,4.29,5.29,0,1.73-.77,3.15-2.31,4.24s-3.54,1.63-5.99,1.63c-1.63,0-3.08-.29-4.36-.88s-2.27-1.38-2.99-2.39-1.07-2.07-1.07-3.18h5.54c.02,.88,.32,1.52,.88,1.92s1.28,.61,2.16,.61c.81,0,1.42-.16,1.82-.49s.61-.76,.61-1.28-.26-.91-.79-1.21-1.53-.62-3.01-.95-2.7-.76-3.66-1.29-1.69-1.18-2.2-1.94-.76-1.63-.76-2.62c0-1.75,.72-3.18,2.16-4.32s3.33-1.7,5.66-1.7c2.51,0,4.52,.57,6.05,1.71s2.29,2.63,2.29,4.48h-5.94c0-1.52-.8-2.29-2.41-2.29-.62,0-1.14,.17-1.56,.52s-.63,.78-.63,1.29,.26,.96,.77,1.28Zm22.8,12.22c-1.07,.34-2.18,.51-3.34,.51-2.04,0-3.54-.48-4.52-1.44s-1.46-2.42-1.46-4.38v-9.44h-2.43v-4.11h2.43v-4.73h5.92v4.73h3.13v4.11h-3.13v8.7c0,.71,.13,1.21,.39,1.49s.77,.42,1.53,.42c.59,0,1.08-.04,1.48-.11v4.24Zm18.7,.16h-5.92c-.21-.39-.4-.96-.56-1.71-1.09,1.37-2.61,2.06-4.57,2.06-1.79,0-3.32-.54-4.57-1.63s-1.88-2.45-1.88-4.09c0-2.06,.76-3.62,2.29-4.68s3.74-1.58,6.64-1.58h1.83v-1.01c0-1.75-.76-2.63-2.27-2.63-1.41,0-2.11,.69-2.11,2.08h-5.92c0-1.84,.78-3.33,2.35-4.48s3.56-1.72,5.99-1.72,4.34,.59,5.75,1.78,2.13,2.81,2.16,4.87v8.42c.02,1.75,.29,3.08,.81,4.01v.3Zm8.4-12.38c.52,.33,1.34,.6,2.47,.81s2.12,.46,2.98,.76c2.86,.98,4.29,2.75,4.29,5.29,0,1.73-.77,3.15-2.31,4.24s-3.54,1.63-5.99,1.63c-1.63,0-3.08-.29-4.36-.88s-2.27-1.38-2.99-2.39-1.07-2.07-1.07-3.18h5.54c.02,.88,.32,1.52,.88,1.92s1.28,.61,2.16,.61c.81,0,1.42-.16,1.82-.49s.61-.76,.61-1.28-.26-.91-.79-1.21-1.53-.62-3.01-.95-2.7-.76-3.66-1.29-1.69-1.18-2.2-1.94-.76-1.63-.76-2.62c0-1.75,.72-3.18,2.16-4.32s3.33-1.7,5.66-1.7c2.51,0,4.52,.57,6.05,1.71s2.29,2.63,2.29,4.48h-5.94c0-1.52-.8-2.29-2.41-2.29-.62,0-1.14,.17-1.56,.52s-.63,.78-.63,1.29,.26,.96,.77,1.28Z"/>
        <path class="cls-1" d="M227.48,136.48c0,.54,.18,.98,.54,1.31s.83,.5,1.39,.5c.74,0,1.35-.16,1.84-.47s.83-.67,1.05-1.07v-3.04h-1.72c-2.06,0-3.09,.93-3.09,2.78Z"/>
        </g>
    </g>
    </svg>
</div>

<section class="imagenFondo imagenslogan seccion_6">
    <div class="leyenda" data-aos="flip-up" style="background-color: rgba(217, 217, 217, 0.75)">
        <span class="robot" style="font-size: 30px;">Con orgullo, mantenemos nuestro compromiso de responsabilidad y coherencia hacia nuestros clientes, nuestra familia y todos quienes confían en nosotros.</span>
    </div>
</section>

<div class="seccion_clara p-2">
    <div class="row justify-content-center">
        <div class="col-4 col-md centrarElementos"><img class="w-100" src="img/home/certificado_1.png" alt=""></div>
        <div class="col-4 col-md centrarElementos"><img class="w-100" src="img/home/certificado_2.png" alt=""></div>
        <div class="col-4 col-md centrarElementos"><img class="w-100" src="img/home/certificado_3.png" alt=""></div>
        <div class="col-4 col-md centrarElementos"><img class="w-100" src="img/home/certificado_4.png" alt=""></div>
        <div class="col-4 col-md centrarElementos"><img class="w-100" src="img/home/certificado_5.png" alt=""></div>
    </div>
</div>

<?php echo $footer ?>        

<script src="js/tools/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/tools/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="js/tools/aos.js"></script>
<script src="js/comenzar.js"></script>
<script src="js/session.js"></script>
<script src="js/criptomonedas.js"></script>
<script src="js/cargaSecuencialInteractiva.js"></script>
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

    function togglePassword() {
        const passwordInput = document.getElementById('passUser');
        const button = document.querySelector('.toggle-button');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            button.textContent = 'Ocultar';
        } else {
            passwordInput.type = 'password';
            button.textContent = 'Mostrar';
        }
    }
</script>
</body>
</html>
