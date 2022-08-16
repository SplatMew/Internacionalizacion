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

include "../../php-partials/connect.php";
$sql = "SELECT * FROM academicos_entrada WHERE VISITANTE_ID = ${_GET["id"]}";
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
		#btn_activar_edicion, #btn_aplicarCambios1{
			color: white;
			background: #00723e;
			font-weight: 500;
			box-shadow: 0px 6px 6px #b6b6b6;
		}
	</style>
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
		      navVar("Sistema de Internacionalización > Académicos > Visitantes > Actualizar Académico","../../public/assets/UABC_crop.png")
		    ?>
			
			<h5 class="mb-4 text-center">Actualizar Académico (Entrada)</h5>
			<form id="formulario" action="../../php-partials/update.php" method="post" autocomplete="off">

				<div class="row mb-3">
					<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Clave de Identificación</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="999999" class="form-control border border-secondary" name="identificador" id="identificador" value="<?php echo $res["VISITANTE_ID"]; ?>" readonly>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $res["VISITANTE"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Paterno" name="paterno" id="paterno" value="<?php echo $res["VISITANTE_APELLIDO1"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Materno" name="materno" id="materno" value="<?php echo $res["VISITANTE_APELLIDO2"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="sexo" id="sexo" disabled>
							<option value="" <?php if ($res["SEXO_ID"] == "") echo "selected"; ?>>
								--Seleccionar--
							</option>
							<option value="1" <?php if ($res["SEXO_ID"] == "1") echo "selected"; ?>>
								Femenino
							</option>
							<option value="2" <?php if ($res["SEXO_ID"] == "2") echo "selected"; ?>>
								Masculino
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nivelestudios" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="nivelestudios" id="nivelestudios" disabled>
							<option value="" <?php if ($res["NIVEL_ID"] == "") echo "selected"; ?>>
								--Seleccionar Nivel--
							</option>
							<option value="1" <?php if ($res["NIVEL_ID"] == "1") echo "selected"; ?>>
								Licenciatura
							</option>
							<option value="2" <?php if ($res["NIVEL_ID"] == "2") echo "selected"; ?>>
								Especialidad
							</option>
							<option value="3" <?php if ($res["NIVEL_ID"] == "3") echo "selected"; ?>>
								Maestría
							</option>
							<option value="4" <?php if ($res["NIVEL_ID"] == "4") echo "selected"; ?>>
								Doctorado
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="discapacidad" id="discapacidad" disabled>
							<option value="" <?php if ($res["DISCAPACIDAD"] == "") echo "selected"; ?>>
								--¿Tiene alguna Discapacidad?--
							</option>
							<option value="1" <?php if ($res["DISCAPACIDAD"] == "1") echo "selected"; ?>>
								Sí
							</option>
							<option value="2" <?php if ($res["DISCAPACIDAD"] == "2") echo "selected"; ?>>
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="habindigena" class="col-sm-3 col-form-label" style="text-align: right;">Hablante Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="habindigena" id="habindigena" disabled>
							<option value="" <?php if ($res["HABLANTE_INDIGENA"] == "") echo "selected"; ?>>
								--¿Es Hablante Indígena?--
							</option>
							<option value="1" <?php if ($res["HABLANTE_INDIGENA"] == "1") echo "selected"; ?>>
								Sí
							</option>
							<option value="2" <?php if ($res["HABLANTE_INDIGENA"] == "2") echo "selected"; ?>>
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="orindigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="orindigena" id="orindigena" disabled>
							<option value="" <?php if ($res["ORIGEN_INDIGENA"] == "") echo "selected"; ?>>
								--¿Es de Origen Indígena?--
							</option>
							<option value="1" <?php if ($res["ORIGEN_INDIGENA"] == "1") echo "selected"; ?>>
								Sí
							</option>
							<option value="2" <?php if ($res["ORIGEN_INDIGENA"] == "2") echo "selected"; ?>>
								No
							</option>
						</select>
					</div>
				</div>
				
				<?php if($_SESSION['admin']===1|| $_SESSION['admin']===2 || $_SESSION['admin']===3|| $_SESSION['admin']===5){?>
					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<button type="button" class="btn btn-primary" id="btn_activar_edicion" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Editar</button>
						</div>					
					</div>

					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-0">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<button type="submit" class="btn btn-outline-primary" name="btn_aplicarCambios_academico_entrada" id="btn_aplicarCambios1" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
						</div>					
					</div>

					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-0">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<button type="reset" class="btn btn-danger" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if (!$_SESSION["admin"]) echo "disabled"; ?>>Eliminar</button>
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


	<script>
		const btn_activar_edicion = document.getElementById("btn_activar_edicion");

		btn_activar_edicion.addEventListener("click", () => {

			if (document.getElementById("paterno").disabled === true) {

				//document.getElementById("identificador").disabled = false;
				document.getElementById("nombre").disabled = false;
				document.getElementById("paterno").disabled = false;
				document.getElementById("materno").disabled = false;
				document.getElementById("sexo").disabled = false;
				document.getElementById("nivelestudios").disabled = false;
				document.getElementById("discapacidad").disabled = false;
				document.getElementById("habindigena").disabled = false;
				document.getElementById("orindigena").disabled = false;

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
			var id = document.getElementById("identificador").value;
			if (confirm('¿Estás seguro que quieres eliminar el registro del académico de id ' + id + '?')) {
				window.location.href = "../../php-partials/delete.php?tabla=academicos_entrada&id=" + id;
			} else {
				return false;
			}
		}
	</script>

</body>

</html>