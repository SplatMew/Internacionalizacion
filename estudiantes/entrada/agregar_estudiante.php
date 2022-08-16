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
	<link rel="stylesheet" href="../../public/css/style.css">
	<link rel="stylesheet" href="../../public/css/coloresOficiales.css">
</head>

<body>

	<div class="wrapper d-flex align-items-stretch" id="fondo_principal">

		<!-- SUBMENU COLAPSABLE -->
		<?php include("lateralEstudiantesEntrada.php") ?>

		<!-- CONTENIDO PRINCIPAL DE LA PAGINA  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<!--NAV BAR-->
			<?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Agregar Estudiante","../../public/assets/UABC_crop.png");
		    ?>
			 
			<!--ZONA DEL FORMULARIO -->
			<div class="container">


				<form action="../../php-partials/add.php" method="POST" autocomplete="off">

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Estudiante</h6>
					</div>

					<div class="row mb-3">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
						<div class="col-sm-6">
							<input type="email" class="form-control border border-secondary" name="correo" id="correo" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
						<div class="col-sm-6">
							<input type="password" class="form-control border border-secondary" name="password" id="password" minlength="6" />
						</div>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="paterno" id="paterno" pattern="[a-zñA-ZÑ]{0,}" required/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="materno" id="materno" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="nombre" id="nombre" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="sexo" id="sexo" required>
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
							<select class="form-control border border-secondary" name="lengua_indigena" id="lengua_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="origen_indigena" id="origen_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<hr />

					<div class="row mb-3">
						<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="nivel" id="nivel" required>
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
						<h6>Campus</h6>
					</div>

					<div class="row mb-3">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="campus_clave" id="campus_clave" required>
								<?php if ($_SESSION["admin"] == 1) { ?>
									<option value="1">MEXICALI</option>
								<?php } else if ($_SESSION["admin"] == 2) { ?>
									<option value="2">TIJUANA</option>
								<?php } else if ($_SESSION["admin"] == 3) { ?>
									<option value="3">ENSENADA</option>
								<?php } else { ?>
									<option value="">----------</option>
									<option value="1">MEXICALI</option>
									<option value="2">TIJUANA</option>
									<option value="3">ENSENADA</option>
								<?php } ?>
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
							<select class="form-control border border-secondary" name="unidad_clave" id="unidad_clave" required>
								<?php if ($_SESSION["admin"] == 1) { ?>
									<option value=''>----------</option>
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
									<option value='220'>FACULTAD DE ODONTOLOGÍA
										<!--MEXICALI-->
									</option>
									<option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
									<option value='300'>FACULTAD DE ENFERMERÍA</option>
									<option value='310'>FACULTAD DE IDIOMAS</option>
									<option value='335'>UNIDAD CIENCIAS DE LA SALUD
										<!--MEXICALI-->
									</option>
									<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
									<option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
									<option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
									<option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
									<option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)
										<!--TRONCOS COMUNES (CIUDAD MORELOS)-->
									</option>
									<option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)
										<!--TRONCOS COMUNES (SAN FELIPE)-->
									</option>
								<?php } else if ($_SESSION["admin"] == 2) { ?>
									<option value=''>----------</option>
									<option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
									<option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
									<option value='120'>FACULTAD DE DERECHO</option>
									<option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
									<option value='150'>FACULTAD DE DEPORTES
										<!-- EXTENSION CAMPUS TIJUANA -->
									</option>
									<option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
									<option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO
										<!-- TRONCOS COMUNES (ROSARITO) -->
									</option>
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
									<option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA
										<!--VALLE DE LAS PALMAS-->
									</option>
									<option value='334'>FACULTAD DE CIENCIAS DE LA SALUD
										<!--VALLE DE LAS PALMAS-->
									</option>
								<?php } else if ($_SESSION["admin"] == 3) { ?>
									<option value=''>----------</option>
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
									<option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>
								<?php } else { ?>
									<option value="">----------</option>
								<?php } ?>

							</select>
						</div>

					</div>

					<hr />


					<div class="row mb-3 justify-content-md-center">
						<h6>Programa Educativo de llegada</h6>
					</div>

					<!--con select
					<div class="row mb-3">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="programa_clave" id="programa_clave">
								<option value="">----------</option>
							</select>
						</div>
					</div>-->

					<div class="row mb-3">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary" name="programa_clave" id="programa_clave" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="programa_nombre" id="programa_nombre" required>
						</div>
					</div>

					<div class="row mb-3 justify-content-md-center">
						<h6>Área de conocimiento</h6>
					</div>

					<div class="row mb-3">
						<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary" name="area_clave" id="area_clave" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="area_nombre" id="area_nombre" required>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<button type="submit" class="btn btn-outline-primary" name="btn_agregarEstudiante_entrada" id="btnExportar">Agregar</button>
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
		const select_sex = document.getElementById("sexo");

		select_sex.addEventListener('change', (event) => {
			const div_nonbinary = document.getElementById("div_sexo_noBinario");
			if (event.target.value == 3) {
				div_nonbinary.style.display = 'block';

			} else {
				div_nonbinary.style.display = 'none';
				document.getElementById("sexo_noBinario").value = "";
			}

		});

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