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
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-warning">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Mostrar Menu</span>
				</button>
			</div>

			<div class="p-4 pt-5 mt-5">
				<ul class="list-unstyled components mb-5 ">
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
		      navVar("Sistema de Internacionalización > Estudiantes > Salida > Autorregistro","../../public/assets/UABC_crop.png")
		    ?>
			
			<div class="container">


				<!--Campos-->
				<form action="../../php-partials/self_registration.php" method="POST" autocomplete="off">

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Estudiante</h6>
					</div>

					<div class="row mb-3">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Matricula</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula">
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
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary" name="campus_clave" id="campus_clave">
						</div>
					</div>

					<div class="row mb-3">
						<label for="campus_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="campus_nombre" id="campus_nombre">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Unidad Académica</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary" name="unidad_clave" id="unidad_clave">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_nombre" id="unidad_nombre">
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
						<h6>Datos de la Unidad Receptora</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_nombre" id="unidad_reseptora_nombre">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_pais" id="unidad_reseptora_pais">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_entidad" id="unidad_reseptora_entidad">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_reseptora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_reseptora_idioma" id="unidad_reseptora_idioma">
						</div>
					</div>

					<hr />


					<div class="row mb-3 justify-content-md-center">
						<h6>Programa Educativo</h6>
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
						<button type="submit" class="btn btn-outline-primary" name="btn_agregar_salida" id="btnExportar">Agregar</button>
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


</body>

</html>