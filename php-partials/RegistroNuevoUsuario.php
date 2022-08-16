<?php

//Esta funcion solo debe ser llamada cuando hay una conexion abierta en la base de datos
function AddNewUserNOADMIN($array,$con,$tipo ){

    //Si recibimos un valor nulo o incosnsistente para el tipo de usuario retornamos nulo
    if($tipo===null || $tipo > 10 || $tipo < 1 || $tipo == 6 ){
        return false;
    }
    //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
    $matricula = !empty($array['matricula']) ? "'" . mysqli_real_escape_string($con, $array['matricula']) . "'" : "NULL";
    $nombre = !empty($array['nombre']) ? "'" . mysqli_real_escape_string($con, $array['nombre']) . "'" : "NULL";
    $apellido1 = !empty($array['paterno']) ? "'" . mysqli_real_escape_string($con, $array['paterno']) . "'" : "NULL";
    $apellido2 = !empty($array['materno']) ? "'" . mysqli_real_escape_string($con, $array['materno']) . "'" : "NULL";
    $admin = !empty($tipo) ? "'" . mysqli_real_escape_string($con, $tipo) . "'" : "NULL";
    $email = !empty($array['correo']) ? "'" . mysqli_real_escape_string($con, $array['correo']) . "'" : "NULL";
    $password = !empty($array['password']) ?  mysqli_real_escape_string($con, $array['password']) : "NULL";
    $hash = "'" .  password_hash($password, PASSWORD_DEFAULT) . "'";
    

    $sql = "INSERT INTO usuarios (apellido_paterno, apellido_materno, nombre, correo, password, admin,matricula) VALUES (${apellido1}, ${apellido2}, ${nombre}, ${email}, ${hash}, ${admin}, ${matricula})";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
    

?>