<?php
//si no estas loggeado te manda al login
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../login.php");
    exit();
}
include "connect.php";

/*
 *
 *  SCRIPTS PARA AGREGAR
 *  ESTUDIANTES E INTERCAMBIOS
 *  A LA BASE DE DATOS
 *
*/

//ESTUDIANTES
//    DE
//  ENTRADA

//agregar un nuevo estudiante de entrada
if (isset($_POST['btn_agregarEstudiante_entrada'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = mysqli_real_escape_string($con, $_POST['matricula']);

        $sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {
                require("RegistroNuevoUsuario.php");
                if(AddNewUserNOADMIN($_POST,$con)){
                    $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                    $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                    $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                    $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                    $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                    $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                    $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";

                    $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
                    $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
                    //$campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
                    $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
                    //$unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
                    $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
                    $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
                    $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
                    $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";

                    $sql = "INSERT INTO estudiantes_entrada (ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
                    SEXO, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA, NIVEL_ID, CAMPUS_ID, UNIDAD_ID,
                     PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA) VALUES (${id}, ${name}, ${paternal}, ${maternal}, 
                    ${sex}, ${handicap}, ${tongue}, ${origin}, ${level}, ${campus_code}, ${unit_code}, ${program_code}, ${program_name}, 
                    ${area_code}, ${area_name})";


                    if (mysqli_query($con, $sql)) {
                        echo "El estudiante fue agregado correctamente.";
                        $redirect = true;
                    } else {
                        echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                    }
                }else{
                    echo "No se puede hacer el registro.";
                }
                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                
            } else {
                echo "No se puede hacer el registro, ya esta en uso la matricula/id.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }
        mysqli_close($con);
        if ($redirect){
            if(!isset($_SESSION)) 
            { 
                header("location: login.php");
            }else{
                header("location: ../estudiantes/entrada/consulta_estudiantes.php");
            }
            
        } 
            
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//agregar un nuevo intercambio de entrada
if (isset($_POST['btn_agregarIntercambio_entrada'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $matricula = mysqli_real_escape_string($con, $_POST['matricula']);

        $sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID=${matricula}";
        if ($result = mysqli_query($con, $sql)) {
            //Si existe un estudiante con la matricula del intercambio que se quiere registrar
            if (mysqli_num_rows($result) === 1) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL

                $period = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
                $unit_sending_name = !empty($_POST['unidad_emisora_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_nombre']) . "'" : "NULL";
                $unit_sending_country = !empty($_POST['unidad_emisora_pais']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_pais']) . "'" : "NULL";
                $unit_sending_state = !empty($_POST['unidad_emisora_entidad']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_entidad']) . "'" : "NULL";
                $unit_sending_language = !empty($_POST['unidad_emisora_idioma']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_idioma']) . "'" : "NULL";
                $finan_recived = !empty($_POST['finan_recibio']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_recibio']) . "'" : "NULL";
                $finan_amount = !empty($_POST['finan_monto']) ? "'" . mysqli_real_escape_string($con, $_POST['finan_monto']) . "'" : "NULL";
                $date_initial = !empty($_POST['fecha_inicial']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'" : "NULL";
                $date_terminal = !empty($_POST['fecha_terminal']) ? "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'" : "NULL";

                /*
                $level = !empty($_POST['nivel']) ? "'" . mysqli_real_escape_string($con, $_POST['nivel']) . "'" : "NULL";
                $campus_code = !empty($_POST['campus_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_clave']) . "'" : "NULL";
                $campus_name = !empty($_POST['campus_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['campus_nombre']) . "'" : "NULL";
                $unit_code = !empty($_POST['unidad_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_clave']) . "'" : "NULL";
                $unit_name = !empty($_POST['unidad_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['unidad_nombre']) . "'" : "NULL";
                $program_code = !empty($_POST['programa_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_clave']) . "'" : "NULL";
                $program_name = !empty($_POST['programa_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'" : "NULL";
                $area_code = !empty($_POST['area_clave']) ? "'" . mysqli_real_escape_string($con, $_POST['area_clave']) . "'" : "NULL";
                $area_name = !empty($_POST['area_nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'" : "NULL";

                $sql = "INSERT INTO intercambio_estudiantil_entrada (ESTUDIANTE_ID, PERIODO_ID, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD, 
                NIVEL_ID, PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, UE, UE_PAIS, UE_ENTIDAD, UE_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${matricula}, ${period}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${level}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
                ${unit_sending_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";
                */

                $sql = "INSERT INTO intercambio_estudiantil_entrada (ESTUDIANTE_ID, PERIODO_ID, UE, UE_PAIS, UE_ENTIDAD, UE_IDIOMA, FINAN_ID, FINAN_VAL,
                DATE_START, DATE_END) VALUES (${matricula}, ${period}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
                ${unit_sending_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";

                if (mysqli_query($con, $sql)) {
                    echo "Intercambio agregado correctamente.";
                    //id del intercambio que acaba de ser agregado
                    $id = mysqli_insert_id($con);
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, la matricula/id no existe.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/entrada/actualizar_intercambio.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//ESTUDIANTES
//    DE
//  SALIDA

//agregar un nuevo estudiante de salida
if (isset($_POST['btn_agregarEstudiante_salida'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = mysqli_real_escape_string($con, $_POST['matricula']);

        $sql = "SELECT * FROM estudiantes_salida WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
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
                    echo "El estudiante fue agregado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, ya esta en uso la matricula/id.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/salida/actualizar_estudiante.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//agregar un nuevo intercambio de salida
if (isset($_POST['btn_agregarIntercambio_salida'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $matricula = mysqli_real_escape_string($con, $_POST['matricula']);

        $sql = "SELECT * FROM estudiantes_salida WHERE ESTUDIANTE_ID=${matricula}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
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
                DATE_START, DATE_END) VALUES (${matricula}, ${period}, ${campus_code}, ${campus_name}, ${unit_code}, ${unit_name}, ${level}, ${program_code}, ${program_name}, 
                ${area_code}, ${area_name}, ${unit_receiving_name}, ${unit_receiving_country}, ${unit_receiving_state}, 
                ${unit_receiving_language}, ${finan_recived}, ${finan_amount}, ${date_initial}, ${date_terminal})";

                if (mysqli_query($con, $sql)) {
                    echo "Intercambio agregado correctamente.";
                    //id del intercambio que acaba de ser agregado
                    $id = mysqli_insert_id($con);
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, la matricula/id no existe.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/salida/actualizar_intercambio.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

/*
 *
 *  SCRIPTS PARA AGREGAR
 *  ACADEMICOS Y MOVILIDADES
 *  A LA BASE DE DATOS
 *
*/

//ACADEMICOS
//    DE
// ENTRADA

//agregar un nuevo academico de entrada
if (isset($_POST['btn_agregarAcademico_entrada'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        $sql = "SELECT * FROM academicos_entrada WHERE VISITANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $level = !empty($_POST['nivelestudios']) ? "'" . mysqli_real_escape_string($con, $_POST['nivelestudios']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['habindigena']) ? "'" . mysqli_real_escape_string($con, $_POST['habindigena']) . "'" : "NULL";
                $origin = !empty($_POST['orindigena']) ? "'" . mysqli_real_escape_string($con, $_POST['orindigena']) . "'" : "NULL";

                $sql = "INSERT INTO academicos_entrada (VISITANTE_ID, VISITANTE, VISITANTE_APELLIDO1, VISITANTE_APELLIDO2,
                SEXO_ID, NIVEL_ID, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA) VALUES (${id}, ${name}, ${paternal}, ${maternal}, 
                ${sex}, ${level},${handicap}, ${tongue}, ${origin})";

                if (mysqli_query($con, $sql)) {
                    echo "El academico fue agregado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, ya esta en uso la id.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/entrada/actualizar_academico.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}

//agregar una nueva movilidad de entrada
if (isset($_POST['btn_agregarMovilidad_entrada'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        $sql = "SELECT * FROM academicos_entrada WHERE VISITANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            //Si existe un academico con el identificador de la movilidad que se quiere registrar
            if (mysqli_num_rows($result) === 1) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $campus_code = !empty($_POST['campusreceptor']) ? "'" . mysqli_real_escape_string($con, $_POST['campusreceptor']) . "'" : "NULL";

                $unit_code = !empty($_POST['unidadreceptora']) ? "'" . mysqli_real_escape_string($con, $_POST['unidadreceptora']) . "'" : "NULL";

                $period = !empty($_POST['periodoescolar']) ? "'" . mysqli_real_escape_string($con, $_POST['periodoescolar']) . "'" : "NULL";
                $unit_sending_name = !empty($_POST['unidademisora']) ? "'" . mysqli_real_escape_string($con, $_POST['unidademisora']) . "'" : "NULL";
                $unit_sending_country = !empty($_POST['paisorigen']) ? "'" . mysqli_real_escape_string($con, $_POST['paisorigen']) . "'" : "NULL";
                $unit_sending_state = !empty($_POST['entidademisora']) ? "'" . mysqli_real_escape_string($con, $_POST['entidademisora']) . "'" : "NULL";
                $unit_sending_language = !empty($_POST['idiomasdominados']) ? "'" . mysqli_real_escape_string($con, $_POST['idiomasdominados']) . "'" : "NULL";
                $type = !empty($_POST['tipomovilidad']) ? "'" . mysqli_real_escape_string($con, $_POST['tipomovilidad']) . "'" : "NULL";

                $sql = "INSERT INTO movilidad_academica_entrada (VISITANTE_ID, PERIODO_ID, CAMPUS_ID, UNIDAD_ID, UE, UE_PAIS, UE_ENTIDAD, 
                UE_IDIOMA, TMA_ID) VALUES (${id}, ${period}, ${campus_code}, ${unit_code}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
                ${unit_sending_language}, ${type})";

                if (mysqli_query($con, $sql)) {
                    echo "Movilidad agregado correctamente.";
                    //id del Movilidad que acaba de ser agregado
                    $id = mysqli_insert_id($con);
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, la id no existe.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/entrada/actualizar_movilidad.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}

//ACADEMICOS
//    DE
//  SALIDA

//agregar un nuevo academico de salida
if (isset($_POST['btn_agregarAcademico_salida'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        $sql = "SELECT * FROM academicos_salida WHERE EMPLEADO_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 0) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";

                $sql = "INSERT INTO academicos_salida (EMPLEADO_ID, EMPLEADO, EMPLEADO_APELLIDO1, EMPLEADO_APELLIDO2,
                SEXO_ID) VALUES (${id}, ${name}, ${paternal}, ${maternal}, 
                ${sex})";

                if (mysqli_query($con, $sql)) {
                    echo "El academico fue agregado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, ya esta en uso la id.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/salida/actualizar_academico.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}

//agregar una nueva movilidad de salida
if (isset($_POST['btn_agregarMovilidad_salida'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        $sql = "SELECT * FROM academicos_salida WHERE EMPLEADO_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            //Si existe un academico con el identificador de la movilidad que se quiere registrar
            if (mysqli_num_rows($result) === 1) {

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $campus_code = !empty($_POST['campusemisor']) ? "'" . mysqli_real_escape_string($con, $_POST['campusemisor']) . "'" : "NULL";

                $unit_code = !empty($_POST['unidademisora']) ? "'" . mysqli_real_escape_string($con, $_POST['unidademisora']) . "'" : "NULL";

                $period = !empty($_POST['periodoescolar']) ? "'" . mysqli_real_escape_string($con, $_POST['periodoescolar']) . "'" : "NULL";
                $unit_receiving_name = !empty($_POST['unidadreceptora']) ? "'" . mysqli_real_escape_string($con, $_POST['unidadreceptora']) . "'" : "NULL";
                $unit_receiving_country = !empty($_POST['paisreceptor']) ? "'" . mysqli_real_escape_string($con, $_POST['paisreceptor']) . "'" : "NULL";
                $unit_receiving_state = !empty($_POST['entidadreceptora']) ? "'" . mysqli_real_escape_string($con, $_POST['entidadreceptora']) . "'" : "NULL";
                $unit_receiving_language = !empty($_POST['idiomasdominados']) ? "'" . mysqli_real_escape_string($con, $_POST['idiomasdominados']) . "'" : "NULL";
                $type = !empty($_POST['tipomovilidad']) ? "'" . mysqli_real_escape_string($con, $_POST['tipomovilidad']) . "'" : "NULL";

                $sql = "INSERT INTO movilidad_academica_salida (EMPLEADO_ID, PERIODO_ID, CAMPUS_ID, UNIDAD_ID, UR, UR_PAIS, UR_ENTIDAD, 
                UR_IDIOMA, TMA_ID) VALUES (${id}, ${period}, ${campus_code}, ${unit_code}, ${unit_receiving_name}, ${unit_receiving_country}, ${unit_receiving_state}, 
                ${unit_receiving_language}, ${type})";

                if (mysqli_query($con, $sql)) {
                    echo "Movilidad agregado correctamente.";
                    //id del Movilidad que acaba de ser agregado
                    $id = mysqli_insert_id($con);
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "No se puede hacer el registro, la id no existe.";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/salida/actualizar_movilidad.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}


/*
 *
 *  SCRIPTS PARA AGREGAR
 *  USUARIOS
 *  A LA BASE DE DATOS
 *
*/

if (isset($_POST['btn_agregarUsuario'])) {
    $redirect = false;


    //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
    $nombre = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
    $apellido1 = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
    $apellido2 = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
    $admin = !empty($_POST['tipo_usuario']) ? "'" . mysqli_real_escape_string($con, $_POST['tipo_usuario']) . "'" : "NULL";
    $email = !empty($_POST['correo']) ? "'" . mysqli_real_escape_string($con, $_POST['correo']) . "'" : "NULL";
    $password = !empty($_POST['password']) ?  mysqli_real_escape_string($con, $_POST['password']) : "NULL";

    $hash = "'" .  password_hash($password, PASSWORD_DEFAULT) . "'";

    $sql = "INSERT INTO usuarios (apellido_paterno, apellido_materno, nombre, correo, password, admin) VALUES (${apellido1}, ${apellido2}, ${nombre}, ${email}, ${hash}, ${admin})";

    if (mysqli_query($con, $sql)) {
        echo "El usuario fue agregado correctamente.";
        $redirect = true;
        $id = mysqli_insert_id($con);
    } else {
        echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
    }
    mysqli_close($con);
    if ($redirect)
        header("location: ../estudiantes/entrada/actualizar_usuario.php?id=${id}");
}
