<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit();
}

if($_SESSION['admin']===10){
    include("Pantalla_Error.php");
    PantallaError("public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",0);
    exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
    include("Pantalla_Error.php");
    PantallaError("public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",0);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #00723e;
        }
        #botonVerdeBold{
            background: #00723e;
            box-shadow: 0px 6px 10px #b6b6b6;
            font-weight: bold;
            font-size: 20px;
        } 
        #botonVerde{
            background: #00723e;
            box-shadow: 0px 5px 10px #b6b6b6;
        }
        #botonVerdeOutline1{
            border-color: #00723e;
            border-width: 3px;
            box-shadow: 0px 3px 6px #b6b6b6;
            font-weight: bold;
        }
        #botonVerdeOutline2{
            border-color: #00723e;
            border-width: 3px;
            box-shadow: 0px 3px 6px #b6b6b6;
            font-weight: bold;
        }
        #botonVerdeOutline3{
            border-color: #00723e;
            border-width: 3px;
            box-shadow: 0px 3px 6px #b6b6b6;
            font-weight: bold;
        }
        #botonVerdeOutline4{
            border-color: #00723e;
            border-width: 3px;
            box-shadow: 0px 3px 6px #b6b6b6;
            font-weight: bold;
        }
        #botonOcreBold{
            background: #df9717;
            box-shadow: 0px 6px 6px #b6b6b6;
            font-weight: bold;
            font-size: 20px;
        } 
        #botonOcre{
            background: #df9717;
            box-shadow: 0px 6px 6px #b6b6b6;
        }  
    </style>


</head>

<body>

    <div class="d-flex justify-content-center">
        <div class="col-sm-8 bg-white shadow rounded mt-5 mb-5 ml-2 mr-2 pt-5 pb-5 ps-2 pe-2">
            <div class="d-flex flex-column">

                <div class="d-flex justify-content-center">
                    <img class="logo"  src="public/assets/UABC.png" width="100" alt="">
                </div>

                <!-- TITULOS DEL ENCABEZADO-->
                <h6 style="color: #007141" align="center">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h6> 
                <h5 class="fw-bold text-center ">Sistema de Internacionalización</h5> <br>
                <h3 class="fw-bold text-center " style="color: #007141"> <?php echo "Bienvenido " . $_SESSION['nombre']; ?></h3> <br>
                <h4 class="fw-bold text-center py-2" >Módulos</h4>

                <!-- ZONA DE SELECCION DE MODULOS-->
                <div class="row">
                    <!-- MODULOS ESTUDIANTES-->
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-center p-1">
                            <p>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="botonVerdeBold">
                                        ESTUDIANTES
                                </button>
                            </p>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <div class="col-12 text-center rounded">
                                <button class="btn btn-outline-success w-30 my-1" id="botonVerdeOutline1" >
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-10 text-center">VISITANTES</div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-12 text-center rounded">
                                <button class="btn btn-outline-success w-30 my-1" id="botonVerdeOutline2">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-10 text-center">SALIDA</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- MODULOS ACADEMICOS-->
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-center p-1">
                            <p>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" id="botonVerdeBold">
                                    ACADÉMICOS
                                </button>
                            </p>
                        </div>
                        <div class="collapse" id="collapseExample2">
                            <div class="col-12 text-center rounded">
                                <button class="btn btn-outline-success w-30 my-1" id="botonVerdeOutline3" >
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-10 text-center">VISITANTES</div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-12 text-center rounded">
                                <button class="btn btn-outline-success w-30 my-1" id="botonVerdeOutline4">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-10 text-center">SALIDA</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ZONA CE BOTONES DE ACCCESO Y AYUDAS-->
                <div class="d-flex flex-column">

                    <!-- BOTÓN DE CONTACTOA UNIDAD ACADEMICA-->
                    <div class="d-flex justify-content-center mt-5 ">
                        <a href="https://www.uabc.mx/campus-y-unidades-academicas/" target="_blank" >
                            <button   type="button" class="btn btn-xs  btn-success" id="botonVerde" >
                                Contactar unidad académica
                            </button>
                        </a>
                    </div>
                </div>

                <!-- BOTÓN PREGUNTAS FRECUENTES-->
                <div class="d-flex justify-content-center mt-3 ">
                    <a href="https://docs.google.com/document/d/17tWpdwtsx3iOsZli502KIZSRMGlx9pIt2pVV-O0cjBI/edit?usp=sharing" target="_blank" >
                        <button class="btn btn-xs  btn-success" id="botonOcre">
                            Preguntas Frecuentes
                        </button>
                    </a>
                </div>

                <?php require("Estaticos.php"); 
                     btnSoporte();
                ?>

                <!-- ENLACE PARA CERRAR SESIÓN -->
                <a href="php-partials/logout.php" class="fw-bold text-center mt-4" style="color:#00723e; font-weight: 400;">Cerrar Sesión</a>
            </div>
            
        </div>
    </div>


    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script>
        const est_entrada  = document.getElementById("botonVerdeOutline1");
        const est_salida  = document.getElementById("botonVerdeOutline2");
        const acad_entrada  = document.getElementById("botonVerdeOutline3");
        const acad_salida  = document.getElementById("botonVerdeOutline4");

        

        est_entrada.addEventListener("click",()=> {
            window.location.href = "estudiantes/entrada/cascaron.php";
        });

        est_salida.addEventListener("click",()=> {
            window.location.href = "estudiantes/salida/cascaron.php";
        });

        acad_entrada.addEventListener("click",()=> {
            window.location.href = "academicos/entrada/cascaron.php";
        });

        acad_salida.addEventListener("click",()=> {
            window.location.href = "academicos/salida/cascaron.php";
        });
    </script>

</body>

</html>