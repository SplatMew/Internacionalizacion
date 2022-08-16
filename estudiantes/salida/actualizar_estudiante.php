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

$sql = "SELECT * FROM estudiantes_salida WHERE ESTUDIANTE_ID = ${_GET["id"]}";
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
	      navVar("Sistema de Internacionalización > Estudiantes > Salida > Consultar Estudiantes > Actualizar Estudiante","../../public/assets/UABC_crop.png")
	    ?>
			
			<!--Campos-->
			<div id="Page1">
				<div class="container">

					<form id="formulario" action="../../php-partials/update.php" method="post" autocomplete="off">

						<div class="d-flex row align-items-centeer align-self-stretch ">
							<div class="col-sm-4">
	              <div class="d-flex justify-content-center p-1">
	                  <button type="button" class="btn btn-outline-primary" id="btn_activar_edicion" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Editar</button>
	              </div>
	          	</div>

	          	<div class="col-sm-4">
	              <div class="d-flex justify-content-center p-1">
	                <button type="submit" class="btn btn-outline-primary" style="display: none;" name="btn_aplicarCambios_estudiante_salida" id="btn_aplicarCambios1" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
	              </div>
	          	</div>

	          	<div class="col-sm-4">
	              <div class="d-flex justify-content-center p-1">
	                <button type="button" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Eliminar</button>
	              </div>
	          	</div>
	          </div>

						<hr/>

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
									<!--<option value="3" <?php //if ($res["SEXO_ID"] == "3") echo "selected"; 
															?>>No Binario</option>-->
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

						<hr/>

						<div class="row mb-3 justify-content-md-center">
							<button type="submit" class="btn btn-outline-primary" style="display: none;" name="btn_aplicarCambios_estudiante_salida" id="btn_aplicarCambios2" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
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

				document.getElementById("btn_aplicarCambios1").style.display = 'block';
				document.getElementById("btn_aplicarCambios2").style.display = 'block';

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
				window.location.href = "../../php-partials/delete.php?tabla=estudiante_salida&id=" + id;
			} else {
				return false;
			}
		}
	</script>



</body>

</html>