<?php
require_once "../../php-partials/auth.php";
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
</head>

<body>

	<!-- SUBMENU COLAPSABLE -->
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-warning">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Mostrar Menú</span>
				</button>
			</div>

			<div class="pt-5 text-center">
				<div class="sidebar-header">
					<img class="logo" src="../../public/assets/UABC Internacional_crop.png" width="120" alt="" />
					</div>
			  	</div>

			<div class="p-4 pt-6">
				
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-chalkboard-teacher fa-sm fa-fw mr-2 "></i>Académicos</a>
						<ul class="collapse list-unstyled" id="homeSubmenu">
							<li>
								<a href="consulta_academicos.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
							</li>
							<?php if ($_SESSION["admin"]) { ?>
								<li>
									<a href="agregar_academico.php"><i class="fas fa-user-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
								</li>
							<?php } ?>
							<li>
								<a href="estadistica_academicos.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
							</li>
						</ul>
					</li>
					<li class="active">
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-people-carry fa-sm fa-fw mr-2 "></i>Movilidades</a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
							<li>
								<a href="consulta_movilidades.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
							</li>
							<?php if ($_SESSION["admin"]) { ?>
								<li>
									<a href="agregar_movilidad.php"><i class="fas fa-calendar-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
								</li>
							<?php } ?>
							<li>
								<a href="estadistica_movilidades.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
							</li>
						</ul>
					</li>

					<li class="active">
						<a href="consulta_temporal.php"><i class="fas fa-address-book fa-sm fa-fw mr-2 "></i>Autorregistros</a>
					</li>

					<li class="active">
						
						<a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user fa-sm fa-fw mr-2 "></i><?php echo  $_SESSION['nombre']  ; ?></a>
						<ul class="collapse list-unstyled" id="userSubmenu">
							<!-- Todavia no se que hacer con esta pagina
							<li>
								<a href="#"><i class="fas fa-user fa-sm fa-fw mr-2 "></i>Mi Cuenta</a>
							</li>
							-->
							<li>
								<a href="https://docs.google.com/document/d/1aBYlKZEpHQCOx0QEHswnj4uuFJKSQtVGsNkpRSf-bic/edit?usp=sharing"><i class="fas fa-book-open fa-sm fa-fw mr-2 "></i>Manual de Usuario</a>
							</li>
							<li>
								<a href="https://docs.google.com/document/d/17tWpdwtsx3iOsZli502KIZSRMGlx9pIt2pVV-O0cjBI/edit?usp=sharing"><i class="fas fa-question fa-sm fa-fw mr-2 "></i>Preguntas Frecuentes</a>
							</li>
							<li>
								<a href="../../php-partials/logout.php"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Cerrar Sesión</a>
							</li>
						</ul>
						
					</li>
					
					<li class="active">
						<a href="../../seleccion_modulos.php"><i class="fas fa-th-large fa-sm fa-fw mr-2 "></i>Cambiar de Módulo</a>
					</li>

				</ul>

			</div>

		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<!-- NAV BAR  -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light py-1 ">
				<div class="container-fluid ">
					<div class="row">
						<div class="col-sm-auto">
							<div class="well">
								<img src="../../public/assets/UABC.png" alt="" width="70" height="90" class="d-inline-block align-text-top">
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<div class="well">
										<h4 style="color: #007141">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h5>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="well">
										<h5 style="color: #1a2c25">Sistema de Internacionalización > Académicos > <a href="cascaron.php">Salida</a></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<img src="../../public/assets/internacionalizacion.png" width="300" alt="logo" class="img-fluid   p-0 d-none d-md-block " />
						</ul>
					</div>
				</div>
			</nav>


			<div class="container">

				<!--
				

			    CONTENDIO

				PRINCIPAL

			    DE

				LA

				PAGINA

				-->

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