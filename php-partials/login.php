<?php
    //abrimos la conexion a la BD e incluimos el fichero que ffcarga las pantalla de error
    require_once "connect.php";
    include("../Estaticos.php");

    // Define variables and initialize with empty values
    $email = "";
    $password = "";
    $email_err = "";
    $password_err = "";
    $login_err = "";

    // si se accedió desde una ruta incorrecta
    if (!isset($_POST['login'])) {
        mysqli_close($con);
        header("location: ../login.php");
        exit();
    }
     
    if (// verificar si el password o el email estan vacios
        empty($_POST["email"]) || 
        empty(trim($_POST["email"])) || 
        empty($_POST["email"]) || 
        empty(trim($_POST["password"]))
    ) {
        mysqli_close($con);
        echo "Por favor llene los campos de correo y/o contraseña.";
        exit();
    }

    //preparmamos la sentencia sql
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $sql = "SELECT correo, password, admin, apellido_paterno, apellido_materno, nombre, matricula FROM usuarios WHERE correo = ?";

    //comprobar si no hay errores al darle formato a la sentencia sql
    if (!($stmt = mysqli_prepare($con, $sql))) {
        mysqli_close($con);
        echo "Ocurrió un error al realizar la consulta. err-1";
        exit();
    }

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_email);

    // Set parameters
    $param_email = $email;

    //Si ocurre un problema al ejecutar la sentecnia
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_close($con);
        echo "Ocurrió un error al realizar la consulta. err-2";
        exit();
    }

    //si no hay exactamente un resultado entonces detenemos la ejecucicion 
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) !== 1){
        mysqli_close($con);
        echo "Correo y/o contraseña no valido(s) err-1";
        exit();
    }

    //obtenemos el resultado de la consulta
    mysqli_stmt_bind_result($stmt, $email, $hashed_password, $admin, $paterno, $materno, $nombre,$matricula);

    if (!mysqli_stmt_fetch($stmt)) {
        mysqli_close($con);
        echo "Ocurrió un error al realizar la consulta. err-4";
        exit();
    }

    //si la contraseña no coincide con la almacenada
    if (!password_verify($password, $hashed_password)) {
        mysqli_close($con);
        echo "Correo y/o contraseña no valido(s) err-2";
        exit();
    }

    //Si la sesion aún no se ha iniciado, entonces la iniciamos
    if(!isset($_SESSION)) { session_start(); }

    //guardamos las variables de sus datos del usuario
    $_SESSION["loggedin"] = true;
    $_SESSION["admin"] = $admin;
    $_SESSION["email"] = $email;
    $_SESSION["paterno"] = $paterno;
    $_SESSION["materno"] = $materno;
    $_SESSION["nombre"] = $nombre;
    $_SESSION['matricula'] = $matricula === null ? -1 : $matricula ;

    //Verificamos el tipo de credenciales del usuario para redirigirlo a la seccion apropiada
    if ($_SESSION["admin"] >= 7 && $_SESSION["admin"]<=10) {
        //usuario no administrativo
        mysqli_close($con);
        header("Location: ../usuario/Perfiles_no_administrativo.php");
       exit();     
    }
    else if ($_SESSION["admin"]>=1&&$_SESSION["admin"]<=5){
        //usuario administrativo
        mysqli_close($con);
        header("location: ../seleccion_modulos.php");
        exit();
    } else {
        //usuarios con credenciales no validas
        include("../Pantalla_Error.php");
        mysqli_close($con);
        PantallaError("public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",0);
        exit();
    }

    //ANTIGUO METODO SELFT PARA INICIAR SESIÓN
    /*
    <?php require ('autentificacion.php')?>
        <!--div class="d-flex justify-content-center  ">
            <div href="<?php echo $client->createAuthUrl()?>" class="btn btn-light pr-2 pl-4 pt-1 pb-1 shadow rounded align-self-center mt-5" id="btn_acceso_google" >  
                <div class="row d-flex ">
                    <img src="public/assets/gmail.svg" class=" " width="25" alt="">
                    <div class="col ml-1 text-center fw-bold" >Acceder con Google</div>
                </div>
            </div>
        </div-->
        <div class="d-flex justify-content-center  ">
            <div href="<?php echo $client->createAuthUrl()?>" class="btn btn-success w-30 mt-4 shadow " id="acceso_usuarios">
                <div class="row align-items-center" >
                    <div class="col-2 d-none d-md-block">
                        <img src="public/assets/logo_blanco.png" width="50" alt="">
                    </div>

                    <div class="col-12 col-md-10 text-center" >Acceso usuarios UABC</div>
                </div>
            </div>
        </div>

    <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger text-center">' . $login_err . '</div>';
        }
        ?>
    // Include config file
    require_once "php-partials/connect.php";

    // Define variables and initialize with empty values
    $email = $password = "";
    $email_err = $password_err = $login_err = "";

    //<!--?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?-->
    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Check if email is empty
        if (empty(trim($_POST["email"]))) {
            $email_err = "Por favor inserta tu correo.";
        } else {
            $email = trim($_POST["email"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Por favor inserta tu contraseña.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($email_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT correo, password, admin, apellido_paterno, apellido_materno, nombre, matricula FROM usuarios WHERE correo = ?";

            if ($stmt = mysqli_prepare($con, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                // Set parameters
                $param_email = $email;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if email exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $email, $hashed_password, $admin, $paterno, $materno, $nombre,$matricula);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                if(!isset($_SESSION)) 
                                { 
                                    session_start(); 
                                }

                                // Store data in session variables

                                $_SESSION["loggedin"] = true;
                                if ($admin) {
                                    $_SESSION["admin"] = $admin;
                                } else {
                                    $_SESSION["admin"] = false;
                                }
                                $_SESSION["email"] = $email;
                                $_SESSION["paterno"] = $paterno;
                                $_SESSION["materno"] = $materno;
                                $_SESSION["nombre"] = $nombre;
                                $_SESSION['matricula'] = $matricula === null ? -1 : $matricula ;


                                // Redirect user to welcome page
                                if ($_SESSION["admin"] >= 7 && $_SESSION["admin"]<=10) {
                                    header("Location: usuario/Perfiles_no_administrativo.php");
                                   exit();     
                                }
                                else if ($_SESSION["admin"]>=1&&$_SESSION["admin"]<=5){
                                    header("location: seleccion_modulos.php");
                                } else {
                                    //include("php-partials/pantallaError.php");
                                    include("Pantalla_Error.php");
                                    PantallaError("public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",0);
                                    exit();
                                }
                                     $login_err = "No se reconocen sus credenciales.";

                                }
                            } else {
                                // Password is not valid, display a generic error message
                                $login_err = "Correo o contraseña inválida.";
                            }
                        }else{
                            $login_err = "Correo o contraseña inválida.";
                        }
                    } else {
                        // email doesn't exist, display a generic error message
                        $login_err = "Correo o contraseña inválida.";

                    }
                } else {
                    echo "Ups. Algo salio mal, intentalo despues.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
    */
?>

