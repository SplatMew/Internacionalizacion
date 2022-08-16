<?php 
	include("consultas.php");
	include("PantallaErrorCrearUsiaro.php");
	include "connect.php";

	//comprobacion de que no hya campos vacíos
	if (empty($_POST['matricula']) || 
		empty($_POST['correo']) ||
		empty($_POST['password']) ||
        empty($_POST['passwordConfirm']) ||
		empty($_POST['nombre']) ||
		empty($_POST['paterno']) ||
		empty($_POST['materno']) ||
		empty($_POST['sexo']) ||
		empty($_POST['discapacidad']) ||
		empty($_POST['lengua_indigena']) ||
		empty($_POST['origen_indigena'])
	){
		mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Uno o más campos del formulario no fueron completados, para solicitar la movilidad es necesario llenar todos los campos del formulario",0);
        exit();
	}

    //verifficams que las contraseñas coincidan desde el backend
    if($_POST['password']!==$_POST['passwordConfirm']){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Las contraseñas no coinciden, verifique que el texto ingresado para la contraseña sea idéntico al que ingresó en el campo de verificar contraseña.",0);
        exit();
    }

	//comprobamos que el usuario existe
	$visitante_id = mysqli_real_escape_string($con, $_POST['matricula']);
	$correo = mysqli_real_escape_string($con, $_POST['correo']);
	$sql = "SELECT * FROM usuarios WHERE matricula=${visitante_id} OR correo='${correo}'";

	//Si ocurre un error durante la consulta avisamos
    if (!($result = mysqli_query($con, $sql))){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial. - Error 2 -",0);
        exit();
    }

    //Si ya existe un usuario asociado a esa matricula o correodetenmos la ejecución
    if(mysqli_num_rows($result) !== 0){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Los datos proporcionados son incorrectos. - Error 3 -",0);
        exit();
    }

    //creamos el perfil en la tabla usuarios para que pueds acceder iniciando sesión
    require("RegistroNuevoUsuario.php");
    if(!AddNewUserNOADMIN($_POST,$con,9)){
    	mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial. - Error 4 -",0);
        exit();
    }

    //limpiamos los datos de los formularios para evitar inyeccion-sql
    $visitante = "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'";
    $visitante_apellido1 = "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'";
    $visitante_apellido2 = "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'";
    $sexo_id =mysqli_real_escape_string($con, $_POST['sexo']);
    $sexo = "'".sexo($sexo_id)."'";
    $discapacidad = mysqli_real_escape_string($con, $_POST['discapacidad']);
    $hablante_indigena =  mysqli_real_escape_string($con, $_POST['lengua_indigena']);
    $origen_indigena = mysqli_real_escape_string($con, $_POST['origen_indigena']);

    //armalos la sentencia de inserción
    $sql = "INSERT INTO perfil_estudiantes_entrada (
    	VISITANTE_ID, VISITANTE, VISITANTE_APELLIDO1, VISITANTE_APELLIDO2,
	    SEXO_ID, SEXO, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA
	    ) VALUES (
	    ${visitante_id}, ${visitante}, ${visitante_apellido1}, ${visitante_apellido2}, 
	    ${sexo_id}, ${sexo}, ${discapacidad}, ${hablante_indigena}, ${origen_indigena})";

	 //ejecutamos la sentencia de inserción
    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","OPERACIÓN EXITOSA","Su perfil de estudiante visitante fue creado exitosamente en el sistema de internacionalización, ahora puede acceder utilizando su correo y contraseña en la página de inicio.",0);
    } else {
    	mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL CREAR SU PERFIL","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial. - Error 5 -",0);
        exit();
    }
?>