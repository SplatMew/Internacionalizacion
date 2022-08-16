<?php
//Si no estas loggeado te manda a la pagina login
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../../login.php");
    exit();
}
