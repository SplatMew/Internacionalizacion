<?php if ( true) { ?>
	<nav id="sidebar">

		<!-- BOTÓN PARA DESPLEGAR Y CONTRAER MENU -->
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-warning">
				<i class="fa fa-bars"></i>
			</button>
		</div>

		<div class="pt-5 text-center">
			<div class="sidebar-header">
				<h3>
					<a href="../../perfil.php" style="color: white; font-weight:bold; "><?php echo  $_SESSION['nombre'];?></a>
				</h3>
			</div>
		 </div>

		<!-- SUB-MENUS DESPLEGABLES-->
		<div class="p-4 pt-6">
			<ul class="list-unstyled components mb-5">

				<!-- SUB-MENU AUTOREGISTROS -->
				<li class="active">
					<a href="consulta_temporal.php"><i class="fas fa-address-book fa-sm fa-fw mr-2 "></i>Autorregistros</a>
				</li>

				<!-- SUB-MENU ESTUDIANTES -->
				<li class="active">
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-school fa-sm fa-fw mr-2 "></i>Estudiantes</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="consulta_estudiantes.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
						</li>
						<?php if ($_SESSION["admin"]===1||$_SESSION["admin"]===2||$_SESSION["admin"]===3||$_SESSION["admin"]===5) { ?>
							<li>
								<a href="agregar_estudiante.php"><i class="fas fa-user-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
							</li>
						<?php } ?>
						<li>
							<a href="estadistica_estudiantes.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
						</li>
					</ul>
				</li>

				<!-- SUB-MENU INTERCAMBIOS -->
				<li class="active">
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-exchange-alt fa-sm fa-fw mr-2 "></i>Intercambio</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="consulta_intercambios.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
						</li>
						<?php if ($_SESSION["admin"]===1||$_SESSION["admin"]===2||$_SESSION["admin"]===3||$_SESSION["admin"]===5) { ?>
							<li>
								<a href="agregar_intercambio.php"><i class="fas fa-calendar-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
							</li>
						<?php } ?>
						<li>
							<a href="estadistica_intercambios.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
						</li>
					</ul>
				</li>

				<!-- SUB-MENU CAMBIO DE MODULO -->
				<li class="active">
					<a href="../../seleccion_modulos.php"><i class="fas fa-th-large fa-sm fa-fw mr-2 "></i>Cambiar de módulo</a>
				</li>


				<li class="active">
					<br>
				</li>
				
				<!-- SUB-MENU USUARIOS -->
                <li class="active">
                    <a href="#usersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users fa-sm fa-fw mr-2 "></i>Usuarios</a>
                    <ul class="collapse list-unstyled" id="usersSubmenu">
                        <li>
                            <a href="../../estudiantes/entrada/consulta_usuarios.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
                        </li>
                        <?php if ($_SESSION["admin"] != 4) { ?>
                            <li>
                                <a href="../../estudiantes/entrada/agregar_usuario.php"><i class="fas fa-calendar-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

				<!-- SUB-MENU SOPORTE -->
				<li class="active">
					<a href="#ayudaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-question fa-sm fa-fw mr-2 "></i>Soporte</a>
					<ul class="collapse list-unstyled" id="ayudaSubmenu">
						<li>
							<a href="https://docs.google.com/document/d/1aBYlKZEpHQCOx0QEHswnj4uuFJKSQtVGsNkpRSf-bic/edit?usp=sharing"><i class="fas fa-book-open fa-sm fa-fw mr-2 "></i>Manual de Usuario</a>
						</li>
						<li>
							<a href="https://docs.google.com/document/d/17tWpdwtsx3iOsZli502KIZSRMGlx9pIt2pVV-O0cjBI/edit?usp=sharing"><i class="fas fa-question fa-sm fa-fw mr-2 "></i>Preguntas Frecuentes</a>
						</li>
					</ul>
				</li>
				<!-- SUB-MENU MIS DATOS Y OPCIONES DE USUARIO -->
				<li class="active">
					<a href="../../php-partials/logout.php"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Cerrar Sesión</a>
					
				</li>
				
			</ul>
		</div>
		<!--FIN DE LOS SUB-MENUS DESPLEGABLE -->

	</nav>
<?php } ?>