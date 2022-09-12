<?php
require_once "../../php-partials/auth.php";
include "../../php-partials/connect.php";
if($_SESSION['admin'] >= 7 && $_SESSION['admin'] <= 10){
    switch($_SESSION['admin']){
        case 7:
            $sql = "SELECT * FROM movilidad_academica_entrada_temporal where VISITANTE_ID  == " + $_SESSION['matricula'];
        break;
        case 8:
            $sql = "SELECT * FROM movilidad_academica_salida_temporal where EMPLEADO_ID  == " + $_SESSION['matricula'];
        break;
        case 9:
            $sql = "SELECT * FROM intercambio_estudiantil_entrada_temporal where ESTUDIANTE_ID  == " + $_SESSION['matricula'];
        break;
        case 10:
            $sql = "SELECT * FROM intercambio_estudiantil_entrada_temporal where ESTUDIANTE_ID  == " + $_SESSION['matricula'];
        break;
    }
}else{
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}
if ($query = mysqli_query($con, $sql)) {
	//$res = mysqli_fetch_array($query);
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
	<link rel="stylesheet" href="../../public/css/coloresOficiales.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
		<!-- SUBMENU COLAPSABLE -->
		<?php require "lateralEstudiantesSalida.php"; ?>

		<!-- Page Content  -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
			<?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Salida > Consultar Estudiantes","../../public/assets/UABC_crop.png");
		    ?>

		    <!-- zona scrollable par dispositivos de pantallas pequeñas -->
            <div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-5">
                <div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
                    <div class="overflow-auto align-self-stretch  m-0 p-0 ">
                        <table id="tablita" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                            <th scope="col">MATRICULA</th>
                                    <tr>
			                        <th scope="col">APELLIDO PATERNO</th>
			                        <th scope="col">APELLIDO MATERNO</th>
			                        <th scope="col">NOMBRE</th>
			                        <th scope="col">SEXO</th>
			                        <th scope="col">DISCAPACIDAD</th>
			                        <th scope="col">LENGUA INDIGENA</th>
			                        <th scope="col">ORIGEN INDIGENA</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    while($qq = mysqli_fetch_array($query)){?>

<tr>
			                            <th scope="row"> <?php echo $qq["ESTUDIANTE_ID"]; ?> </th>
			                            <td> <?php echo $qq["ESTUDIANTE_APELLIDO1"]; ?> </td>
			                            <td> <?php echo $qq["ESTUDIANTE_APELLIDO2"]; ?> </td>
			                            <td> <?php echo $qq["ESTUDIANTE"]; ?> </td>

			                            <td>
			                                <!-- Sexo -->
			                                <?php if ($qq["SEXO_ID"] == '1') echo "Femenino" ?>
			                                <?php if ($qq["SEXO_ID"] == '2') echo "Masculino"; ?>
			                                <?php //if ($qq["SEXO_ID"] == '3') echo "No Binario"; ?>
			                            </td>
			                            <td>
			                                <!-- Discapacidad -->
			                                <?php if ($qq["DISCAPACIDAD"] == '1') echo "Si"; ?>
			                                <?php if ($qq["DISCAPACIDAD"] == '2') echo "No"; ?>
			                                
			                            </td>
			                            <td>
			                                <!-- Hablante indigena -->
			                                <?php if ($qq["HABLANTE_INDIGENA"] == '1') echo "Si"; ?>
			                                <?php if ($qq["HABLANTE_INDIGENA"] == '2') echo "No"; ?>
			                            </td>
			                            <td>
			                                <!-- origen Indigena -->
			                                <?php if ($qq["ORIGEN_INDIGENA"] == '1') echo "Si"; ?>
			                                <?php if ($qq["ORIGEN_INDIGENA"] == '2') echo "No"; ?>
			                            </td>

			                        </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>