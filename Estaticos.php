<?php
	function navVar($navegacion,$escudo){ ?>

		<nav class="navbar navbar-expand-lg navbar-light py-1 shadow mt-2" style="border-radius: 8px;">

				<div class="container-fluid">
					<!-- logo uabc-->
					<div class="col-sm-auto d-flex align-items-center justify-content-center">
						<img src=<?php echo $escudo ?> alt="" width="70" height="90" class=" mt-1 mb-1" >
					</div>

					<!-- texto y ruta de navegación -->
					<div class="d-flex flex-row justify-content-center align-items-center">
						<div class="col">

							<div class="d-flex flex-row justify-content-center">
								<h5 class="text-center" style="color: #007141">UNIVERSIDAD AUTÓNOMA DE BAJA CALIFORNIA</h5>
							</div>

							<div class="d-flex flex-row justify-content-center">
								<h6 class="text-center" style="color: #1a2c25"><?php echo $navegacion ?></h6>
							</div>

						</div>
					</div>

					<div class="col-sm-auto d-flex align-items-center justify-content-rigth">
							<img src="../../public/assets/internacionalizacion.png" width="300" alt="logo" class="img-fluid   p-0 d-none d-md-block " />
						</div>
				</div>
			</nav>
	<?php } 
		//Crea una funcion en javascript para mostrar un alerta en codigo php
		function msjAlert($msje){ 
			 echo '<script type="text/javascript"> window.onload = function () { alert("'; echo $msje; echo '");} </script>';
		}

		function btnSoporte(){ ?>
			<div class="d-flex flex-column align-items-center justify-content-center rounded">
				<p>
					<button class="btn btn-outline-success mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#soporte" aria-expanded="false" aria-controls="collapseExample" id="botonVerde" style="color: white; background: #00723e;font-weight: 500;box-shadow: 0px 6px 6px #b6b6b6;">
						Soporte
					</button>
				</p>
				<div class="collapse" id="soporte" >
						<div class="card card-body shadow mb-2" style="border-radius:10px;">
							<address class="text-left">
								<strong>Campus Ensenada</strong>
								<br>- Nombre: Jose
								<br>- Correo para soporte: sistemas@uabc.edu.mx
								<br>- Teléfono: (646)xxxxxxx ext. xxxxx
							</address>
							<address class="text-left">
								<strong>Campus Mexicali</strong>
								<br>- Nombre: Maria
								<br>- Correo para soporte: sistemas@uabc.edu.mx
								<br>-Teléfono:  (686)xxxxxxx ext. xxxxx
							</address>
							<address class="text-left">
								<strong>Campus Tijuana</strong>
								<br>- Nombre: Rodolfo
								<br>- Correo para soporte: sistemas@uabc.edu.mx 
								<br>-Teléfono:  (664)xxxxxxx ext. xxxxx
							</address>
						</div>
					</div>
				
			</div>
		<?php }

		function perfil_form(){ ?>
		
			<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="php-partials/NuevacuentaEstudianteEntrada.php" method="POST" autocomplete="off">

					<h6 class="m-1 p-0 text-center" id="datosTitulo">Datos del estudiante</h6>
					
					<div class="row mb-3 mt-0">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID / MATRICULA</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="4294967295" class="form-control border border-secondary bg-light" name="matricula" id="matricula" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
						<div class="col-sm-6">
							<input type="email" class="form-control border border-secondary bg-light" name="correo" id="correo" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
						<div class="col-sm-6">
							<input type="password" class="form-control border border-secondary bg-light" name="password" id="password" minlength="6" required/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="paterno" id="paterno" pattern="[a-zñA-ZÑ]{0,}" required/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="materno" id="materno" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="nombre" id="nombre" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="sexo" id="sexo" required>
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
							<select class="form-control border border-secondary bg-light" name="discapacidad" id="discapacidad">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="lengua_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Lengua Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="lengua_indigena" id="lengua_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="origen_indigena" id="origen_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-5">
						<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="nivel" id="nivel" required>
								<option value="" selected>----------</option>
								<option value="1">Licenciatura</option>
								<option value="2">Especialidad</option>
								<option value="3">Maestría</option>
								<option value="4">Doctorado</option>
							</select>
						</div>
					</div>

					
						<h6 class=" text-center m-0 p-0 mb-1 mt-5">Campus</h6>
					

					<div class="row mb-5 mt-0">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="campus_clave" id="campus_clave" onchange="facultades(7);" required>
								<option value="">----------</option>
								<option value="1">MEXICALI</option>
								<option value="2">TIJUANA</option>
								<option value="3">ENSENADA</option>
							</select>
						</div>
					</div>

					<div class="row mb-1 mt-5 justify-content-md-center mt-5 mb-1">
						<h6 class="m-0 p-0">Unidad Académica</h6>
					</div>

					<div class="row mb-5 mt-0">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6"> 
							<select class="form-control border border-secondary bg-light" name="unidad_clave" id="unidad_clave" required>
									<option value=''>-Seleccione primero un campus-</option>
									
							</select>
						</div>

					</div>

					<div class="row mb-1 mt-3 justify-content-md-center">
						<h6 class="m-0 p-0">Programa Educativo de llegada</h6>
					</div>

					<div class="row mb-3 mt-0">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary bg-light" name="programa_clave" id="programa_clave" required>
						</div>
					</div>

					<div class="row mb-5">
						<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="programa_nombre" id="programa_nombre" required>
						</div>
					</div>

					<div class="row mb-1 mt-5 justify-content-md-center">
						<h6 class="m-0 p-0">Área de conocimiento</h6>
					</div>

					<div class="row mb-3 mt-0">
						<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary bg-light" name="area_clave" id="area_clave" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="area_nombre" id="area_nombre" required>
						</div>
					</div>

					

					<div class="d-flex justify-content-center mt-3 mb-1">
						<button type="submit" class="btn btn-outline-primary ps-5 pe-5" name="btn_agregarEstudiante_entrada" id="btnExportar">Crear cuenta estudiante visitante</button>
					</div>
				</form>
		<?php }

		function estudiante_in_form(){ ?>

			<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="php-partials/NuevacuentaEstudianteEntrada.php" method="POST" autocomplete="off">

					
					<h6 class="m-1 p-0 text-center">Datos del estudiante</h6>
					

					<div class="row mb-3 mt-0">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="4294967295" class="form-control border border-secondary bg-light" name="matricula" id="matricula" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
						<div class="col-sm-6">
							<input type="email" class="form-control border border-secondary bg-light" name="correo" id="correo" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
						<div class="col-sm-6">
							<input type="password" class="form-control border border-secondary bg-light" name="password" id="password" minlength="6" required/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="paterno" id="paterno" pattern="[a-zñA-ZÑ]{0,}" required/>
						</div>
					</div>

					<div class="row mb-3">
						<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="materno" id="materno" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="nombre" id="nombre" pattern="[A-ZÑa-zñ]{0,}" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="sexo" id="sexo" required>
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
							<select class="form-control border border-secondary bg-light" name="discapacidad" id="discapacidad">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="lengua_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Lengua Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="lengua_indigena" id="lengua_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="origen_indigena" id="origen_indigena" required>
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-5">
						<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="nivel" id="nivel" required>
								<option value="" selected>----------</option>
								<option value="1">Licenciatura</option>
								<option value="2">Especialidad</option>
								<option value="3">Maestría</option>
								<option value="4">Doctorado</option>
							</select>
						</div>
					</div>

					
						<h6 class=" text-center m-0 p-0 mb-1 mt-5">Campus</h6>
					

					<div class="row mb-5 mt-0">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary bg-light" name="campus_clave" id="campus_clave" onchange="facultades(7);" required>
								<option value="">----------</option>
								<option value="1">MEXICALI</option>
								<option value="2">TIJUANA</option>
								<option value="3">ENSENADA</option>
							</select>
						</div>
					</div>

					<div class="row mb-1 mt-5 justify-content-md-center mt-5 mb-1">
						<h6 class="m-0 p-0">Unidad Académica</h6>
					</div>

					<div class="row mb-5 mt-0">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6"> 
							<select class="form-control border border-secondary bg-light" name="unidad_clave" id="unidad_clave" required>
									<option value=''>-Seleccione primero un campus-</option>
									
							</select>
						</div>

					</div>

					<div class="row mb-1 mt-3 justify-content-md-center">
						<h6 class="m-0 p-0">Programa Educativo de llegada</h6>
					</div>

					<div class="row mb-3 mt-0">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary bg-light" name="programa_clave" id="programa_clave" required>
						</div>
					</div>

					<div class="row mb-5">
						<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="programa_nombre" id="programa_nombre" required>
						</div>
					</div>

					<div class="row mb-1 mt-5 justify-content-md-center">
						<h6 class="m-0 p-0">Área de conocimiento</h6>
					</div>

					<div class="row mb-3 mt-0">
						<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary bg-light" name="area_clave" id="area_clave" required>
						</div>
					</div>

					<div class="row mb-3">
						<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary bg-light" name="area_nombre" id="area_nombre" required>
						</div>
					</div>

					

					<div class="d-flex justify-content-center mt-3 mb-1">
						<button type="submit" class="btn btn-outline-primary ps-5 pe-5" name="btn_agregarEstudiante_entrada" id="btnExportar">Crear cuenta estudiante visitante</button>
					</div>
				</form>
		<?php }

		function estudiante_out_form(){ ?>
			<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="php-partials/NuevacuentaEstudianteSalida.php" method="POST" autocomplete="off">

				<h6 class="text-center m-0 p-0 mb-1">Datos del estudiante</h6>

				<div class="row mb-3 mt-0 pt-0">
					<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Matricula</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="4294967295" class="form-control border border-secondary bg-light" name="matricula" id="matricula" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
					<div class="col-sm-6">
						<input type="email" class="form-control border border-secondary bg-light" name="correo" id="correo" required />
					</div>
				</div>

				<div class="row mb-3">
					<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
					<div class="col-sm-6">
						<input type="password" class="form-control border border-secondary bg-light" name="password" id="password" minlength="6" required/>
					</div>
				</div>
				<div class="row mb-3">
					<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary bg-light" name="paterno" id="paterno">
					</div>
				</div>

				<div class="row mb-3">
					<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary bg-light" name="materno" id="materno">
					</div>
				</div>

				<div class="row mb-3">
					<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary bg-light" name="nombre" id="nombre">
					</div>
				</div>

				<div class="row mb-3">
					<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary bg-light" name="sexo" id="sexo">
							<option value="" selected>----------</option>
							<option value="1">Femenino</option>
							<option value="2">Masculino</option>
							<!--<option value="3">No Binario</option>-->
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary bg-light" name="discapacidad" id="discapacidad">
							<option value="" selected>----------</option>
							<option value="1">Sí</option>
							<option value="2">No</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="lengua_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Lengua Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary bg-light" name="lengua_indigena" id="lengua_indigena">
							<option value="" selected>----------</option>
							<option value="1">Sí</option>
							<option value="2">No</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="origen_indigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary bg-light" name="origen_indigena" id="origen_indigena">
							<option value="" selected>----------</option>
							<option value="1">Sí</option>
							<option value="2">No</option>
						</select>
					</div>
				</div>

				<div class="d-flex justify-content-center mt-3 mb-1">
					<button type="submit" class="btn btn-outline-primary" name="btn_agregarEstudiante_salida" id="btnExportar">Crear cuenta estudiante de UABC</button>
				</div>
			</form>
		<?php }

		function academico_in_form(){ ?>
			<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="php-partials/NuevacuentaAcademicoEntrada.php" method="POST" autocomplete="off">

				<h6 class="text-center m-0 p-0 mb-1">Datos del académico</h6>

				<div class="row mb-3 mt-0 pt-0">
					<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Clave de Identificación</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="4294967295" class="form-control border border-secondary" placeholder="Clave de Identificación" name="matricula" id="matricula" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
					<div class="col-sm-6">
						<input type="email" class="form-control border border-secondary bg-light" name="correo" id="correo" required />
					</div>
				</div>

				<div class="row mb-3">
					<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
					<div class="col-sm-6">
						<input type="password" class="form-control border border-secondary bg-light" name="password" id="password" minlength="6" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Nombre" name="nombre" id="nombre" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Paterno" name="paterno" id="paterno" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Materno" name="materno" id="materno" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="sexo" id="sexo" required>
							<option value="">
								--Seleccionar Sexo--
							</option>
							<option value="1">
								Femenino
							</option>
							<option value="2">
								Masculino
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nivelestudios" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de Estudios</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="nivelestudios" id="nivelestudios"  required>
							<option value="">
								--Seleccionar Nivel--
							</option>
							<option value="1">
								Licenciatura
							</option>
							<option value="2">
								Especialidad
							</option>
							<option value="3">
								Maestría
							</option>
							<option value="4">
								Doctorado
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="discapacidad" class="col-sm-3 col-form-label" style="text-align: right;">Discapacidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="discapacidad" id="discapacidad" required>
							<option value="">
								--¿Tiene alguna Discapacidad?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="habindigena" class="col-sm-3 col-form-label" style="text-align: right;">Hablante Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="habindigena" id="habindigena" required>
							<option value="">
								--¿Es Hablante Indígena?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="orindigena" class="col-sm-3 col-form-label" style="text-align: right;">Origen Indígena</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="orindigena" id="orindigena" required>
							<option value="">
								--¿Es de Origen Indígena?--
							</option>
							<option value="1">
								Sí
							</option>
							<option value="2">
								No
							</option>
						</select>
					</div>
				</div>

				
				<div class="d-flex justify-content-center mt-3 mb-1">
					<input type="submit" value="Crear cuenta académico visitante" class="btn btn-outline-success align-self-center" name="btn_agregarAcademico_entrada" id="btnExportar">
				</div>		

			</form>
		<?php }

		function academico_out_form(){ ?>
			<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="php-partials/NuevacuentaAcademicoSalida.php" method="POST" autocomplete="off">

				<h6 class="text-center m-0 p-0 mb-1">Datos del académico</h6>

				<div class="row mb-3 mt-0 pt-0">
					<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Número de Empleado</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="4294967295" class="form-control border border-secondary" placeholder="Número de Empleado" name="matricula" id="matricula" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="correo" class="col-sm-3 col-form-label" style="text-align: right;">Correo</label>
					<div class="col-sm-6">
						<input type="email" class="form-control border border-secondary bg-light" name="correo" id="correo" required />
					</div>
				</div>

				<div class="row mb-3">
					<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Contraseña</label>
					<div class="col-sm-6">
						<input type="password" class="form-control border border-secondary bg-light" name="password" id="password" minlength="6" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Nombre" name="nombre" id="nombre" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Paterno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Paterno" name="paterno" id="paterno" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Apellido Materno</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Apellido Materno" name="materno" id="materno" required/>
					</div>
				</div>

				<div class="row mb-3">
					<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="sexo" id="sexo" required>
							<option value="">
								--Seleccionar--
							</option>
							<option value="1">
								Femenino
							</option>
							<option value="2">
								Masculino
							</option>
						</select>
					</div>
				</div>

				
				<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center mt-3 p-0">
					<input type="submit" value="Crear cuenta académico de UABC" class="btn btn-outline-primary" name="btn_agregarAcademico_salida" id="btnExportar">
				</div>					
				

			</form>
		<?php }
	?>  


