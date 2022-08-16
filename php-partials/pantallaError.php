
<?php function PantallaError( $encabezado, $error) { ?>
<!doctype html>
<html lang="en">

<head>
    <title>Sistema Internacionalización</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if($encabezado==="OCURRIÓ UN ERROR"){ ?> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../public/css/style.css">
        <link rel="stylesheet" href="../../public/css/coloresOficiales.css">
    <?php } else{ ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/coloresOficiales.css">
    <?php } ?>
    <style type="text/css">
        body{
            background: linear-gradient(to bottom,#cacaca, #eaeaea, #f3f4f5, #ffffff, #ffffff);
        }
        #encabezado{
            text-align: center;
            width: 100%;
        }
        h5{
            font-weight: 300;
        }
    </style>
        <body id="fondo_principal">
            <div id="content" class="p-4 p-md-5 pt-5">
                <nav class="navbar navbar-expand-lg navbar-light bg-light py-1" id="mapa_sitio" >
                    <div class="container-fluid p-2">
                        <div class="row">
                            <div class="col-sm-auto">
                                <?php if($encabezado==="OCURRIÓ UN ERROR"){ ?>
                                    <img src="../../public/assets/UABC_crop.png" alt="" width="70" height="90" class="d-inline-block align-text-top">
                                 <?php } else{ ?>
                                    <img src="../public/assets/UABC_crop.png" alt="" width="70" height="90" class="d-inline-block align-text-top">
                                <?php } ?>  
                            </div>

                            <div class="col">
                                <div class="row">
                                    <h4 style="color: #007141">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h4>
                                </div>

                                <div class="row">
                                    <h5 style="color: #1a2c25">Sistema de Internacionalización </h5>   
                                </div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <?php if($encabezado==="OCURRIÓ UN ERROR"){ ?>
                                    <img src="../../public/assets/internacionalizacion.png"  width="300" alt="logo" class="img-fluid   p-0 d-none d-md-block "/>
                                <?php } else{ ?>
                                    <img src="../public/assets/internacionalizacion.png"  width="300" alt="logo" class="img-fluid   p-0 d-none d-md-block "/>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="row gx-5">
                    <h3 id="encabezado"> <?php echo $encabezado?></h3>             
                </div>
                <br/>
                <div class="row gx-5">
                    <h5 id="encabezado"> <?php echo nl2br($error);?></h5>

                </div>
                <?php if($_SESSION["admin"]!==1&&$_SESSION["admin"]!==2&&$_SESSION["admin"]!==3&&$_SESSION["admin"]!==4&&$_SESSION["admin"]!==5&&$_SESSION["admin"]!==10) { ?> 
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-light  mt-5 shadow pl-5 pr-5 border-secondary rounded">
                            <a href="php-partials/logout.php" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                        </button>
                    </div> 
                <?php } ?>

            </div>

            
            <script src="../public/js/jquery.min.js"></script>
            <script src="../public/js/popper.js"></script>
            <script src="../public/js/bootstrap.min.js"></script>
            <script src="../public/js/main.js"></script>

            <!-- Font Awesome JS -->
            <script
            defer
            src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"
            ></script>
            <script
            defer
            src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"
            ></script>


        </body>

</html>

<?php } ?>