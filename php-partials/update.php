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
 *  SCRIPTS PARA ACTUALIZAR
 *  ESTUDIANTES E INTERCAMBIOS
 *  A LA BASE DE DATOS
 *
*/

//ESTUDIANTES
//    DE
//  ENTRADA

//actualizar un estudiante de entrada
if (isset($_POST['btn_aplicarCambios_estudiante_entrada'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = mysqli_real_escape_string($con, $_POST['matricula']);

        // Attempt select query execution
        $sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {
                echo "Se puede hacer la actualizacion";

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

                $sql = "UPDATE estudiantes_entrada SET ESTUDIANTE=${name}, ESTUDIANTE_APELLIDO1=${paternal}, ESTUDIANTE_APELLIDO2=${maternal},
                SEXO_ID=${sex}, SEXO=${gender}, DISCAPACIDAD=${handicap}, HABLANTE_INDIGENA=${tongue}, ORIGEN_INDIGENA=${origin}, NIVEL_ID=${level}, 
                CAMPUS_ID=${campus_code}, CAMPUS_DESC=${campus_name}, UNIDAD_ID=${unit_code}, UNIDAD=${unit_name}, PROGRAMA_ID=${program_code}, 
                PROGRAMA_DESC=${program_name}, AREA_ID=${area_code}, AREA=${area_name} WHERE ESTUDIANTE_ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El estudiante fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro la matricula/id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/entrada/actualizar_estudiante.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}
//actualizar un intercambio de entrada
if (isset($_POST['btn_aplicarCambios_intercambio_entrada'])) {
    $redirect = false;

    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        // Attempt select query execution
        $sql = "SELECT * FROM intercambio_estudiantil_entrada WHERE ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {

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
                

                $sql = "UPDATE intercambio_estudiantil_entrada SET PERIODO_ID=${period}, CAMPUS_ID=${campus_code}, CAMPUS_DESC=${campus_name}, UNIDAD_ID=${unit_code}, 
                UNIDAD=${unit_name}, NIVEL_ID=${level}, PROGRAMA_ID=${program_code}, PROGRAMA_DESC=${program_name}, AREA_ID=${area_code}, AREA=${area_name}, 
                UE=${unit_sending_name}, UE_PAIS=${unit_sending_country}, UE_ENTIDAD=${unit_sending_state}, UE_IDIOMA=${unit_sending_language}, 
                FINAN_ID=${finan_recived}, FINAN_VAL=${finan_amount}, DATE_START=${date_initial}, DATE_END=${date_terminal} WHERE ID=${id}";
                */

                $sql = "UPDATE intercambio_estudiantil_entrada SET PERIODO_ID=${period}, UE=${unit_sending_name}, UE_PAIS=${unit_sending_country}, 
                UE_ENTIDAD=${unit_sending_state}, UE_IDIOMA=${unit_sending_language}, FINAN_ID=${finan_recived}, FINAN_VAL=${finan_amount}, 
                DATE_START=${date_initial}, DATE_END=${date_terminal} WHERE ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El intercambio fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro el id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/entrada/actualizar_intercambio.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}


//ESTUDIANTES
//    DE
//  SALIDA

//actualizar un estudiante de salida
if (isset($_POST['btn_aplicarCambios_estudiante_salida'])) {
    $redirect = false;

    if (!empty($_POST['matricula'])) {
        $id = mysqli_real_escape_string($con, $_POST['matricula']);

        // Attempt select query execution
        $sql = "SELECT * FROM estudiantes_salida WHERE ESTUDIANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {
                echo "Se puede hacer la actualizacion";

                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['lengua_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['lengua_indigena']) . "'" : "NULL";
                $origin = !empty($_POST['origen_indigena']) ? "'" . mysqli_real_escape_string($con, $_POST['origen_indigena']) . "'" : "NULL";

                $sql = "UPDATE estudiantes_salida SET ESTUDIANTE=${name}, ESTUDIANTE_APELLIDO1=${paternal}, ESTUDIANTE_APELLIDO2=${maternal},
                SEXO_ID=${sex}, DISCAPACIDAD=${handicap}, HABLANTE_INDIGENA=${tongue}, ORIGEN_INDIGENA=${origin} WHERE ESTUDIANTE_ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El estudiante fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro la matricula/id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/salida/actualizar_estudiante.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}
//actualizar un intercambio de salida
if (isset($_POST['btn_aplicarCambios_intercambio_salida'])) {
    $redirect = false;

    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        // Attempt select query execution
        $sql = "SELECT * FROM intercambio_estudiantil_salida WHERE ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {

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

                $sql = "UPDATE intercambio_estudiantil_salida SET PERIODO_ID=${period}, CAMPUS_ID=${campus_code}, CAMPUS_DESC=${campus_name}, UNIDAD_ID=${unit_code}, 
                UNIDAD=${unit_name}, NIVEL_ID=${level}, PROGRAMA_ID=${program_code}, PROGRAMA_DESC=${program_name}, AREA_ID=${area_code}, AREA=${area_name}, 
                UR=${unit_receiving_name}, UR_PAIS=${unit_receiving_country}, UR_ENTIDAD=${unit_receiving_state}, UR_IDIOMA=${unit_receiving_language}, 
                FINAN_ID=${finan_recived}, FINAN_VAL=${finan_amount}, DATE_START=${date_initial}, DATE_END=${date_terminal} WHERE ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El intercambio fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontró el id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/salida/actualizar_intercambio.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}


/*
 *
 *  SCRIPTS PARA ACTUALIZAR
 *  ACADEMICOS Y MOVILIDADES
 *  A LA BASE DE DATOS
 *
*/

//ACADEMICOS
//    DE
// ENTRADA

//actualizar un academico de entrada
if (isset($_POST['btn_aplicarCambios_academico_entrada'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        // Attempt select query execution
        $sql = "SELECT * FROM academicos_entrada WHERE VISITANTE_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {
                echo "Se puede hacer la actualización";

                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                $level = !empty($_POST['nivelestudios']) ? "'" . mysqli_real_escape_string($con, $_POST['nivelestudios']) . "'" : "NULL";
                $handicap = !empty($_POST['discapacidad']) ? "'" . mysqli_real_escape_string($con, $_POST['discapacidad']) . "'" : "NULL";
                $tongue = !empty($_POST['habindigena']) ? "'" . mysqli_real_escape_string($con, $_POST['habindigena']) . "'" : "NULL";
                $origin = !empty($_POST['orindigena']) ? "'" . mysqli_real_escape_string($con, $_POST['orindigena']) . "'" : "NULL";

                $sql = "UPDATE academicos_entrada SET VISITANTE=${name}, VISITANTE_APELLIDO1=${paternal}, VISITANTE_APELLIDO2=${maternal},
                SEXO_ID=${sex}, NIVEL_ID=${level},DISCAPACIDAD=${handicap}, HABLANTE_INDIGENA=${tongue}, ORIGEN_INDIGENA=${origin} WHERE VISITANTE_ID=${id}";


                if (mysqli_query($con, $sql)) {
                    echo "El academico fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro la matricula/id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/entrada/actualizar_academico.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//actualizar una movilidad de entrada
if (isset($_POST['btn_aplicarCambios_movilidad_entrada'])) {
    $redirect = false;

    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        // Attempt select query execution
        $sql = "SELECT * FROM movilidad_academica_entrada WHERE ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
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

                $sql = "UPDATE movilidad_academica_entrada SET PERIODO_ID=${period}, CAMPUS_ID=${campus_code}, UNIDAD_ID=${unit_code},  
                UE=${unit_sending_name}, UE_PAIS=${unit_sending_country}, UE_ENTIDAD=${unit_sending_state}, UE_IDIOMA=${unit_sending_language}, 
                TMA_ID=${type} WHERE ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "La movilidad fue actualizada correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro el id .";
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

//actualizar un academico de salida
if (isset($_POST['btn_aplicarCambios_academico_salida'])) {
    $redirect = false;

    if (!empty($_POST['identificador'])) {
        $id = mysqli_real_escape_string($con, $_POST['identificador']);

        // Attempt select query execution
        $sql = "SELECT * FROM academicos_salida WHERE EMPLEADO_ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {
                echo "Se puede hacer la actualización";


                //Si el campo no fue dejado en blanco se le asigna el valor a la variable, de lo contrario se le asigna NULL
                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $sex = !empty($_POST['sexo']) ? "'" . mysqli_real_escape_string($con, $_POST['sexo']) . "'" : "NULL";
                
                $sql = "UPDATE academicos_salida SET EMPLEADO=${name}, EMPLEADO_APELLIDO1=${paternal}, EMPLEADO_APELLIDO2=${maternal},
                SEXO_ID=${sex} WHERE EMPLEADO_ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El academico fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro la matricula/id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../academicos/salida/actualizar_academico.php?id=${id}");
    } else {
        echo "Porfavor no dejar matricula/id en blanco.";
    }
}

//actualizar una movilidad de salida
if (isset($_POST['btn_aplicarCambios_movilidad_salida'])) {
    $redirect = false;

    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        // Attempt select query execution
        $sql = "SELECT * FROM movilidad_academica_salida WHERE ID=${id}";
        if ($result = mysqli_query($con, $sql)) {
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

                $sql = "UPDATE movilidad_academica_salida SET PERIODO_ID=${period}, CAMPUS_ID=${campus_code}, UNIDAD_ID=${unit_code},  
                UR=${unit_receiving_name}, UR_PAIS=${unit_receiving_country}, UR_ENTIDAD=${unit_receiving_state}, UR_IDIOMA=${unit_receiving_language}, 
                TMA_ID=${type} WHERE ID=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "La movilidad fue actualizada correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro el id .";
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
 *  SCRIPTS PARA ACTUALIZAR
 *  USUARIOS
 *  A LA BASE DE DATOS
 *
*/

if (isset($_POST['btn_aplicarCambios_usuario'])) {
    $redirect = false;

    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);

        // Attempt select query execution
        $sql = "SELECT * FROM usuarios WHERE id=${id}";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) === 1) {
                echo "Se puede hacer la actualizacion";

                $name = !empty($_POST['nombre']) ? "'" . mysqli_real_escape_string($con, $_POST['nombre']) . "'" : "NULL";
                $paternal = !empty($_POST['paterno']) ? "'" . mysqli_real_escape_string($con, $_POST['paterno']) . "'" : "NULL";
                $maternal = !empty($_POST['materno']) ? "'" . mysqli_real_escape_string($con, $_POST['materno']) . "'" : "NULL";
                $admin = !empty($_POST['tipo_usuario']) ? "'" . mysqli_real_escape_string($con, $_POST['tipo_usuario']) . "'" : "NULL";
                $email = !empty($_POST['correo']) ? "'" . mysqli_real_escape_string($con, $_POST['correo']) . "'" : "NULL";

                $sql = "UPDATE usuarios SET nombre=${name}, apellido_paterno=${paternal}, apellido_materno=${maternal},
                admin=${admin}, correo=${email} WHERE id=${id}";

                if (mysqli_query($con, $sql)) {
                    echo "El usuario fue actualizado correctamente.";
                    $redirect = true;
                } else {
                    echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
                }
            } else {
                echo "Algo salio mal, no se encontro la id .";
            }
        } else {
            echo "ERROR: No se pudo ejecutar ${sql}. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        if ($redirect)
            header("location: ../estudiantes/entrada/actualizar_usuario.php?id=${id}");
    } else {
        echo "Porfavor no dejar id en blanco.";
    }
}