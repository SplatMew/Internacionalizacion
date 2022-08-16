<?php
include "connect.php";

/* User'. */
$apellido1 = '';
$apellido2 = '';
$nombre = '';
$email = '';
$password = '';

//Administrador Mexicali = 1
//Administrador Tijuana = 2
//Administrador Ensenada = 3
//Administrador General = 4
//Super Usuario = 5
$admin = 5;

/* Secure password hash. */
$hash = password_hash($password, PASSWORD_DEFAULT);

$q = "insert into usuarios (apellido_paterno, apellido_materno, nombre, correo, password, admin) values ('${apellido1}', '${apellido2}', '${nombre}', '${email}', '${hash}', ${admin})";
mysqli_query($con, $q);
header("location:../login.php");
exit;
