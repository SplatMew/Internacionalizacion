<?php 
	$solicitadas = "SELECT * FROM movilidad_academica_entrada_temporal WHERE VISITANTE_ID = ${_SESSION["matricula"]} ";

	if ($query = mysqli_query($con, $solicitadas)) {
		//$res = mysqli_fetch_array($query);
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	mysqli_close($con);
	$solicitudes=mysqli_num_rows($query);
	$activas=0;
	$finalizadas=0;
?>

<div class="d-flex justify-content-center text-center h4">Movilidades concluidas</div>
<?php if($finalizadas == 0) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad concluida</div>
<?php } else{ ?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-2 p-0 mb-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" >
					<thead>
						<tr>
							<th scope="col" class="text-center">ESTADO DE LA SOLICITUD</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">TIPO DE MOVILIDAD</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">PAIS DE ORIGEN</th>
							<th scope="col" class="text-center">UNIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">ENTIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
						</tr>
					</thead>
					<tbody>
		                    
		            </tbody>
					<tfoot>

					</tfoot>
				</table>
			</div>
		</div>
	</div>
<?php } ?>

<div class="d-flex justify-content-center text-center h4 mt-5">Movilidades autorizadas activas</div>
<?php if($activas == 0) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad autorizada activa</div>
<?php }else{ ?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-2 p-0 mb-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" >
					<thead>
						<tr>
							<th scope="col" class="text-center">ESTADO DE LA SOLICITUD</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">TIPO DE MOVILIDAD</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">PAIS DE ORIGEN</th>
							<th scope="col" class="text-center">UNIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">ENTIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
					<tfoot>
						
					</tfoot>
				</table>
			</div>
		</div>
	</div>
<?php } ?>

<div class="d-flex justify-content-center text-center h4 mt-5">Movilidades pendientes de autorización</div>
<?php if($solicitudes == 0) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad solicitada</div>
<?php } else {?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch mb-5 m-2 p-0">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" >
					<thead>
						<tr>
							<th scope="col" class="text-center">ESTADO DE LA SOLICITUD</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">TIPO DE MOVILIDAD</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">PAIS DE ORIGEN</th>
							<th scope="col" class="text-center">UNIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">ENTIDAD DE ORIGEN</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($qq = mysqli_fetch_array($query)) { 
							$solicitudes++;
						?>
	                        <tr>
	                            <th scope="row" class="text-center"> <?php echo estadoSolicitudTemporal($qq["ESTADO"]); ?> </th>
	                            <td class="text-center"> <?php echo $qq["PERIODO"]; ?> </td>
	                            <td class="text-center"> <?php echo tipoMovilidadAcademico($qq["TMA_ID"]); ?> </td>
	                            <td class="text-center"> <?php echo campus($qq["CAMPUS_ID"]); ?> </td>
	                            <td class="text-center"> <?php echo facultad($qq["CAMPUS_ID"],$qq["UNIDAD_ID"]); ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_PAIS"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_ENTIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_IDIOMA"]; ?> </td>
	                        </tr>
		                    <?php } ?>
					</tbody>
					<tfoot>
							
					</tfoot>
				</table>
			</div>
		</div>
	</div>
<?php } ?>