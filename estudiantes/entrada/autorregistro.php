<?php
require_once "../../php-partials/auth.php";

include "../../php-partials/connect.php";
/*
$sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID = ${_SESSION["id"]}";
$sql = "SELECT * FROM intercambio_estudiantil_entrada WHERE ID = ${_SESSION["id"]}";
$sql = "SELECT * FROM intercambio_estudiantil_entrada_temporal WHERE ID = ${_SESSION["id"]}";

//$query = mysqli_query($con, $sql);
//$res = mysqli_fetch_array($query);

if ($query = mysqli_query($con, $sql)) {
	$res = mysqli_fetch_array($query);
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
*/
mysqli_close($con);

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

	<!-- SUBMENU COLAPSABLE -->
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-warning">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Mostrar Menu</span>
				</button>
			</div>

			<div class="p-4 pt-5 mt-5">
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="../../php-partials/logout.php"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Salir</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<!-- NAV BAR  -->
		    <?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Autorregistro","../../public/assets/UABC_crop.png")
		    ?>

			<div class="container">


				<!--Campos-->

				<form action="../../php-partials/self_registration.php" method="POST" autocomplete="off">

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Estudiante</h6>
					</div>

					<div class="row mb-3">
						<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">ID</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999999" class="form-control border border-secondary" name="identificador" id="identificador" value='<?php echo $_SESSION["id"]; ?>' readonly />
						</div>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="paterno" id="paterno">
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="materno" id="materno">
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="nombre" id="nombre">
						</div>
					</div>

					<div class="row mb-3">
						<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="sexo" id="sexo">
								<option value="" selected>----------</option>
								<option value="1">Femenino</option>
								<option value="2">Masculino</option>
								<option value="3">No Binario</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="discapacidad" id="discapacidad">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="lengua_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Lengua Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="lengua_indigena" id="lengua_indigena">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="origen_indigena" id="origen_indigena">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Campus</h6>
					</div>

					<div class="row mb-3">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="campus_clave" id="campus_clave">
								<option value="">----------</option>
								<option value="1">MEXICALI</option>
								<option value="2">TIJUANA</option>
								<option value="3">ENSENADA</option>
							</select>
						</div>
					</div>

					<hr />


					<div class="row mb-3 justify-content-md-center">
						<h6>Unidad Académica</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="unidad_clave" id="unidad_clave">
								<option value="">----------</option>
							</select>
						</div>

					</div>


					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Programa Educativo de llegada</h6>
					</div>

					<div class="row mb-3">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary" name="programa_clave" id="programa_clave">
						</div>
					</div>

					<div class="row mb-3">
						<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="programa_nombre" id="programa_nombre">
						</div>
					</div>

					<div class="row mb-3 justify-content-md-center">
						área de conocimiento
					</div>

					<div class="row mb-3">
						<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary" name="area_clave" id="area_clave">
						</div>
					</div>

					<div class="row mb-3">
						<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="area_nombre" id="area_nombre">
						</div>
					</div>

					<hr />

					<div class="row mb-3">
						<label for="periodo" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="periodo" id="periodo">
						</div>
					</div>

					<div class="row mb-3">
						<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="nivel" id="nivel">
								<option value="" selected>----------</option>
								<option value="1">Licenciatura</option>
								<option value="2">Especialidad</option>
								<option value="3">Maestría</option>
								<option value="4">Doctorado</option>
							</select>
						</div>
					</div>


					<hr />


					<div class="row mb-3 justify-content-md-center">
						<h6>Datos de la Unidad Emisora</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_nombre" id="unidad_emisora_nombre">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_pais" id="unidad_emisora_pais">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_entidad" id="unidad_emisora_entidad">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_idioma" id="unidad_emisora_idioma">
						</div>
					</div>


					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Financiamiento</h6>
					</div>

					<div class="row mb-3">
						<label for="finan_recibio" class="col-sm-3 col-form-label" style="text-align: right;">¿Recibió?</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="finan_recibio" id="finan_recibio">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="finan_monto" class="col-sm-3 col-form-label" style="text-align: right;">Monto</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="finan_monto" id="finan_monto">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Fecha del Intercambio </h6>
					</div>

					<div class="row mb-3">
						<label for="fecha_inicial" class="col-sm-3 col-form-label" style="text-align: right;">Inicial</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_inicial" id="fecha_inicial">
						</div>
					</div>

					<div class="row mb-3">
						<label for="fecha_terminal" class="col-sm-3 col-form-label" style="text-align: right;">Terminal</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_terminal" id="fecha_terminal">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<button type="submit" class="btn btn-outline-primary" name="btn_agregar_entrada" id="btnExportar">Agregar</button>
					</div>
				</form>

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

	<script>
		$(document).ready(function() {
			$("#campus_clave").change(function() {
				var val = $(this).val();
				if (val == "") {
					$("#unidad_clave").html("<option value=''>----------</option>");

					//Mexicali
				} else if (val == "1") {
					$("#unidad_clave").html(`<option value=''>----------</option>
								<option value='1'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
								<option value='10'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option>
								<option value='40'>FACULTAD DE CIENCIAS HUMANAS</option>
								<option value='80'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
								<option value='90'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
								<option value="110">FACULTAD DE DERECHO</option>
								<option value='111'>INSTITUTO DE INGENIERÍA</option>
								<option value="123">FACULTAD DE DEPORTES</option>
								<option value='124'>FACULTAD DE ARTES</option>
								<option value="140">FACULTAD DE INGENIERÍA</option>
								<option value="160">FACULTAD DE MEDICINA</option>
								<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
								<option value='200'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
								<option value='220'>FACULTAD DE ODONTOLOGÍA<!--MEXICALI--></option>
								<option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
								<option value='300'>FACULTAD DE ENFERMERÍA</option>
								<option value='310'>FACULTAD DE IDIOMAS</option>
								<option value='335'>UNIDAD CIENCIAS DE LA SALUD<!--MEXICALI--></option>
								<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
								<option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
								<option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
								<option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
								<option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)<!--TRONCOS COMUNES (CIUDAD MORELOS)--></option>
								<option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)<!--TRONCOS COMUNES (SAN FELIPE)--></option>`);
					//Tijuana
				} else if (val == "2") {
					$("#unidad_clave").html(`<option value=''>----------</option>
								<option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
								<option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
								<option value='120'>FACULTAD DE DERECHO</option>
								<option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
								<option value='150'>FACULTAD DE DEPORTES<!-- EXTENSION CAMPUS TIJUANA --></option>
								<option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
								<option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO<!-- TRONCOS COMUNES (ROSARITO) --></option>
								<option value='190'>FACULTAD DE ARTES</option>
								<option value="240">FACULTAD DE ODONTOLOGÍA</option>
								<option value='280'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
								<option value="311">FACULTAD DE IDIOMAS</option>
								<option value="313">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
								<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
								<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
								<option value='626'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
								<option value='790'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
								<option value='400'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
								<option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA<!--VALLE DE LAS PALMAS--></option>
								<option value='334'>FACULTAD DE CIENCIAS DE LA SALUD<!--VALLE DE LAS PALMAS--></option>`);

					//Ensenada
				} else if (val == "3") {
					$("#unidad_clave").html(`<option value=''>----------</option>
								<option value='20'>FACULTAD DE ARTES</option>
								<option value='30'>FACULTAD DE CIENCIAS</option>
								<option value="50">FACULTAD DE CIENCIAS MARINAS</option>
								<option value='170'>FACULTAD DE DEPORTES</option>
								<option value='290'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
								<option value='312'>FACULTAD DE IDIOMAS</option>
								<option value='320'>ESCUELA DE CIENCIAS DE LA SALUD</option>
								<option value="330">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
								<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
								<option value="615">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
								<option value="620">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
								<option value='795'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
								<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
								<option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>`);
				}
			});

			/*
			$("#unidad_clave").change(function() {
				var val = $(this).val();
				if (val == "") {
					$("#programa_clave").html("<option value=''>----------</option>");

				//FACULTAD DE CIENCIAS
				} else if (val == "30") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="3001">BIÓLOGO</option>
								<option value="3002">FÍSICO</option>
								<option value="3003">LICENCIADO EN MATEMÁTICAS APLICADAS</option>
								<option value="3004">LICENCIADO EN CIENCIAS COMPUTACIONALES</option>
								<option value="3005">PROGRAMADOR DE SISTEMAS COMPUTACIONALES</option>
								<option value="3053">TRONCO COMUN CIENCIAS NATURALES Y EXACTAS</option>
								<option value="3067">TRONCO COMUN DE CIENCIAS EXACTAS</option>
								<option value="3068">TRONCO COMUN DE CIENCIAS NATURALES</option>`);

				//FACULTAD DE CIENCIAS MARINAS
				} else if (val == "50") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="5001">OCEANOLOGO</option>
								<option value="5005">LICENCIADO EN CIENCIAS AMBIENTALES</option>
								<option value="5006">LICENCIADO EN BIOTECNOLOGIA EN ACUACULTURA</option>
								<option value="5054">TRONCO COMUN DE CIENCIAS NATURALES</option>`);

				//FACULTAD DE INGENIERIA, ARQUITECTURA Y DISEÑO
				} else if (val == "290") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="29002">INGENIERO CIVIL</option>
								<option value="29003">INGENIERO EN ELECTRONICA</option>
								<option value="29004">INGENIERO EN COMPUTACION</option>
								<option value="29007">INGENIERO EN NANOTECNOLOGIA</option>`);
				}
			});
			*/



		});
	</script>

</body>

</html>