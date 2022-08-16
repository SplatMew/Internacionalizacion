<?php if ( true) { ?>
	<nav id="sidebar">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-warning">
				<i class="fa fa-bars"></i>
				<span class="sr-only">Mostrar Menú</span>
			</button>
		</div>

		<!-- ENLACE AL PERFIL  -->
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

				<!-- SUB-MENU AUTOREGISTROS-->
				<li class="active">
					<a href="consulta_temporal.php"><i class="fas fa-address-book fa-sm fa-fw mr-2 "></i>Autorregistros</a>
				</li>

				<!-- SUB-MENU ACADÉMICOS-->
				<li class="active">
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-chalkboard-teacher fa-sm fa-fw mr-2 "></i>Académicos</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="consulta_academicos.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
						</li>
						<?php if ($_SESSION["admin"]===1||$_SESSION["admin"]===2||$_SESSION["admin"]===3||$_SESSION["admin"]===5) { ?>
							<li>
								<a href="agregar_academico.php"><i class="fas fa-user-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
							</li>
						<?php } ?>
						<li>
							<a href="estadistica_academicos.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
						</li>
					</ul>
				</li>

				<!-- SUB-MENU MOVILIDADES-->
				<li class="active">
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-people-carry fa-sm fa-fw mr-2 "></i>Movilidades</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="consulta_movilidades.php"><i class="fas fa-table fa-sm fa-fw mr-2 "></i>Consultar</a>
						</li>
						<?php if ($_SESSION["admin"]===1||$_SESSION["admin"]===2||$_SESSION["admin"]===3||$_SESSION["admin"]===5) { ?>
							<li>
								<a href="agregar_movilidad.php"><i class="fas fa-calendar-plus fa-sm fa-fw mr-2 "></i>Agregar</a>
							</li>
						<?php } ?>
						<li>
							<a href="estadistica_movilidades.php"><i class="fas fa-chart-pie fa-sm fa-fw mr-2 "></i>Estadísticas</a>
						</li>
					</ul>
				</li>

				<!-- SUB-MENU CAMBIO DE MODULO -->
				<li class="active">
					<a href="../../seleccion_modulos.php"><i class="fas fa-th-large fa-sm fa-fw mr-2 "></i>Cambiar de Módulo</a>
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
				
				<!-- SUB-MENU CIERRE SESIÓN -->
				<li class="active">
					<a href="../../php-partials/logout.php"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Cerrar sesión</a>
				</li>
				
				

			</ul>

		</div>

	</nav>
<?php } ?>