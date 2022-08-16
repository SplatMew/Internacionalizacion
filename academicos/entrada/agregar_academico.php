<?php
require_once "../../php-partials/auth.php";
if($_SESSION['admin']===10 || $_SESSION['admin']==4){
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
</head>

<body>

	
	<div class="wrapper d-flex align-items-stretch">
		
		<!-- SUBMENU COLAPSABLE -->	
	    <?php include("lateralAcademicosEntrada.php") ?>

		<!-- Page Content -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
		    <?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Académicos > Visitantes > Agregar Académico","../../public/assets/UABC_crop.png")
		    ?>

			<h5 class="mb-4 text-center">Alta de Académico (Entrada)</h5>
			<form action="../../php-partials/add.php" method="POST" autocomplete="off">

				<div class="row mb-3">
					<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Clave de Identificación</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="999999" class="form-control border border-secondary" placeholder="Clave de Identificación" name="identificador" id="identificador" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Nombre" name="nombre" id="nombre" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Paterno" name="paterno" id="paterno" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Materno" name="materno" id="materno" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="sexo" id="sexo">
							<option value="">
								--Seleccionar Sexo--
							</option>
							<option value="1">
								Femenino
							</option>
							<option value="2">
								Masculino
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nivelestudios" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="nivelestudios" id="nivelestudios">
							<option value="">
								--Seleccionar Nivel--
							</option>
							<option value="1">
								Licenciatura
							</option>
							<option value="2">
								Especialidad
							</option>
							<option value="3">
								Maestría
							</option>
							<option value="4">
								Doctorado
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="discapacidad" id="discapacidad">
							<option value="">
								--¿Tiene alguna Discapacidad?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="habindigena" class="col-sm-3 col-form-label" style="text-align: right;">Hablante Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="habindigena" id="habindigena">
							<option value="">
								--¿Es Hablante Indígena?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="orindigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="orindigena" id="orindigena">
							<option value="">
								--¿Es de Origen Indígena?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
					<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
						<input type="submit" value="Agregar" class="btn btn-outline-success align-self-center" name="btn_agregarAcademico_entrada" id="btnExportar">
					</div>					
				</div>

				<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3">
					<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
					<input type="reset" class="btn btn-outline-success align-self-center" value="Limpiar" id="btnExportar">
					</div>					
				</div>
				

			</form>
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