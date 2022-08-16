<?php
	///Esta es la pantalla por defecto que se llamará cuando se intente acceder a un recurso que no esta autorizado para el usuario, 
	///Se debe enviar la ruta relativa de las imagenes desde el punto donde es llamada la pantalla de error, de lo contrario se devolvera un evento en blanco
	
	function PantallaError($rutaEscudo, $encabezado, $Mensaje, $profundidad){ ?>

		<!doctype html>
		<html lang="en">

		<head>
		    <title>Sistema Internacionalización</title>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		    <?php if($profundidad===2){ ?> 
		        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		        <link rel="stylesheet" href="../../public/css/style.css">
		        <link rel="stylesheet" href="../../public/css/coloresOficiales.css">
		    <?php } else if( $profundidad===1){ ?>
		    	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
			    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			    <link rel="stylesheet" href="../public/css/style.css">
			    <link rel="stylesheet" href="../public/css/coloresOficiales.css">
		    <?php } else{ ?>
		    	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
			    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			    <link rel="stylesheet" href="public/css/style.css">
			    <link rel="stylesheet" href="public/css/coloresOficiales.css">
		    <?php } ?>
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

        	<?php if($_SESSION["admin"]!==1 && $_SESSION["admin"]!==2 && $_SESSION["admin"]!==3 && $_SESSION["admin"]!==4 && $_SESSION["admin"]!==5 && $_SESSION["admin"]!==7 && $_SESSION["admin"]!==8 && $_SESSION["admin"]!==9 && $_SESSION["admin"]!==10) { ?> 
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-light  mt-5 shadow pl-5 pr-5 border-secondary rounded">
                    	<?php if($profundidad === 0 ) {?>
                        	<a href="php-partials/logout.php" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                    	<?php } else if( $profundidad === 1) {?>
                    		<a href="../php-partials/logout.php" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                    	<?php } else{?>
                    		<a href="../../php-partials/logout.php" style=" font-weight: bold; color: #00723e;">ACEPTAR Y VOLVER</a>
                    	<?php }?>
                    </button>
                </div> 
            <?php } ?>
		</body>
<?php } ?>