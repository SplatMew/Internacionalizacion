<?php
require_once "../../php-partials/auth.php";

if($_SESSION['admin']===10 || $_SESSION['admin']===4){
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
		<?php include("lateralAcademicosSalida.php") ?>

		<!-- Page Content -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
			<?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Académicos > Salida > Agregar Movilidad","../../public/assets/UABC_crop.png")
		    ?>

			<h5 class="mb-4 text-center">Alta de Movilidad (Salida)</h5>
			<form action="../../php-partials/add.php" method="POST" autocomplete="off">

				<div class="row mb-3">
					<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Número de Empleado</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="999999" class="form-control border border-secondary" placeholder="Número de Empleado" name="identificador" id="identificador" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="tipomovilidad" class="col-sm-3 col-form-label" style="text-align: right;">Tipo de Movilidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="tipomovilidad" id="tipomovilidad">
							<option value="">
								--Seleccionar--
							</option>
							<option value="1">
								Docencia
							</option>
							<option value="2">
								Estancia Sabática
							</option>
							<option value="3">
								Estancia de Investigación
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="paisreceptor" class="col-sm-3 col-form-label" style="text-align: right;">País Receptor</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="País Receptor" name="paisreceptor" id="paisreceptor" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="unidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Receptora</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Unidad Receptora" name="unidadreceptora" id="unidadreceptora" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="entidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Entidad Receptora</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Entidad Receptora" name="entidadreceptora" id="entidadreceptora" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="idiomasdominados" class="col-sm-3 col-form-label" style="text-align: right;">Idiomas Dominados</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Idiomas Dominados" name="idiomasdominados" id="idiomasdominados" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="periodoescolar" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="99999" class="form-control border border-secondary" placeholder="Periodo Escolar" name="periodoescolar" id="periodoescolar" />
					</div>
				</div>

				<div class="row mb-3">
					<label for="campusemisor" class="col-sm-3 col-form-label" style="text-align: right;">Campus Emisor</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="campusemisor" id="campusemisor">
							<option value="">
								--Seleccionar Campus--
							</option>
							<option value="1">
								Campus Mexicali
							</option>
							<option value="2">
								Campus Tijuana
							</option>
							<option value="3">
								Campus Ensenada
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="unidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Emisora</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="unidademisora" id="unidademisora">
							<option value="">
								--Seleccionar Unidad--
							</option>
							<option value="1">
								Facultad de Ciencias
							</option>
							<option value="2">
								Facultad de Ingeniería
							</option>
							<option value="3">
								Facultad de Artes
							</option>
						</select>
					</div>
				</div>

				<?php if($_SESSION['admin']===1|| $_SESSION['admin']===2 || $_SESSION['admin']===3|| $_SESSION['admin']===5){?>

					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<input type="submit" value="Agregar" class="btn btn-outline-primary" name="btn_agregarMovilidad_salida" id="btnExportar">
						</div>					
					</div>

					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-0">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<input type="reset" class="btn btn-danger" value="Limpiar">
						</div>					
					</div>

				<?php } ?>

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