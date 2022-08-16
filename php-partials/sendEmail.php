<?php
	//Hay que agregar un query qu permita verificar si el correo recibido está asociado a un usuario existente.
	if(isset($_POST['enviarmail'])){
		
		if(!empty($_POST['email'])){
			$mail = $_POST['email'];
			$msj = "Se ha solicitado la recuperación de su contraseña en el sitio sistema de internacionalización, si usted no ha solicitado esta información por favor repórtenoslo.";
			$asunto = "Recuperación de contraseña";
			$header = "From: noreply@SistemaInternacionalizacion.com" . "\r\n";
			$header.="Reply-To: noreply@SistemaInternacionalizacion.com" . "\r\n";
			$header.= "X-Mailer: PHP/" . phpversion();
			$email= @mail($mail, $asunto, $msj, $header);

			if($email){
				echo "<h4> Se envió correctamente su solicitud </h4>";
			}
		}
	}
?>