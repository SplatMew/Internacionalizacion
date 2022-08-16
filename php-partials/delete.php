<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../login.php");
    exit();
}
include "connect.php";



//borrar en tabla estudiantes de entrada
if ($_GET["tabla"] == "estudiante_entrada") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM estudiantes_entrada WHERE ESTUDIANTE_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Estudinate eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/entrada/consulta_estudiantes.php");
}

//borrar en tabla intercambios de entrada
if ($_GET["tabla"] == "intercambio_entrada") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM intercambio_estudiantil_entrada WHERE ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Intercambio eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/entrada/consulta_intercambios.php");
}
//borrar en tabla estudiantes de salida
if ($_GET["tabla"] == "estudiante_salida") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM estudiantes_salida WHERE ESTUDIANTE_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Estudinate eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/salida/consulta_estudiantes.php");
}

//borrar en tabla intercambios de salida
if ($_GET["tabla"] == "intercambio_salida") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM intercambio_estudiantil_salida WHERE ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Intercambio eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/salida/consulta_intercambios.php");
}
//borrar en tabla academicos de entrada
if ($_GET["tabla"] == "academicos_entrada") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM academicos_entrada WHERE VISITANTE_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Academico eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../academicos/entrada/consulta_academicos.php");
}
//borrar en tabla movilidades de entrada
if ($_GET["tabla"] == "movilidad_academica_entrada") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM movilidad_academica_entrada WHERE ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Movilidad eliminada correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../academicos/entrada/consulta_movilidades.php");
}
//borrar en tabla academicos de salida
if ($_GET["tabla"] == "academicos_salida") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM academicos_salida WHERE EMPLEADO_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Academico eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../academicos/salida/consulta_academicos.php");
}
//borrar en tabla movilidades de salida
if ($_GET["tabla"] == "movilidad_academica_salida") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM movilidad_academica_salida WHERE ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Movilidad eliminada correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../academicos/salida/consulta_movilidades.php");
}