
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 


    <style>
        body{
            background: #00723e;
        }
        .bg{
            background: #FFFFFF;
            background-position: center center;
        }
        .col-center{
            float: none;
            margin-left: auto;
            margin-right: auto;
        }
        #botonVerde{
            background: #00723e;
            box-shadow: 0px 6px 6px #b6b6b6;
        }   
    </style>
    
    
    </head>
    <body class="bg-gradient-primary p-2">

        <!-- Zeona blanca central con informacion -->
        <div class="d-flex flex-row justify-content-center  align-items-center mb-5 mt-5 ms-2 me-2">

            
            <div class="col-sm-6 bg-white p-2 pt-5 pb-5">

                <!-- logo y titulos pequeños -->
                <div class="text-center">
                    <img class="logo"  src="public/assets/UABC.png" width="100" alt="">
                </div>
                <h5 style="color: #007141" align="center" class="fw-bold text-center p-2 pb-0 m-0">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h5> 
                <h5 class="fw-bold text-center p-2 pt-0 m-0">Sistema de Internacionalización</h5>
                <h2 class="fw-bold text-center p-2 pt-3">Restablecer contraseña</h2>
                <!-- fin de logo y titulos  pequeños-->

                <div class="row align-items-center  justify-content-center ">
                    
                    <div class="col-sm-10">

                        <div class="col text-center rounded">
                            <h5>Instrucciones</h5> 
                            Ingrese el correo electrónico que utilizó para registrar su cuenta, después pulse el botón <strong>‘Recuperar contraseña’</strong>. Llegará un enlace a su correo para poder restaurarla.
                        </div>
                        <br>

                        <form method="POST" autocomplete="off">
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required="">
                            </div>
                            
                            <div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
                                <div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
                                    <input type="submit" value="Recuperar Contraseña" class="btn btn-primary btn-user btn-block" name="enviarmail" id="botonVerde">
                                </div>                  
                            </div>
                        </form>
                        <?php include('php-partials/sendEmail.php') ?>
                    </div>
                    
                </div>
                
            
         
            
        </div>
    </div>

    <script src="public/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>