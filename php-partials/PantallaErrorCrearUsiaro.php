<?php
    ///Esta es la pantalla por defecto que se llamará cuando existe un error al crear un nuevo usuario en los diferentes tipos posibles
    
    function PantallaError($rutaEscudo, $encabezado, $Mensaje){ ?>

        <!doctype html>
        <html lang="en">

        <head>
            <title>Sistema Internacionalización</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="../public/css/style.css">
                <link rel="stylesheet" href="../public/css/coloresOficiales.css">
            
            <style type="text/css">
                
            </style>
        <body id="fondo_principal">

            <div class="d-flex justify-content-center">
                <div class="col-sm-11 shadow rounded mt-5 mb-4">
                    <div class="d-flex justify-content-center align-items-center p-2">
                        <img src=<?php echo $rutaEscudo ?> alt="" width=100px height="138px" class="d-inline-block align-text-top mr-2 ml-2">
                        <div class="d-flex flex-column align-items-center">
                            <p class="d-flex align-items-center text-center font-weight-bold" style="color: #00723e;" >UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</p>
                            <p class="d-flex align-items-center text-center font-weight-bold" style="color: #1a2c25;" >Sistema de Internacionalización</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-sm-center mt-5 mt-4 ml-3 mr-3">
                <p class="h5"> <?php echo $encabezado ?> </p>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-sm-center mt-4 ml-3 mr-3">
                <p class="h6"> <?php echo $Mensaje ?> </p>
            </div>
            <div class="row justify-content-center">
                <button type="button" class="btn btn-light  mt-5 shadow pl-5 pr-5 border-secondary rounded">
                    <?php if($encabezado === "OPERACIÓN EXITOSA"){?>
                        <a href="../usuario/Perfiles_no_administrativo.php" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                    <?php }else{?>
                        <a href="javascript:window.history.back();" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                    <?php } ?>
                </button>
            </div> 
        </body>
<?php } ?>