<?php
  require("Estaticos.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="javascript/agregarCuenta.js"></script>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/coloresOficiales.css">
    <link rel="stylesheet" href="public/css/agregarCuenta.css">
    <title>registrar cuenta</title>
</head>
<body class="bg-gradient-primary p-2">

    <!-- zona principal en color blanco  -->

    <div class="d-flex flex-row justify-content-center  align-items-center mb-5 mt-5 ms-2 me-2">

        <!-- Zona dentro del margen donde se dibuja el formulario y los botones -->
        <div class="col-sm-8 bg-white p-2 pt-4 pb-4 pt-0 pb-0 rounded shadow">
            <div class="text-center">
                <img class="logo"  src="public/assets/UABC_crop.png" width="100" alt="">
            </div>
            <h5 style="color: #007141" align="center">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h5> 
            <h4 class="fw-bold text-center py-2">Sistema de Internacionalización</h4>

            <!-- titulo de la pagina -->
            <h1 class="fw-bold text-center py-2">Crear cuenta</h1>

            <h6 for="sexo" class="fw-bold text-center mt-4">Seleccione el tipo de perfil que desea crear</h6>
            <div class="d-flex flex-row justify-content-center  align-items-center mb-0 mt-0 ms-2 me-2">
                <div class="col-sm-6">
                    <select class="form-control border border-secondary bg-light text-center fw-bold" name="tipeForm" id="tipeForm" required onchange="createFormProfile();">
                        <option value="" selected>- Seleccione uno -</option>
                        <option value="1"> Estudiante de la UABC</option>
                        <option value="2">Estudiante visitante</option>
                        <option value="3">Académico de la UABC</option>
                        <option value="4">Académico visitante</option>
                    </select>
                </div>
            </div>

            <h5 class="text-center" id="formTitle"></h5>

            <!-- Formulario para crear cuentas de alumnos de la UABC que visitan otras universidades -->
            <div class="col-sm-12 mt-0" id="formSeleted" style="display:none">
                <?php  include "usuario/form_create_profile.php"; ?> 
            </div>

            <div class="Separacion_media"></div>
             <!-- -boton preguntas frecuentes -->
            <div class="col text-center rounded">
                <a href="https://docs.google.com/document/d/17tWpdwtsx3iOsZli502KIZSRMGlx9pIt2pVV-O0cjBI/edit?usp=sharing" target="_blank" >
                    <button class="btn btn-xs  btn-success" id="botonOcre">
                        Preguntas Frecuentes
                    </button>
                </a>
            </div>

            <?php btnSoporte(); ?>
            <div class="col text-center rounded">
                <footer id="footer">
                    <br>
                    <p> 
                        <a href="http://www.uabc.mx/">D.R.© Universidad Autónoma de Baja California</a>
                        <br>
                        <small>Se Recomienda Utilizar Chrome para una mejor funcionalidad</small>
                        <br>                
                        México 2021
                        <br>
                    </p>
                    
                </footer>
            </div>
            <!--div class="col text-center rounded">
             
            <div class="Separacion_xs"></div> 

            <!-- Registro con  UABC-->
            <!-- div class="col text-center rounded" >
                <a href="https://llave.uabc.edu.mx/auth/" class="btn btn-success w-30 my-1 shadow " id="botonVerde">
                <div class="row align-items-center" >
                    <div class="col-2 d-none d-md-block">
                        <img src="public/assets/logo_blanco.png" width="50" alt="">
                    </div>

                    <div class="col-12 col-md-10 text-center">Acceso usuarios UABC</div>
                </div>
                </a>
            </div-->
                
            </div>


        </div>   

    <script src="public/js/bootstrap.bundle.min.js"></script>

</body>
</html>
