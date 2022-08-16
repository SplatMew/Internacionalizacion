<?php 

require_once "../php-partials/authN1.php";

if($_SESSION['admin'] < 7 || $_SESSION['admin'] > 10){
	include("../Pantalla_Error.php");
	if($_SESSION['admin']>=1&&$_SESSION['admin']<=5){
		PantallaError("../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","Este es el perfil de estudiantes, para acceder al perfil de administrativos solo dele clic a su nombre que aparece en el menú lateral de la izquierda.",1);
	}else{
		PantallaError("../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",1);
	}
	exit();	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../public/css/style.css">
	<link rel="stylesheet" href="../public/css/coloresOficiales.css">
	<link rel="stylesheet" href="../public/css/solicitudesMovilidad.css">
	<script type="text/javascript" src="../javascript/funciones.js"></script>
	<title>Solicitud movilidad</title>
</head>
<body onload="<?php if($_SESSION["admin"]==7 || $_SESSION["admin"]==8 ){echo 'periodos();';}?>">

	<div class="d-flex justify-content-center mb-4 pt-4 pb-4 ps-2 pe-2 ms-2 me-2 shadow" id="EncabezadoPerfilEstudiante">
		<img src="../public/assets/UABC_crop.png" alt="" width=100px height="138px" class="d-inline-block align-text-top ms-2 me-2">
		<div class="column pr-2 pl-2 ">
			<h5 class="text-white text-center">SOLICITUD DE MOVILIDAD</h5>
			<hr class="ms-5 me-5 ps-5 pe-5" />
			<h6 class="text-white text-center">
				<?php 
					if( $_SESSION['admin'] === 7 ){ echo "Para académico visitante"; }
					else if( $_SESSION['admin'] === 8 ){ echo "Para académico de UABC"; }
					else if( $_SESSION['admin'] === 9 ){ echo "Para estudiante visitante"; }
					else { echo "Para estudiante de UABC"; }
				?>	
			</h6>
		</div>
	</div>

	<div class="d-flex flex-row justify-content-center  align-items-center m-0 mb-5 mt-5 p-2">

        <!-- Zona dentro del margen donde se dibuja el formulario y los botones -->
        <div class="col-sm-6 bg-white p-2 pt-4 pb-4 pt-0 pb-0 ms-2 me-2 rounded shadow ">
        	<?php 
        		if($_SESSION["admin"]==7){include "formST_academico_entrada.php";} 
        		else if ($_SESSION["admin"]==8){include "formST_academico_salida.php";}
        		else if ($_SESSION["admin"]==9){include "formST_estudiante_entrada.php";}
        		else if ($_SESSION["admin"]==10){include "formST_estudiante_salida.php";}

        	?>
        </div>
    </div>
</body>
</html>