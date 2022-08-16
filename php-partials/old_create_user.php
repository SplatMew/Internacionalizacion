<?php
include "connect.php";

/* User'. */
$apellido1 = 'Alaska';
$apellido2 = 'Dinarama';
$nombre = 'Morty';
$email = 'atacante2@uabc.edu.mx';
$password = 'Motoride';
$matricula = 360121;

//Administrador Mexicali = 1
//Administrador Tijuana = 2
//Administrador Ensenada = 3
//Administrador General = 4
//Super Usuario = 5
//Usuario no administrativo = 10
$admin = 6;

/* Secure password hash. */
$hash = password_hash($password, PASSWORD_DEFAULT);

$q = "insert into usuarios (apellido_paterno, apellido_materno, nombre, correo, password, admin, matricula) values ('${apellido1}', '${apellido2}', '${nombre}', '${email}', '${hash}', ${admin}, ${matricula})";
mysqli_query($con, $q);
header("location:../login.php");
exit;
