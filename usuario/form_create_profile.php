<?php 
	session_start();
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	?> <h1 class="text-center" > USTED NO NECESITA ESTAR AQUÍ</h1>
	<?php	
		exit();
	}
?>
<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="" method="POST" autocomplete="off" id="actionForm">

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
		<label for="password" class="col-sm-3 col-form-label" style="text-align: right;">Confirmar contraseña</label>
		<div class="col-sm-6">
			<input type="password" class="form-control border border-secondary bg-light" name="passwordConfirm" id="passwordConfirm" minlength="6" required onchange="comparePasswords('password','passwordConfirm');" />
		</div>
	</div>

	<div class="row mb-3">
		<label for="nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre(s)</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" name="nombre" id="nombre" pattern="[A-ZÑa-zñ ]{0,}" required />
		</div>
	</div>

	<div class="row mb-3">
		<label for="paterno" class="col-sm-3 col-form-label" style="text-align: right;">Primer apellido</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" name="paterno" id="paterno" pattern="[a-zñA-ZÑ]{0,}" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="materno" class="col-sm-3 col-form-label" style="text-align: right;">Segundo apellido</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" name="materno" id="materno" pattern="[A-ZÑa-zñ]{0,}" required />
		</div>
	</div>

	<div class="row mb-3">
		<label for="sexo" class="col-sm-3 col-form-label" style="text-align: right;">Sexo</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="sexo" id="sexo" required>
				<option value="" selected>----------</option>
				<option value="1">Femenino</option>
				<option value="2">Masculino</option>
				<option value="3">Otro</option>
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

	<div class="d-flex justify-content-center mt-3 mb-1">
		<button type="submit" class="btn btn-outline-primary ps-5 pe-5 mt-2" name="btn_agregarEstudiante_entrada" id="btnExportar">Crear cuenta estudiante visitante</button>
	</div>
</form>
<?php ?>