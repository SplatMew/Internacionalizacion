<?php
    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        if ($_SESSION["admin"] >= 7 && $_SESSION["admin"]<=10) {
            header("Location: usuario/Perfiles_no_administrativo.php");     
        }
        else if ($_SESSION["admin"]>=1&&$_SESSION["admin"]<=5){
            header("location: seleccion_modulos.php");
        }else{
            //include("php-partials/pantallaError.php");
            include("Pantalla_Error.php");
            PantallaError("public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",0);
        }
        
        exit();
    }
    include("Estaticos.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center">
    

    <div class="col-sm-8 bg-white mt-5 mb-5 mr-2 ml-2 p-2 rounded justify-content-center  align-items-center">
        <div class="text-center">
            <img class="logo"  src="public/assets/UABC_crop.png" width="140" alt="256">
        </div>

        <h4 style="color: #007141" class="text-center">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h4> 
        <h2 class="fw-bold text-center py-2">Sistema de Internacionalización</h2>

        <!-- LOGIN   -->

        <div class="d-flex justify-content-center align-items-center">
            <div class="col-sm-8 bg-white m-0 p-0 ">
                <form class="user ml-5 mr-5" action="php-partials/login.php" method="post">

                    <div class="mb-4">
                        <!--Deberia ser de tipo email-->
                        <input type="text" name="email" placeholder="Correo Electrónico" class="form-control border border-secondary bg-light text-center">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>

                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control border border-secondary bg-light text-center">
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" name="connected" class="form-check-input" >
                        <label for="connected" class="form-check-label">Mantenerme conectado</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login" id="btn_soporte">
                        Ingresar
                    </button>
                </form>
                <div class="ml-5 mt-3">
                    <span>¿Aún no tienes cuenta? <a href="registrarse.php">Registrate</a></span> <br>
                    <span><a href="recuperar_contrasena.php">¿Olvidaste tu Contraseña?</a></span>
                </div>
            </div>
        </div>
    
        <div class="d-flex justify-content-center">
            <a href="https://www.uabc.mx/campus-y-unidades-academicas/" class="mt-4" target="_blank" >
                <button   type="button" class="btn btn-xs  btn-success" id="btnBuscarUA" >
                    Contactar unidad académica
                </button>
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="mt-4" href="https://docs.google.com/document/d/17tWpdwtsx3iOsZli502KIZSRMGlx9pIt2pVV-O0cjBI/edit?usp=sharing" target="_blank" >
                <button  class="btn btn-xs  btn-success" id="btn_preguntas">
                    Preguntas Frecuentes
                </button>
            </a>
        </div>

        <?php
            btnSoporte();
        ?>

        <div class="d-flex justify-content-center mt-5">
            <a href="http://www.uabc.mx/" class="fw-bold text-center">D.R.© Universidad Autónoma de Baja California</a>
        </div>
                    
    </div>

    <script src="public/js/bootstrap.bundle.min.js" ></script>
    
    
</body>

</html>