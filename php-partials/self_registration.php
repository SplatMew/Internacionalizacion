<?php
//Todos los scripts que tienen que ver con la manipulacion los datos de autorregistro
include "connect.php";

//autorregistro estudiantes de entrada
if (isset($_POST['btn_agregar_entrada'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        // Attempt select query execution
        $sql = "SELECT * FROM intercambio_estudiantil_entrada_temporal WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {
                echo "Se puede hacer el registro";


                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";
                $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
                $campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
                $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
                $unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
                $period = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
                $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
                $unit_sending_name = !empty($_POST['unidad_emisora_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_nombre']) . "'" : "NULL";
                $unit_sending_country = !empty($_POST['unidad_emisora_pais']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_pais']) . "'" : "NULL";
                $unit_sending_state = !empty($_POST['unidad_emisora_entidad']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_entidad']) . "'" : "NULL";
                $unit_sending_language = !empty($_POST['unidad_emisora_idioma']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_idioma']) . "'" : "NULL";
                $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
                $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
                $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
                $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";
                $finan_recived = !empty($_POST['finan_recibio']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_recibio']) . "'" : "NULL";
                $finan_amount = !empty($_POST['finan_monto']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_monto']) . "'" : "NULL";
                $date_initial = !empty($_POST['fecha_inicial']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'" : "NULL";
                $date_terminal = !empty($_POST['fecha_terminal']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'" : "NULL";


                $sql = "INSERT INTO intercambio_estudiantil_entrada_temporal (ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
                SEXO_ID, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA, PERIODO_ID, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD, 
                NIVEL_ID, PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, UNID, UNID_PAIS, UNID_ENTIDAD, UNID_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${id}, ${name}, ${paternal}, ${maternal}, ${sex}, ${handicap}, ${tongue}, ${origin}, 
                ${period}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${level}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
                ${unit_sending_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";

                if (mysqli_query($con, $sql)) {
                    echo "Records inserted successfully.";
                    $redirect = true;
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, ya esta en uso la matricula/id.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../../php-partials/logout.php");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//autorregistro estudiantes de salida
if (isset($_POST['btn_agregar_salida'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = mysqli_real_escape_string($con, $_POST['matricula']);

        // Attempt select query execution
        $sql = "SELECT * FROM intercambio_estudiantil_salida_temporal WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {
                echo "Se puede hacer el registro";


                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";
                $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
                $campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
                $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
                $unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
                $period = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
                $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
                $unit_receiving_name = !empty($_POST['unidad_reseptora_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_nombre']) . "'" : "NULL";
                $unit_receiving_country = !empty($_POST['unidad_reseptora_pais']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_pais']) . "'" : "NULL";
                $unit_receiving_state = !empty($_POST['unidad_reseptora_entidad']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_entidad']) . "'" : "NULL";
                $unit_receiving_language = !empty($_POST['unidad_reseptora_idioma']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_idioma']) . "'" : "NULL";
                $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
                $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
                $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
                $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";
                $finan_recived = !empty($_POST['finan_recibio']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_recibio']) . "'" : "NULL";
                $finan_amount = !empty($_POST['finan_monto']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_monto']) . "'" : "NULL";
                $date_initial = !empty($_POST['fecha_inicial']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'" : "NULL";
                $date_terminal = !empty($_POST['fecha_terminal']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'" : "NULL";


                $sql = "INSERT INTO intercambio_estudiantil_salida_temporal (ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
                SEXO_ID, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA, PERIODO_ID, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD, 
                NIVEL_ID, PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, UNID, UNID_PAIS, UNID_ENTIDAD, UNID_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${id}, ${name}, ${paternal}, ${maternal}, ${sex}, ${handicap}, ${tongue}, ${origin}, 
                ${period}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${level}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name}, ${unit_receiving_name}, ${unit_receiving_country}, ${unit_receiving_state}, 
                ${unit_receiving_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";

                if (mysqli_query($con, $sql)) {
                    echo "Records inserted successfully.";
                    $redirect = true;
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    exit();
                }
            } else {
                echo "No se puede hacer el registro, ya esta en uso la matricula/id.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../login.php");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}


//DE AQUI PARA ABAJO SOLO LO PUEDE HACER UN ADMINISTRADOR

//Si no estas loggeado te manda a la pagina login
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../login.php");
    exit();
}

//aplicar autorregistro del estudiante de entrada a la tabla principal
if (isset($_POST['btn_aplicar_entrada'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = $_POST['identificador'];

        // Attempt select query execution
        $sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {

                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $gender = !empty($_POST['sexo_noBinario']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo_noBinario']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";

                $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
                $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
                $campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
                $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
                $unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
                $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
                $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
                $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
                $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";

                $sql = "INSERT INTO estudiantes_entrada (ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
                SEXO_ID, SEXO, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA, NIVEL_ID, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD,
                 PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA) VALUES (${id}, ${name}, ${paternal}, ${maternal}, 
                ${sex}, ${gender}, ${handicap}, ${tongue}, ${origin}, ${level}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name})";

                if (mysqli_query($con, $sql)) {
                    echo "Records inserted successfully.";
                    $redirect = true;
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    exit();
                }
            }

            $period = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
            $unit_sending_name = !empty($_POST['unidad_emisora_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_nombre']) . "'" : "NULL";
            $unit_sending_country = !empty($_POST['unidad_emisora_pais']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_pais']) . "'" : "NULL";
            $unit_sending_state = !empty($_POST['unidad_emisora_entidad']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_entidad']) . "'" : "NULL";
            $unit_sending_language = !empty($_POST['unidad_emisora_idioma']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_idioma']) . "'" : "NULL";
            $finan_recived = !empty($_POST['finan_recibio']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_recibio']) . "'" : "NULL";
            $finan_amount = !empty($_POST['finan_monto']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_monto']) . "'" : "NULL";
            $date_initial = !empty($_POST['fecha_inicial']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'" : "NULL";
            $date_terminal = !empty($_POST['fecha_terminal']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'" : "NULL";

            $sql = "INSERT INTO intercambio_estudiantil_entrada (ESTUDIANTE_ID, PERIODO_ID, UE, UE_PAIS, UE_ENTIDAD, UE_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${matricula}, ${period}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
                ${unit_sending_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";



            if (mysqli_query($con, $sql)) {
                echo "Records inserted successfully.";
                $redirect = true;
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                exit();
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            exit();
        }

        //se borra el registro de la tabla temporal (autorregistrado)
        $sql = "DELETE FROM intercambio_estudiantil_entrada_temporal WHERE ESTUDIANTE_ID = ${id} ";
        if (mysqli_query($con, $sql)) {
            echo "Records deleted successfully.";
            $redirect = true;
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            exit();
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            //header("location: ../update.php?id=${id}");
            header("location: ../estudiantes/entrada/consulta_estudiantes.php");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}


//aplicar autorregistro del estudiante de entrada a la tabla principal
if (isset($_POST['btn_aplicar_salida'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = $_POST['matricula'];

        // Attempt select query execution
        $sql = "SELECT * FROM estudiantes_salida WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {

                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";

                $sql = "INSERT INTO estudiantes_salida (ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
                SEXO_ID, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA) VALUES (${id}, ${name}, ${paternal}, ${maternal}, 
                ${sex}, ${handicap}, ${tongue}, ${origin})";

                if (mysqli_query($con, $sql)) {
                    echo "Records inserted successfully.";
                    $redirect = true;
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    exit();
                }
            }

            $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
            $campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
            $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
            $unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
            $period = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
            $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
            $unit_receiving_name = !empty($_POST['unidad_reseptora_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_nombre']) . "'" : "NULL";
            $unit_receiving_country = !empty($_POST['unidad_reseptora_pais']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_pais']) . "'" : "NULL";
            $unit_receiving_state = !empty($_POST['unidad_reseptora_entidad']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_entidad']) . "'" : "NULL";
            $unit_receiving_language = !empty($_POST['unidad_reseptora_idioma']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_reseptora_idioma']) . "'" : "NULL";
            $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
            $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
            $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
            $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";
            $finan_recived = !empty($_POST['finan_recibio']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_recibio']) . "'" : "NULL";
            $finan_amount = !empty($_POST['finan_monto']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_monto']) . "'" : "NULL";
            $date_initial = !empty($_POST['fecha_inicial']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'" : "NULL";
            $date_terminal = !empty($_POST['fecha_terminal']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'" : "NULL";


            $sql = "INSERT INTO intercambio_estudiantil_salida (ESTUDIANTE_ID, PERIODO_ID, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD, 
                NIVEL_ID, PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, UR, UR_PAIS, UR_ENTIDAD, UR_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${id}, ${period}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${level}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name}, ${unit_receiving_name}, ${unit_receiving_country}, ${unit_receiving_state}, 
                ${unit_receiving_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";



            if (mysqli_query($con, $sql)) {
                echo "Records inserted successfully.";
                $redirect = true;
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                exit();
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            exit();
        }

        //se borra el registro de la tabla temporal (autorregistrado)
        $sql = "DELETE FROM intercambio_estudiantil_salida_temporal WHERE ESTUDIANTE_ID = ${id} ";
        if (mysqli_query($con, $sql)) {
            echo "Records deleted successfully.";
            $redirect = true;
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            exit();
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            //header("location: ../update.php?id=${id}");
            header("location: ../estudiantes/salida/consulta_estudiantes.php");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}


//rechazar/elimiar autorregistro de estuidiante de entrada
if ($_GET["tabla"] == "entrada") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM intercambio_estudiantil_entrada_temporal WHERE ESTUDIANTE_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Autorregistro eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/entrada/consulta_temporal.php");
}

//rechazar/elimiar autorregistro de estuidiante de salida
if ($_GET["tabla"] == "salida") {
    $redirect = false;
    $id = mysqli_real_escape_string($con, $_GET["id"]);
    $sql = "DELETE FROM intercambio_estudiantil_salida_temporal WHERE ESTUDIANTE_ID = ${id} ";

    if (mysqli_query($con, $sql)) {
        echo "Autorregistro eliminado correctamente.";
        $redirect = true;
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/salida/consulta_temporal.php");
}
