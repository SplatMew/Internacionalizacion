<?php
require_once "../../php-partials/auth.php";

if($_SESSION['admin'] >= 6 && $_SESSION['admin'] <= 9 || $_SESSION['admin']===4){
	include("../../Pantalla_Error.php");
	PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
	exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=10){
	include("../../Pantalla_Error.php");
	PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
	exit();
}

include "../../php-partials/connect.php";

$sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID = ${_GET["id"]}";
//$query = mysqli_query($con, $sql);
//$res = mysqli_fetch_array($query);

if ($query = mysqli_query($con, $sql)) {
	$res = mysqli_fetch_array($query);
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
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
		<style>
			#btn_aplicarCambios2, #btn_aplicarCambios1, #btn_activar_edicion{
				background: #00723e;
				font-weight: 500;
				color: white;
				border-color: #00723e;
				box-shadow: 0px 6px 6px #b6b6b6;
				border-radius: 4px;
				padding: 5px 8px 5px 8px;
			}
		</style>
	</head>

	<body>

		<!-- SUBMENU COLAPSABLE -->
		<div class="wrapper d-flex align-items-stretch">
			<?php include("lateralEstudiantesEntrada.php") ?>
			<!-- Page Content  -->
			<div id="content" class="p-2 p-md-5 pt-5">

				<!--NAV BAR-->
				<?php
				require("../../Estaticos.php");
				navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Actualizar Estudiante","../../public/assets/UABC_crop.png");
				?>

				<!--Campos-->
				<div id="Page1">
					<div class="container">

						<form id="formulario" action="../../php-partials/update.php" method="post" autocomplete="off">

							<div class="d-flex row align-items-centeer align-self-stretch ">
								<div class="col-sm-4">
									<div class="d-flex justify-content-center p-1">
										<button type="button" class="btn btn-outline-primary" id="btn_activar_edicion" <?php if ($_SESSION["admin"] == 4) echo "disabled"; ?>>Editar</button>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="d-flex justify-content-center p-1">
										<button type="submit" class="btn btn-outline-primary" style="display: none;" name="btn_aplicarCambios_estudiante_entrada" id="btn_aplicarCambios1" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="d-flex justify-content-center p-1">
										<button type="button" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if ($_SESSION["admin"] == 4) echo "disabled"; ?>>Eliminar</button>
									</div>
								</div>
							</div>

							<hr />

							<div class="row mb-3 justify-content-md-center">
								<h6>Datos del Estudiante</h6>
							</div>

							<div class="row mb-3">
								<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID</label>
								<div class="col-sm-6">
									<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula" value="<?php echo $res["ESTUDIANTE_ID"]; ?>" readonly />
								</div>
							</div>

							<div class="row mb-3">
								<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="paterno" id="paterno" value="<?php echo $res["ESTUDIANTE_APELLIDO1"]; ?>" pattern="[A-ZÑ]{0,}" disabled />
								</div>
							</div>

							<div class="row mb-3">
								<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="materno" id="materno" value="<?php echo $res["ESTUDIANTE_APELLIDO2"]; ?>" pattern="[A-ZÑ]{0,}" disabled />
								</div>
							</div>

							<div class="row mb-3">
								<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="nombre" id="nombre" value="<?php echo $res["ESTUDIANTE"]; ?>" pattern="[A-ZÑ]{0,}" disabled />
								</div>
							</div>

							<div class="row mb-3">
								<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary" name="sexo" id="sexo" disabled>
										<option value="" <?php if ($res["SEXO"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["SEXO"] == "1") echo "selected"; ?>>Femenino</option>
										<option value="2" <?php if ($res["SEXO"] == "2") echo "selected"; ?>>Masculino</option>
										<option value="3" <?php if ($res["SEXO"] == "3") echo "selected"; ?>>Otro</option>
									</select>
								</div>
							</div>


							<div class="row mb-3">
								<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary" name="discapacidad" id="discapacidad" disabled>
										<option value="" <?php if ($res["DISCAPACIDAD"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["DISCAPACIDAD"] == "1") echo "selected"; ?>>Sí</option>
										<option value="2" <?php if ($res["DISCAPACIDAD"] == "2") echo "selected"; ?>>No</option>
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="lengua_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Lengua Indígena</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary" name="lengua_indigena" id="lengua_indigena" disabled>
										<option value="" <?php if ($res["HABLANTE_INDIGENA"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["HABLANTE_INDIGENA"] == "1") echo "selected"; ?>>Sí</option>
										<option value="2" <?php if ($res["HABLANTE_INDIGENA"] == "2") echo "selected"; ?>>No</option>
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary" name="origen_indigena" id="origen_indigena" disabled>
										<option value="" <?php if ($res["ORIGEN_INDIGENA"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["ORIGEN_INDIGENA"] == "1") echo "selected"; ?>>Sí</option>
										<option value="2" <?php if ($res["ORIGEN_INDIGENA"] == "2") echo "selected"; ?>>No</option>
									</select>
								</div>
							</div>

							<hr />


							<div class="row mb-3">
								<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary" name="nivel" id="nivel" disabled>
										<option value="" <?php if ($res["NIVEL_ID"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["NIVEL_ID"] == "1") echo "selected"; ?>>Licenciatura</option>
										<option value="2" <?php if ($res["NIVEL_ID"] == "2") echo "selected"; ?>>Especialidad</option>
										<option value="3" <?php if ($res["NIVEL_ID"] == "3") echo "selected"; ?>>Maestría</option>
										<option value="4" <?php if ($res["NIVEL_ID"] == "4") echo "selected"; ?>>Doctorado</option>
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
									<select class="form-control border border-secondary" name="campus_clave" id="campus_clave" disabled>
										<?php if ($_SESSION["admin"] == 1) { ?>
											<option value="1" <?php if ($res["CAMPUS_ID"] == "1") echo "selected"; ?>>MEXICALI</option>
										<?php } else if ($_SESSION["admin"] == 2) { ?>
											<option value="2" <?php if ($res["CAMPUS_ID"] == "2") echo "selected"; ?>>TIJUANA</option>
										<?php } else if ($_SESSION["admin"] == 3) { ?>
											<option value="3" <?php if ($res["CAMPUS_ID"] == "3") echo "selected"; ?>>ENSENADA</option>
										<?php } else { ?>
											<option value="" <?php if ($res["CAMPUS_ID"] == "") echo "selected"; ?>>----------</option>
											<option value="1" <?php if ($res["CAMPUS_ID"] == "1") echo "selected"; ?>>MEXICALI</option>
											<option value="2" <?php if ($res["CAMPUS_ID"] == "2") echo "selected"; ?>>TIJUANA</option>
											<option value="3" <?php if ($res["CAMPUS_ID"] == "3") echo "selected"; ?>>ENSENADA</option>
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
									<select class="form-control border border-secondary" name="unidad_clave" id="unidad_clave" disabled>
										<?php if ($res["CAMPUS_ID"] == "") { ?>
											<option value='' <?php if ($res["UNIDAD_ID"] == "") echo "selected"; ?>>----------</option>

										<?php } elseif ($res["CAMPUS_ID"] == "1") { ?>
											<option value='' <?php if ($res["UNIDAD_ID"] == "") echo "selected"; ?>>----------</option>
											<option value='1' <?php if ($res["UNIDAD_ID"] == "1") echo "selected"; ?>>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
											<option value='10' <?php if ($res["UNIDAD_ID"] == "10") echo "selected"; ?>>INSTITUTO DE CIENCIAS AGRÍCOLAS</option>
											<option value='40' <?php if ($res["UNIDAD_ID"] == "40") echo "selected"; ?>>FACULTAD DE CIENCIAS HUMANAS</option>
											<option value='80' <?php if ($res["UNIDAD_ID"] == "80") echo "selected"; ?>>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
											<option value='90' <?php if ($res["UNIDAD_ID"] == "90") echo "selected"; ?>>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
											<option value="110" <?php if ($res["UNIDAD_ID"] == "110") echo "selected"; ?>>FACULTAD DE DERECHO</option>
											<option value='111' <?php if ($res["UNIDAD_ID"] == "111") echo "selected"; ?>>INSTITUTO DE INGENIERÍA</option>
											<option value="123" <?php if ($res["UNIDAD_ID"] == "123") echo "selected"; ?>>FACULTAD DE DEPORTES</option>
											<option value='124' <?php if ($res["UNIDAD_ID"] == "124") echo "selected"; ?>>FACULTAD DE ARTES</option>
											<option value="140" <?php if ($res["UNIDAD_ID"] == "140") echo "selected"; ?>>FACULTAD DE INGENIERÍA</option>
											<option value="160" <?php if ($res["UNIDAD_ID"] == "160") echo "selected"; ?>>FACULTAD DE MEDICINA</option>
											<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
											<option value='200' <?php if ($res["UNIDAD_ID"] == "200") echo "selected"; ?>>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
											<option value='220' <?php if ($res["UNIDAD_ID"] == "220") echo "selected"; ?>>FACULTAD DE ODONTOLOGÍA
												<!--MEXICALI-->
											</option>
											<option value='260' <?php if ($res["UNIDAD_ID"] == "260") echo "selected"; ?>>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
											<option value='300' <?php if ($res["UNIDAD_ID"] == "300") echo "selected"; ?>>FACULTAD DE ENFERMERÍA</option>
											<option value='310' <?php if ($res["UNIDAD_ID"] == "310") echo "selected"; ?>>FACULTAD DE IDIOMAS</option>
											<option value='335' <?php if ($res["UNIDAD_ID"] == "335") echo "selected"; ?>>UNIDAD CIENCIAS DE LA SALUD
												<!--MEXICALI-->
											</option>
											<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
											<option value='605' <?php if ($res["UNIDAD_ID"] == "605") echo "selected"; ?>>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
											<option value='625' <?php if ($res["UNIDAD_ID"] == "625") echo "selected"; ?>>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
											<option value='2' <?php if ($res["UNIDAD_ID"] == "2") echo "selected"; ?>>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
											<option value='125' <?php if ($res["UNIDAD_ID"] == "125") echo "selected"; ?>>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)
												<!--TRONCOS COMUNES (CIUDAD MORELOS)-->
											</option>
											<option value='126' <?php if ($res["UNIDAD_ID"] == "126") echo "selected"; ?>>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)
												<!--TRONCOS COMUNES (SAN FELIPE)-->
											</option>

										<?php } elseif ($res["CAMPUS_ID"] == "2") { ?>
											<option value=''>----------</option>
											<option value='70' <?php if ($res["UNIDAD_ID"] == "70") echo "selected"; ?>>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
											<option value='100' <?php if ($res["UNIDAD_ID"] == "100") echo "selected"; ?>>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
											<option value='120' <?php if ($res["UNIDAD_ID"] == "120") echo "selected"; ?>>FACULTAD DE DERECHO</option>
											<option value='130' <?php if ($res["UNIDAD_ID"] == "130") echo "selected"; ?>>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
											<option value='150' <?php if ($res["UNIDAD_ID"] == "150") echo "selected"; ?>>FACULTAD DE DEPORTES
												<!-- EXTENSION CAMPUS TIJUANA -->
											</option>
											<option value='180' <?php if ($res["UNIDAD_ID"] == "180") echo "selected"; ?>>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
											<option value='500' <?php if ($res["UNIDAD_ID"] == "500") echo "selected"; ?>>UNIDAD UNIVERSITARIA EN ROSARITO
												<!-- TRONCOS COMUNES (ROSARITO) -->
											</option>
											<option value='190' <?php if ($res["UNIDAD_ID"] == "190") echo "selected"; ?>>FACULTAD DE ARTES</option>
											<option value="240" <?php if ($res["UNIDAD_ID"] == "240") echo "selected"; ?>>FACULTAD DE ODONTOLOGÍA</option>
											<option value='280' <?php if ($res["UNIDAD_ID"] == "280") echo "selected"; ?>>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
											<option value="311" <?php if ($res["UNIDAD_ID"] == "311") echo "selected"; ?>>FACULTAD DE IDIOMAS</option>
											<option value="313" <?php if ($res["UNIDAD_ID"] == "313") echo "selected"; ?>>FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
											<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
											<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
											<option value='626' <?php if ($res["UNIDAD_ID"] == "626") echo "selected"; ?>>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
											<option value='790' <?php if ($res["UNIDAD_ID"] == "790") echo "selected"; ?>>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
											<option value='400' <?php if ($res["UNIDAD_ID"] == "400") echo "selected"; ?>>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
											<option value='332' <?php if ($res["UNIDAD_ID"] == "332") echo "selected"; ?>>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA
												<!--VALLE DE LAS PALMAS-->
											</option>
											<option value='334' <?php if ($res["UNIDAD_ID"] == "334") echo "selected"; ?>>FACULTAD DE CIENCIAS DE LA SALUD
												<!--VALLE DE LAS PALMAS-->
											</option>


										<?php } elseif ($res["CAMPUS_ID"] == "3") { ?>
											<option value='' <?php if ($res["UNIDAD_ID"] == "") echo "selected"; ?>>----------</option>
											<option value='20' <?php if ($res["UNIDAD_ID"] == "20") echo "selected"; ?>>FACULTAD DE ARTES</option>
											<option value='30' <?php if ($res["UNIDAD_ID"] == "30") echo "selected"; ?>>FACULTAD DE CIENCIAS</option>
											<option value="50" <?php if ($res["UNIDAD_ID"] == "50") echo "selected"; ?>>FACULTAD DE CIENCIAS MARINAS</option>
											<option value='170' <?php if ($res["UNIDAD_ID"] == "170") echo "selected"; ?>>FACULTAD DE DEPORTES</option>
											<option value='290' <?php if ($res["UNIDAD_ID"] == "290") echo "selected"; ?>>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
											<option value='312' <?php if ($res["UNIDAD_ID"] == "312") echo "selected"; ?>>FACULTAD DE IDIOMAS</option>
											<option value='320' <?php if ($res["UNIDAD_ID"] == "320") echo "selected"; ?>>ESCUELA DE CIENCIAS DE LA SALUD</option>
											<option value="330" <?php if ($res["UNIDAD_ID"] == "330") echo "selected"; ?>>FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
											<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
											<option value="615" <?php if ($res["UNIDAD_ID"] == "615") echo "selected"; ?>>INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
											<option value="620" <?php if ($res["UNIDAD_ID"] == "620") echo "selected"; ?>>INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
											<option value='795' <?php if ($res["UNIDAD_ID"] == "795") echo "selected"; ?>>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
											<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
											<option value='700' <?php if ($res["UNIDAD_ID"] == "700") echo "selected"; ?>>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>

										<?php } ?>
									</select>
								</div>

							</div>

							<hr />


							<div class="row mb-3 justify-content-md-center">
								<h6>Programa Educativo de llegada</h6>
							</div>

						<!--
						<div class="row mb-3">
							<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
							<div class="col-sm-6">
								<select class="form-control border border-secondary" name="programa_clave" id="programa_clave" disabled>
									<option value="" <?php //if ($res["PROGRAMA_ID"] == "") echo "selected"; 
														?>>----------</option>
								</select>
							</div>
						</div>-->

						<div class="row mb-3">
							<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
							<div class="col-sm-6">
								<input type="number" min="0" max="999" class="form-control border border-secondary" name="programa_clave" id="programa_clave" value="<?php echo $res["PROGRAMA_ID"]; ?>" disabled>
							</div>
						</div>

						<div class="row mb-3">
							<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
							<div class="col-sm-6">
								<input type="text" class="form-control border border-secondary" name="programa_nombre" id="programa_nombre" value="<?php echo $res["PROGRAMA_DESC"]; ?>" disabled>
							</div>
						</div>

						<div class="row mb-3 justify-content-md-center">
							Área de conocimiento
						</div>

						<div class="row mb-3">
							<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
							<div class="col-sm-6">
								<input type="number" min="0" max="9" class="form-control border border-secondary" name="area_clave" id="area_clave" value="<?php echo $res["AREA_ID"]; ?>" disabled>
							</div>
						</div>

						<div class="row mb-3">
							<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
							<div class="col-sm-6">
								<input type="text" class="form-control border border-secondary" name="area_nombre" id="area_nombre" value="<?php echo $res["AREA"]; ?>" disabled>
							</div>
						</div>

						<hr />

						<div class="row mb-3 justify-content-md-center">
							<button type="submit" class="btn btn-outline-primary" style="display: none;" name="btn_aplicarCambios_estudiante_entrada" id="btn_aplicarCambios2" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
						</div>
					</form>
					<a href="#" onclick="return show('Page2','Page1');">Show page 2</a>

				</div>

			</div>



			<div id="Page2" style="display: none;">
				<div class="container">
					<div class="row">
						<div class="col align-self-start">
							One of three columns
						</div>
						<div class="col align-self-center">
							One of three columns
						</div>
						<div class="col align-self-end">
							<a href="#" onclick="return show('Page1','Page2');">Show page 1</a>
						</div>
					</div>
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

const btn_activar_edicion = document.getElementById("btn_activar_edicion");

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

btn_activar_edicion.addEventListener("click", () => {

	if (document.getElementById("paterno").disabled === true) {

		//document.getElementById("matricula").disabled = false;
		document.getElementById("paterno").disabled = false;
		document.getElementById("materno").disabled = false;
		document.getElementById("nombre").disabled = false;
		document.getElementById("sexo").disabled = false;
		document.getElementById("sexo_noBinario").disabled = false;
		document.getElementById("discapacidad").disabled = false;
		document.getElementById("lengua_indigena").disabled = false;
		document.getElementById("origen_indigena").disabled = false;

		document.getElementById("nivel").disabled = false;

		document.getElementById("campus_clave").disabled = false;
		//document.getElementById("campus_nombre").disabled = false;

		document.getElementById("unidad_clave").disabled = false;
		//document.getElementById("unidad_nombre").disabled = false;

		document.getElementById("programa_clave").disabled = false;
		document.getElementById("programa_nombre").disabled = false;
		document.getElementById("area_clave").disabled = false;
		document.getElementById("area_nombre").disabled = false;

		document.getElementById("btn_aplicarCambios1").style.display = 'block';
		document.getElementById("btn_aplicarCambios2").style.display = 'block';

		document.getElementById("btn_agregarIntercambio").style.display = 'none';

		btn_activar_edicion.classList = "btn btn-outline-dark";
		btn_activar_edicion.innerHTML = "Descartar Cambios";

	} else {
		if (confirm('¿Estás seguro que quieres descartar los cambios que se han hecho?')) {
			location.reload();
		}
	}
});

function show(shown, hidden) {
	document.getElementById(shown).style.display = 'block';
	document.getElementById(hidden).style.display = 'none';
	return false;
}

function confirmarAplicarCambios() {
	if (confirm('¿Estás seguro que quieres aplicar los cambios que se han hecho?')) {
				//document.getElementById("formulario").submit();
	} else {
		return false;
	}
}

function confirmarBorrar() {
	var id = document.getElementById("matricula").value;
	if (confirm('¿Estás seguro que quieres eliminar el registro del estudiante de matrícula ' + id + '?')) {
		window.location.href = "../../php-partials/delete.php?tabla=estudiante_entrada&id=" + id;
	} else {
		return false;
	}
}
	</script>



</body>

</html>