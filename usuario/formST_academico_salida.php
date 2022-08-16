<form class="col-sm-12 mb-1 mt-3 justify-content-center align-items-center" action="../php-partials/ST_mov_NA_Academico_salida.php" method="POST" autocomplete="off">
	<div class="row mb-3">
		<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">Número de Empleado</label>
		<div class="col-sm-6">
			<input type="number" min="0" max="4294967295" class="form-control border border-secondary bg-light" placeholder="<?php echo $_SESSION['matricula']?>" name="matricula" id="matricula" value="<?php echo $_SESSION['matricula']?>" readonly required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="tipomovilidad" class="col-sm-3 col-form-label" style="text-align: right;">Tipo de Movilidad</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="tipomovilidad" id="tipomovilidad" required>
				<option value="">
					-- Seleccionar --
				</option>
				<option value="1">
					Docencia
				</option>
				<option value="2">
					Estancia Sabática
				</option>
				<option value="3">
					Estancia de Investigación
				</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="paisreceptor" class="col-sm-3 col-form-label" style="text-align: right;">País Receptor</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="País Receptor" name="paisreceptor" id="paisreceptor" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="unidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Receptora</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Unidad Receptora" name="unidadreceptora" id="unidadreceptora" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="entidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Entidad Receptora</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Entidad Receptora" name="entidadreceptora" id="entidadreceptora" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="idiomasdominados" class="col-sm-3 col-form-label" style="text-align: right;">Idiomas Dominados</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Idiomas Dominados" name="idiomasdominados" id="idiomasdominados" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="periodoescolar" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="periodoescolar" id="periodoescolar" required>
				
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="campusemisor" class="col-sm-3 col-form-label" style="text-align: right;">Campus Emisor</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="campusemisor" id="campusemisor" onchange="addfacultades(8);" required>
				<option value="">
					-- Seleccionar Campus --
				</option>
				<option value="1">
					Campus Mexicali
				</option>
				<option value="2">
					Campus Tijuana
				</option>
				<option value="3">
					Campus Ensenada
				</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="unidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Emisora</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="unidademisora" id="unidademisora" required>
				<option value="">
					-- Seleccione primero un campus --
				</option>
				
			</select>
		</div>
	</div>

	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
			<input type="submit" value="Solicitar movilidad" class="btn btn-outline-primary" name="Academico_Salida_Temporal" id="btnExportar">
		</div>					
	</div>

</form>