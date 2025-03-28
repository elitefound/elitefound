<?php
    include(dirname(__FILE__).'/controller/sessionController.php');
    include(dirname(__FILE__).'/controller/selectPlanes.php');
    include(dirname(__FILE__).'/controller/footer.php');

    $base = 1.05;
    $dia_actual = date("z");
    $exponente = pow($base, $dia_actual);
    $valorAsociados = (int) $exponente + 254;
    $valorTransacciones = (int) $exponente + 50;
    $valorPagosTotal = (int) $exponente + 2631;
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
                            <h1 class="modal-title">REGISTRO</h1>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <?php echo $referido; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control inputRegistro" name="Nombre" id="floatingInputNombre" placeholder="Nombre" required>
                                <label for="floatingInputNombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control inputRegistro" name="Apellido" id="floatingInputApellido" placeholder="Apellido" required>
                                <label for="floatingInputApellido">Apellido</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control inputRegistro" name="Email" id="floatingInputemail" placeholder="Correo electrónico" required>
                                <label for="floatingInputemail">Correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control inputRegistro" name="userName" id="floatingInputuserName" placeholder="Nombre de usuario" required>
                                <label for="floatingInputuserName">Nombre de usuario</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
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
                            <div class="form-floating mb-3">
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
                            <div class="form-floating mb-3">
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

    <div id="carouselExampleCaptions" class="carousel slide seccion_1 centrarElementos" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="6000">
                <img src="img/home/homeFondo.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <h1>Invierte con sabiduría</h1>
                    <h4>Haz que cada decisión financiera cuente hacia un futuro extraordinario.</h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="6000">
                <img src="img/home/Invierte con sabiduría.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <h1>Cosecha tu futuro</h1>
                    <h4>Equilibra tus recursos hoy para un mañana próspero.</h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="6000">
                <img src="img/home/Transforma tus oportunidades.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <h1>Transforma tus oportunidades</h1>
                    <h4>Convierte tus decisiones en un legado financiero que trascienda generaciones.</h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="6000">
                <img src="img/home/Crecimiento sin límites.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <h1>Crecimiento sin límites</h1>
                    <h4>Tu capital no solo crece, se multiplica. Únete a la nueva era.</h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="6000">
                <img src="img/home/Un futuro brillante comienza ahora.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="top: 50%; transform: translateY(-50%);">
                    <h1>Un futuro brillante comienza ahora</h1>
                    <h4>Haz de cada inversión una historia de éxito. Donde tus sueños financieros se hacen realidad.</h4>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

<section class="seccion_oscura seccion_2" style="height: 56.4vw;">
    <div class="customers marcador"><p><?php echo $valorAsociados; ?>k</p><p>Asociados</p></div>
    <div class="transactions marcador"><p><?php echo $valorTransacciones; ?>M</p><p>Transacciones totales</p></div>
    <div class="payments marcador"><p><?php echo $valorPagosTotal; ?></p><p>Pagos totales</p></div>
    <div data-aos="zoom-in-right" class="info m-3"><p>En ELITE FOUND, entendemos la importancia de tomar decisiones financieras inteligentes y seguras. Nuestro compromiso es brindarte la oportunidad de invertir en algunos de los mercados más sólidos, respetados y diversificados del mundo, incluyendo el S&P 500, la Bolsa de Valores de Tokio, la Bolsa de Londres, el NASDAQ, así como en materias primas y por supuesto, en criptomonedas con gran proyección de crecimiento. Aquí, no solo te brindamos un camino hacia la inversión, sino también hacia la confianza y la rentabilidad.</p></div>
    <div data-aos="zoom-in-left" class="ilustracion mb-3"><img src="img/home/ilustracion1.png" alt=""></div>
</section>
<section class="seccion_clara" id="Mercados">
    <div data-aos="zoom-in" id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slideHome">
                    <div class="izquierda">
                        <div class="texto_1 centrarElementos">
                            <div class="texto_1_1 my-1">
                                <h2 style="text-align: left;">
                                    MATERIAS PRIMAS&nbsp;&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46.508" height="27.916" viewBox="0 0 46.508 27.916">
                                        <g id="Grupo_1232" data-name="Grupo 1232" transform="translate(-501.512 -2615)">
                                            <path id="Trazado_422" data-name="Trazado 422" d="M526.084,2641.916h19.47a1.443,1.443,0,0,0,1.289-2.094l-4.373-8.671a1.845,1.845,0,0,0-1.648-1.015h-9.914a2.215,2.215,0,0,0-2.028,1.325l-3.87,8.811A1.173,1.173,0,0,0,526.084,2641.916Z" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <path id="Trazado_423" data-name="Trazado 423" d="M503.7,2641.916h19.47a1.444,1.444,0,0,0,1.289-2.094l-4.373-8.671a1.847,1.847,0,0,0-1.649-1.015h-9.914a2.214,2.214,0,0,0-2.027,1.325l-3.87,8.811A1.173,1.173,0,0,0,503.7,2641.916Z" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <path id="Trazado_424" data-name="Trazado 424" d="M515.482,2627.78h19.47a1.443,1.443,0,0,0,1.289-2.094l-4.373-8.671A1.847,1.847,0,0,0,530.22,2616h-9.914a2.215,2.215,0,0,0-2.028,1.324l-3.87,8.812A1.173,1.173,0,0,0,515.482,2627.78Z" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                        </g>
                                    </svg>
                                </h2>
                                <br>
                                <p>Desde la perspectiva de una cartera de inversión, incorporar materias primas en su estrategia es una elección inteligente para diversificar más allá de los activos convencionales. En ELITE FOUND, le damos la oportunidad de aprovechar los mercados globales de metales preciosos y energéticos más destacados. Contamos con una presencia en más de 20 materias primas a nivel internacional y le ofrecemos la flexibilidad necesaria en cuanto al tamaño de sus inversiones, lo que facilita su participación en estos mercados con confianza.</p>
                            </div>
                        </div>
                    </div>
                    <div class="derecha my-1">
                        <div class="videoSlide centrarElementos">
                            <img src="img/home/Materias primas.gif " alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slideHome">
                    <div class="izquierda my-1">
                        <div class="videoSlide centrarElementos">
                            <img src="img/home/ETF'S.gif" alt="">
                        </div>
                    </div>
                    <div class="derecha">
                        <div class="texto_1 centrarElementos">
                            <div class="texto_1_1 my-1">
                                <h2 style="text-align: right;"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33.5" height="37.5" viewBox="0 0 33.5 37.5">
                                        <g id="Grupo_1228" data-name="Grupo 1228" transform="translate(-1672.5 -3712.5)">
                                            <rect id="Rectángulo_32" data-name="Rectángulo 32" width="23" height="29" rx="1.734" transform="translate(1673.5 3713.5)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <rect id="Rectángulo_33" data-name="Rectángulo 33" width="23" height="29" rx="1.734" transform="translate(1682 3720)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <line id="Línea_9" data-name="Línea 9" x2="12.239" transform="translate(1687.5 3729.5)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <line id="Línea_10" data-name="Línea 10" x2="12.239" transform="translate(1687.5 3734.5)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <line id="Línea_11" data-name="Línea 11" x2="12.239" transform="translate(1687.5 3739.5)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                        </g>
                                    </svg>&nbsp;&nbsp;
                                    ETF’S
                                </h2>
                                <br>
                                <p>Considerar la incorporación de ETFs (Exchange Traded Funds) en su estrategia es una decisión inteligente para diversificar su cartera más allá de las inversiones tradicionales. Los ETFs ofrecen una forma eficiente y accesible de invertir en una amplia gama de activos financieros, desde acciones y bonos hasta sectores específicos de la economía. En ELITE FOUND, le brindamos la oportunidad de explorar y capitalizar en una variedad de ETFs líderes a nivel mundial, proporcionándole la flexibilidad y la confianza necesarias para participar en estos mercados de manera efectiva.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slideHome">
                    <div class="izquierda">
                        <div class="texto_1 centrarElementos">
                            <div class="texto_1_1 my-1">
                                <h2 style="text-align: left;">
                                    ÍNDICES BURSÁTILES&nbsp;&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44.109" height="49.45" viewBox="0 0 44.109 49.45">
                                        <g id="Grupo_1225" data-name="Grupo 1225" transform="translate(-569.5 -4824.55)">
                                            <line id="Línea_6" data-name="Línea 6" y2="37.341" transform="translate(607.241 4830.241)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <line id="Línea_7" data-name="Línea 7" y2="49.45" transform="translate(591.307 4824.55)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <line id="Línea_8" data-name="Línea 8" y2="38.18" transform="translate(575.621 4830.241)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <rect id="Rectángulo_28" data-name="Rectángulo 28" width="10.243" height="35.281" rx="3.34" transform="translate(586.433 4830.184)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <rect id="Rectángulo_29" data-name="Rectángulo 29" width="10.243" height="23.9" rx="3.117" transform="translate(602.367 4839.288)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                            <rect id="Rectángulo_30" data-name="Rectángulo 30" width="10.243" height="27.314" rx="3.266" transform="translate(570.5 4834.736)" fill="#fff" stroke="#00183b" stroke-miterlimit="10" stroke-width="2"/>
                                        </g>
                                    </svg>
                                </h2>
                                <br>
                                <p>Explorar los índices bursátiles e incluirlos en su estrategia es una elección inteligente para ampliar su cartera. Estos índices son una herramienta efectiva para rastrear y capitalizar en el desempeño de los mercados financieros, reflejando a menudo segmentos específicos de la economía o regiones geográficas. En ELITE FOUND, estamos para brindarle la flexibilidad y la confianza necesarias para diversificar su cartera de manera estratégica.</p>
                            </div>
                        </div>
                    </div>
                    <div class="derecha my-1">
                        <div class="videoSlide centrarElementos">
                            <img src="img/home/Indices Bursatiles.gif" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="seccion_oscura">
    <h1 class="my-3">¿POR QUÉ INVERTIR CON NOSOTROS?</h1>
    <div class="galeriaX4">
        <article class="row flex-md-row justify-content-md-center" data-aos="zoom-in-right">
             <div class="col-3 centrarElementos ilustracion"><img src="img/home/acompañamiento.png" alt=""></div>
             <div class="col-9"><h3>Acompañamiento<br><br></h3><p>Tu éxito es nuestro éxito. Ofrecemos un servicio al cliente excepcional y estamos disponibles para responder a tus preguntas y ayudarte en cada paso del camino. Tu satisfacción es lo más importante para nosotros.</p></div>
        </article>
        <article class="row flex-md-row justify-content-md-center" data-aos="zoom-in-left">
             <div class="col-3 centrarElementos ilustracion"><img src="img/home/rentabilidad.png" alt=""></div>
             <div class="col-9"><h3>Rentabilidad Consistente</h3><p>Nuestro objetivo es claro: queremos ayudarte a lograr un crecimiento financiero sostenible. Ofrecemos un atractivo porcentaje de rentabilidad semanal en todos nuestros paquetes de inversión. Ya sea que estés comenzando con $50 o estés listo para invertir $10000, nuestro enfoque en la rentabilidad constante puede ayudarte a alcanzar tus metas financieras.</p></div>
        </article>
        <article class="row flex-md-row justify-content-md-center" data-aos="zoom-in-right">
             <div class="col-3 centrarElementos ilustracion"><img src="img/home/universal.png" alt=""></div>
             <div class="col-9"><h3>Acceso<br>Universal</h3><p>No importa si eres un inversor experimentado o si apenas estás empezando tu viaje en el mundo de las inversiones. En ELITE FOUND, todos son bienvenidos. Nuestro de paquete se adapta a diferentes niveles de inversión y experiencia.</p></div>
        </article>
        <article class="row flex-md-row justify-content-md-center" data-aos="zoom-in-left">
             <div class="col-3 centrarElementos ilustracion"><img src="img/home/seguridad.png" alt=""></div>
             <div class="col-9"><h3>Seguridad<br><br></h3><p>Contamos con los más altos estándares de seguridad sobre tu información.</p></div>
        </article>
    </div>
</section>
<section class="seccion_clara">
    <h1 class="mt-3">PLANES</h1>
    <div class="articulos">
        <?php echo empty($planes) || $planes == 0 ? "" : $planes ?>
    </div>
</section>
<section class="imagenFondo seccion_6" style="height: 56.4vw;">
    <div class="leyenda seccion_oscura" data-aos="flip-up">
        <p>Con gran orgullo, mantenemos firmemente nuestro compromiso con la responsabilidad y la coherencia hacia nuestros clientes, nuestra familia y todos aquellos que han depositado su confianza en nosotros.</p>
    </div>
</section>
<?php echo $footer ?>        

<script src="js/tools/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/tools/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="js/tools/aos.js"></script>
<script src="js/comenzar.js"></script>
<script src="js/session.js"></script>
<script src="js/criptomonedas.js"></script>
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
