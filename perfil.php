<?php
require_once "php-partials/auth.php";

if($_SESSION['admin']<=0||$_SESSION['admin']>=6){

	include("Pantalla_Error.php");
	PantallaError("public/assets/UABC_crop.png","ACCESO RESTRINGIDO","Usted no cuenta con permiso para estar en esta página.",0);
	exit();
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Sistema Internacionalización</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/style.css">
	<style type="text/css">
		body{
            background: #00723e;
        }
		#fondo_principal{
					background: linear-gradient(to bottom,#cacaca, #eaeaea, #f3f4f5, #ffffff, #ffffff);
			}
		#sidebar{
					background: #00723e;
			}
		#sidebarCollapse{
			background: #df9717;
			border-color: #df9717;
			/* Arriba | Derecha | Abajo | Izquierda */
			margin: 0px 5px 0px 5px;
		}
		a{
			font-weight: 500;
		}
		#mapa_sitio{
			box-shadow: 0px 5px 15px #aeaeae; border-radius: 8px;
		}
		i{
			color: white;
		}

	</style>
</head>

<body>

	<div class="d-flex justify-content-center">

		<div class="col-sm-6 d-flex flex-column align-items-center justify-content-center mt-5 mb-5 ml-2 mr-2 pt-5 pb-5 pl-2 pr-2  shadow bg-white rounded shadow" >
			<img src="public/assets/UABC_crop.png" alt="" width=100px height="138px" class="mb-5" >
			
			<span class="border border-dark border-right-0 border-top-0 border-left-0 ">
				<h3 class="text-dark text-center mb-0">Mi información</h3><h6 class="text-dark text-center mb-3">Usuario con permisos administrativos</h6>
			</span>

			<div class="dropdown-divider "></div>
				
			<h4 class="text-dark text-center"><?php echo  $_SESSION['nombre'];?> <?php echo  $_SESSION['paterno'] ;?> <?php echo  $_SESSION['materno'] ;?></h4>
				
			<h5 id="correo" class="text-dark text-center"><?php echo  $_SESSION['email'];?></h5>
			<span class="border border-dark border-right-0 border-left-0 border-bottom-0 mt-3">
				<h4 class="text-dark text-center mt-2"> 
					<?php 
						if($_SESSION['admin']===1){echo "Administrador unidad Mexicali";}
							else if($_SESSION['admin']===2){
								echo "Administrador unidad Tijuana";
							}else if($_SESSION['admin']===3){
								echo "Administrador unidad Ensenada";
							}else if($_SESSION['admin']===4){
								echo "Administrador general";
							}else{
								echo "Super usuario";
							}
					?>
				</h4>
			</span>
		</div>
	</div>

	</div>
	
</div>
</body>


	<script src="../../public/js/jquery.min.js"></script>
	<script src="../../public/js/popper.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/main.js"></script>

	<!-- Font Awesome JS -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
      integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
      crossorigin="anonymous"
    ></script>
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
      integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
      crossorigin="anonymous"
    ></script>


</body>

</html>