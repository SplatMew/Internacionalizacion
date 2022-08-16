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

include "../../php-partials/connect.php";

$sql = "SELECT * FROM intercambio_estudiantil_salida_temporal WHERE ESTUDIANTE_ID = ${_GET["id"]}";
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

	<div class="wrapper d-flex align-items-stretch">
		<!-- SUBMENU COLAPSABLE -->
		<?php require "lateralEstudiantesSalida.php"; ?>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<!-- NAV BAR  -->
			<?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Salida > Actualizar Autorregistrado","../../public/assets/UABC_crop.png")
		    ?>

			<div class="container">

				<form id="formulario" action="../../php-partials/self_registration.php" method="post" autocomplete="off">

					<div class="d-flex row align-items-centeer align-self-stretch ">
						<div class="col-sm-4">
		              		<div class="d-flex justify-content-center p-1">
		                  		<button type="button" class="btn btn-outline-primary" id="btn_activar_edicion" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Editar</button>
		              		</div>
		          		</div>

		          		<div class="col-sm-4">
		              		<div class="d-flex justify-content-center p-1">
		                		<button type="submit" class="btn btn-outline-primary" name="btn_aplicar_salida" id="btn_aplicarCambios1" onclick="return confirmarAplicarCambios()" disabled>Aceptar Autorregistro</button>
		              		</div>
		          		</div>

		          		<div class="col-sm-4">
		              		<div class="d-flex justify-content-center p-1">
		                		<button type="button" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Eliminar</button>
		              		</div>
		          		</div>
		          	</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Estudiante</h6>
					</div>

					<div class="row mb-3">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Matricula</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula" value="<?php echo $res["ESTUDIANTE_ID"]; ?>" readonly>
						</div>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="paterno" id="paterno" value="<?php echo $res["ESTUDIANTE_APELLIDO1"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="materno" id="materno" value="<?php echo $res["ESTUDIANTE_APELLIDO2"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="nombre" id="nombre" value="<?php echo $res["ESTUDIANTE"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="sexo" id="sexo" disabled>
								<option value="" <?php if ($res["SEXO_ID"] == "") echo "selected"; ?>>----------</option>
								<option value="1" <?php if ($res["SEXO_ID"] == "1") echo "selected"; ?>>Femenino</option>
								<option value="2" <?php if ($res["SEXO_ID"] == "2") echo "selected"; ?>>Masculino</option>
								<option value="3" <?php if ($res["SEXO_ID"] == "3") echo "selected"; ?>>No Binario</option>
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

					<div class="row mb-3 justify-content-md-center">
						<h6>Campus</h6>
					</div>

					<div class="row mb-3">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary" name="campus_clave" id="campus_clave" value="<?php echo $res["CAMPUS_ID"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="campus_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="campus_nombre" id="campus_nombre" value="<?php echo $res["CAMPUS_DESC"]; ?>" disabled>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Unidad Académica</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary" name="unidad_clave" id="unidad_clave" value="<?php echo $res["UNIDAD_ID"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_nombre" id="unidad_nombre" value="<?php echo $res["UNIDAD"]; ?>" disabled>
						</div>
					</div>

					<hr />

					<div class="row mb-3">
						<label for="periodo" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="periodo" id="periodo" value="<?php echo $res["PERIODO_ID"]; ?>" disabled>
						</div>
					</div>

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
						<h6>Datos de la Unidad Receptora</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_nombre" id="unidad_reseptora_nombre" value="<?php echo $res["UNID"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_pais" id="unidad_reseptora_pais" value="<?php echo $res["UNID_PAIS"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_entidad" id="unidad_reseptora_entidad" value="<?php echo $res["UNID_ENTIDAD"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_idioma" id="unidad_reseptora_idioma" value="<?php echo $res["UNID_IDIOMA"]; ?>" disabled>
						</div>
					</div>

					<hr />


					<div class="row mb-3 justify-content-md-center">
						<h6>Programa Educativo</h6>
					</div>

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
						área de conocimiento
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
						<h6>Financiamiento</h6>
					</div>

					<div class="row mb-3">
						<label for="finan_recibio" class="col-sm-3 col-form-label" style="text-align: right;">¿Recibió?</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="finan_recibio" id="finan_recibio" disabled>
								<option value="" <?php if ($res["FINAN_ID"] == "") echo "selected"; ?>>----------</option>
								<option value="1" <?php if ($res["FINAN_ID"] == "1") echo "selected"; ?>>Sí</option>
								<option value="2" <?php if ($res["FINAN_ID"] == "2") echo "selected"; ?>>No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="finan_monto" class="col-sm-3 col-form-label" style="text-align: right;">Monto</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="finan_monto" id="finan_monto" value="<?php echo $res["FINAN_VAL"]; ?>" disabled>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Fecha del Intercambio </h6>
					</div>

					<div class="row mb-3">
						<label for="fecha_inicial" class="col-sm-3 col-form-label" style="text-align: right;">Inicial</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_inicial" id="fecha_inicial" value="<?php echo $res["DATE_START"]; ?>" disabled>
						</div>
					</div>

					<div class="row mb-3">
						<label for="fecha_terminal" class="col-sm-3 col-form-label" style="text-align: right;">Terminal</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_terminal" id="fecha_terminal" value="<?php echo $res["DATE_END"]; ?>" disabled>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<button type="submit" class="btn btn-outline-primary" name="btn_aplicar_salida" id="btn_aplicarCambios2" onclick="return confirmarAplicarCambios()" disabled>Aceptar Autorregistro</button>
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
		const btn_activar_edicion = document.getElementById("btn_activar_edicion");

		btn_activar_edicion.addEventListener("click", () => {

			if (document.getElementById("paterno").disabled === true) {

				//document.getElementById("matricula").disabled = false;
				document.getElementById("paterno").disabled = false;
				document.getElementById("materno").disabled = false;
				document.getElementById("nombre").disabled = false;
				document.getElementById("sexo").disabled = false;
				document.getElementById("discapacidad").disabled = false;
				document.getElementById("lengua_indigena").disabled = false;
				document.getElementById("origen_indigena").disabled = false;

				document.getElementById("campus_clave").disabled = false;
				document.getElementById("campus_nombre").disabled = false;

				document.getElementById("unidad_clave").disabled = false;
				document.getElementById("unidad_nombre").disabled = false;

				document.getElementById("periodo").disabled = false;
				document.getElementById("nivel").disabled = false;

				document.getElementById("unidad_reseptora_nombre").disabled = false;
				document.getElementById("unidad_reseptora_pais").disabled = false;
				document.getElementById("unidad_reseptora_entidad").disabled = false;
				document.getElementById("unidad_reseptora_idioma").disabled = false;

				document.getElementById("programa_clave").disabled = false;
				document.getElementById("programa_nombre").disabled = false;
				document.getElementById("area_clave").disabled = false;
				document.getElementById("area_nombre").disabled = false;

				document.getElementById("finan_recibio").disabled = false;
				document.getElementById("finan_monto").disabled = false;

				document.getElementById("fecha_inicial").disabled = false;
				document.getElementById("fecha_terminal").disabled = false;

				document.getElementById("btn_aplicarCambios2").disabled = false;
				document.getElementById("btn_aplicarCambios1").disabled = false;

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
			if (confirm('¿Estás seguro que quieres aplicar el autorregistro a las tablas principales?')) {
				//document.getElementById("formulario").submit();
			} else {
				return false;
			}
		}

		function confirmarBorrar() {
			var id = document.getElementById("matricula").value;
			if (confirm('¿Estás seguro que quieres eliminar el autorregistro del estudiante de matricula ' + id + '?')) {
				window.location.href = "../../php-partials/self_registration.php?tabla=salida&id=" + id;
			} else {
				return false;
			}
		}
	</script>

</body>

</html>