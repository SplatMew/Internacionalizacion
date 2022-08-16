	<form action="../php-partials/ST_mov_NA_Estudiante_salida.php" method="POST" autocomplete="off">

		<div class="row mb-3 justify-content-md-center">
			<h6 class="mt-4 mb-0">Datos del Estudiante</h6>
		</div>

		<div class="row mb-3">
			<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Matricula</label>
			<div class="col-sm-6">
				<input type="number" min="1" max="999999" class="form-control border border-secondary" value="<?php echo $_SESSION['matricula']; ?>" name="matricula" id="matricula" required readonly>
			</div>
		</div>

		<div class="row mb-3">
			<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel de estudios</label>
			<div class="col-sm-6">
				<select class="form-control border border-secondary bg-light" name="nivel" id="nivel" required>
					<option value="" selected>- Seleccione uno -</option>
					<option value="1">Licenciatura</option>
					<option value="2">Especialidad</option>
					<option value="3">Maestría</option>
					<option value="4">Doctorado</option>
				</select>
			</div>
		</div>

		<div class="row mb-3 mt-5 justify-content-md-center">
			<h6 class="m-0 p-0" >Unidad académica de origen</h6>
		</div>

		<div class="row mb-3">
			<label for="campus_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Campus</label>
			<div class="col-sm-6">
				<select type="number" class="form-control border border-secondary bg-light" name="campus_nombre" id="campus_nombre" required onchange="claveCampus('campus_nombre','unidad_nombre');">
					<option value="">----------</option>
					<option value="1">MEXICALI</option>
					<option value="2">TIJUANA</option>
					<option value="3">ENSENADA</option>
				</select>
			</div>
		</div>


		<div class="row mb-3">
			<label for="unidad_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Unidad/Facultad</label>
			<div class="col-sm-6">
				<select type="number" class="form-control border border-secondary bg-light" name="unidad_nombre" id="unidad_nombre" required>
					<option value="">Elegir primero el campus</option>
				</select>
			</div>
		</div>

		<div class="row mb-3 mt-5 justify-content-md-center">
			<h6 class="m-0 p-0">Datos de la unidad receptora</h6>
		</div>

		<div class="row mb-3">
			<label for="unidad_reseptora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="unidad_reseptora_pais" id="unidad_reseptora_pais" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="unidad_reseptora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="unidad_reseptora_nombre" id="unidad_reseptora_nombre" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="unidad_reseptora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="unidad_reseptora_entidad" id="unidad_reseptora_entidad" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="unidad_reseptora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="unidad_reseptora_idioma" id="unidad_reseptora_idioma" required>
			</div>
		</div>

		<div class="row mb-3 mt-5 justify-content-md-center">
			<h6 class="m-0 p-0" >Programa Educativo</h6>
		</div>

		<div class="row mb-3">
			<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
			<div class="col-sm-6">
				<input type="number" min="1" max="999" class="form-control border border-secondary bg-light" name="programa_clave" id="programa_clave" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="programa_nombre" id="programa_nombre" required>
			</div>
		</div>

		<div class="row mb-3 mt-5 justify-content-md-center">
			<h6 class="m-0 p-0" >Área de conocimiento</h6>
		</div>

		<div class="row mb-3">
			<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
			<div class="col-sm-6">
				<input type="number" min="1" max="9" class="form-control border border-secondary bg-light" name="area_clave" id="area_clave" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
			<div class="col-sm-6">
				<input type="text" class="form-control border border-secondary bg-light" name="area_nombre" id="area_nombre" required>
			</div>
		</div>

		<div class="col mb-3 mt-5 justify-content-md-center">
			<h6 class="text-center m-0 p-0">Financiamiento</h6>
			<h6 class="text-center p-0 m-0" style="font-size: 12px;">De no haber recibido financiamento, dejar el monto en uno</h6>
		</div>

		<div class="row mb-3">
			<label for="finan_recibio" class="col-sm-3 col-form-label" style="text-align: right;">Tipo de moneda</label>
			<div class="col-sm-6">
				<select class="form-control border border-secondary bg-light" name="finan_recibio" id="finan_recibio" required>
					<option value="" selected>----------</option>
					<option value="1">Dolar estadounidense</option>
					<option value="2">Dolar canadiense</option>
					<option value="2">Euro</option>
					<option value="2">Peso mexicano</option>
					<option value="2">Otro</option>
				</select>
			</div>
		</div>

		<div class="row mb-3">
			<label for="finan_monto" class="col-sm-3 col-form-label" style="text-align: right;">Monto</label>
			<div class="col-sm-6">
				<input type="number" min="1" max="99999" class="form-control border border-secondary bg-light" name="finan_monto" id="finan_monto" value="1" required>
			</div>
		</div>

		<div class="row mb-3 mt-5 justify-content-md-center">
			<h6 class=" m-0 p-0">Fecha del Intercambio </h6>
		</div>

		<div class="row mb-3">
			<label for="fecha_inicial" class="col-sm-3 col-form-label" style="text-align: right;">Inicial</label>
			<div class="col-sm-6">
				<input type="date" class="form-control border border-secondary bg-light" name="fecha_inicial" id="fecha_inicial" onchange="fechaInicio('fecha_inicial','fecha_terminal','periodoescolar');" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="fecha_terminal" class="col-sm-3 col-form-label" style="text-align: right;">Terminal</label>
			<div class="col-sm-6">
				<input type="date" class="form-control border border-secondary bg-light" name="fecha_terminal" id="fecha_terminal" onchange="fechaPeriodo('fecha_inicial','fecha_terminal','periodoescolar');" required>
			</div>
		</div>

		<div class="row mb-3">
			<label for="periodo" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
			<div class="col-sm-6">
				<input class="form-control border border-secondary" name="periodo" placeholder="seleccione primero las fechas" value="" id="periodoescolar" readonly required>
			</div>
		</div>

		<div class="row mb-3 justify-content-md-center">
			<button type="submit" class="btn btn-outline-primary" name="btn_agregarIntercambio_salida" id="btnExportar">Solicitar movilidad</button>
		</div>
	</form>