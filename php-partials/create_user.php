<?php
include "connect.php";

if (isset($_POST['btn_agregarUsuario_estudiante'])) {
    $redirect = false;

    //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
    $matricula = !empty($_POST['matricula']) ? "'" . mysqli_real_escape_string($con, $_POST['matricula']) . "'" : "NULL";
    $nombre = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
    $apellido1 = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
    $apellido2 = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
    $admin = !empty($_POST['tipo_usuario']) ? "'" . mysqli_real_escape_string($con, $_POST['tipo_usuario']) . "'" : "NULL";
    $email = !empty($_POST['correo']) ? "'" . mysqli_real_escape_string($con, $_POST['correo']) . "'" : "NULL";
    $password = !empty($_POST['password']) ?  mysqli_real_escape_string($con, $_POST['password']) : "NULL";
    $matri = "NULL";

    $hash = "'" .  password_hash($password, PASSWORD_DEFAULT) . "'";

    $sql = "INSERT INTO usuarios (id, apellido_paterno, apellido_materno, nombre, correo, password, admin, matricula) VALUES (${matricula}, ${apellido1}, ${apellido2}, ${nombre}, ${email}, ${hash}, ${admin}, ${matri})";

    if (mysqli_query($con, $sql)) {
        echo "El usuario fue agregado correctamente.";
        $redirect = true;
        $id = mysqli_insert_id($con);
    } else {
        echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../login.php ");
}
