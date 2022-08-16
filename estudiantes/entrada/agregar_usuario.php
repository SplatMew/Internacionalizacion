<?php
require_once "../../php-partials/auth.php";

if($_SESSION['admin']===10  || $_SESSION['admin']===4){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
    exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Sistema Internacionalización</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../public/css/style.css">
	<link rel="stylesheet" href="../../public/css/coloresOficiales.css">
	<style type="text/css">
        .retorno{
            font-weight: bold;
            font-size: 25px;
            text-align: center;
            color: #00723e;
        }
    </style>
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<!-- SUBMENU COLAPSABLE -->	
		<!--?php include("lateralEstudiantesEntrada.php") ?-->

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<!-- NAV BAR  -->
		    <?php 
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Agregar Usuario","../../public/assets/UABC_crop.png")
		    ?>
			
			<div class="row justify-content-center align-items-cente bd-dark p-4"> 
                <a class="retorno" href="javascript:window.history.back();">« REGRESAR</a> 
            </div>

			<div class="container">

				<form action="../../php-partials/add.php" method="POST" autocomplete="off">

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Usuario</h6>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="paterno" id="paterno" pattern="[A-ZÑ]{0,}" />
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="materno" id="materno" pattern="[A-ZÑ]{0,}" />
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="nombre" id="nombre" pattern="[A-ZÑ]{0,}" />
						</div>
					</div>

					<div class="row mb-3">
						<label for="tipo_usuario" class="col-sm-3 col-form-label" style="text-align: right;">Privilegios</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="tipo_usuario" id="tipo_usuario">
								<?php if ($_SESSION["admin"] == 1) { ?>
									<option value="1">Administrador de Campus Mexicali</option>
								<?php } else if ($_SESSION["admin"] == 2) { ?>
									<option value="2">Administrador de Campus Tijuana</option>
								<?php } else if ($_SESSION["admin"] == 3) { ?>
									<option value="3">Administrador de Campus Ensenada</option>
								<?php } else { ?>
									<option value="1">Administrador de Campus Mexicali</option>
									<option value="2">Administrador de Campus Tijuana</option>
									<option value="3">Administrador de Campus Ensenada</option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
						<div class="col-sm-6">
							<input type="email" class="form-control border border-secondary" name="correo" id="correo"/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
						<div class="col-sm-6">
							<input type="password" class="form-control border border-secondary" name="password" id="password" />
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<button type="submit" class="btn btn-outline-primary" name="btn_agregarUsuario" id="btnExportar">Agregar</button>
					</div>
				</form>

				<div class="row justify-content-center align-items-cente bd-dark p-4"> 
                <a class="retorno" href="javascript:window.history.back();">« REGRESAR</a> 
            </div>
			</div>

		</div>
	</div>

	<script src="../../public/js/jquery.min.js"></script>
	<script src="../../public/js/popper.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/main.js"></script>

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</body>

</html>