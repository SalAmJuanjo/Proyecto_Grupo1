<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/InspeccionModel.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


function ConsultarElementosInspeccionController()
{
    $datos =
        ConsultarElementosInspeccionModel();

    return $datos;
}


function ConsultarPuentesInspeccionController()
{
    $datos =
        ConsultarPuentesInspeccionModel();

    return $datos;
}

function ConsultarCalificacionesInspeccionController()
{
    return ConsultarCalificacionesInspeccionModel();
}



function RegistrarInspeccionController(
    $codigoPuente,
    $consecutivoInspector,
    $fechaInspeccion,
    $observacionGeneral
) {
    $resultado =
        RegistrarInspeccionModel(
            $codigoPuente,
            $consecutivoInspector,
            $fechaInspeccion,
            $observacionGeneral
        );

    return $resultado;
}


function RegistrarDetalleInspeccionController(
    $consecutivoInspeccion,
    $consecutivoElemento,
    $esAplicable,
    $calificacion,
    $observacion,
    $imagen
) {
    $resultado =
        RegistrarDetalleInspeccionModel(
            $consecutivoInspeccion,
            $consecutivoElemento,
            $esAplicable,
            $calificacion,
            $observacion,
            $imagen
        );

    return $resultado;
}


function FinalizarInspeccionController(
    $consecutivoInspeccion
) {
    $resultado =
        FinalizarInspeccionModel(
            $consecutivoInspeccion
        );

    return $resultado;
}


function GuardarImagenDanioController(
    $consecutivoInspeccion,
    $consecutivoElemento
) {
    if (
        !isset(
            $_FILES["elementos"]["tmp_name"]
            [$consecutivoElemento]["imagen"]
        )
    ) {
        return "";
    }

    $origen =
        $_FILES["elementos"]["tmp_name"]
        [$consecutivoElemento]["imagen"];

    if ($origen == "") {
        return "";
    }

    $nombreOriginal =
        $_FILES["elementos"]["name"]
        [$consecutivoElemento]["imagen"];

    $extension =
        strtolower(
            pathinfo(
                $nombreOriginal,
                PATHINFO_EXTENSION
            )
        );

    if ($extension != "png") {
        return "";
    }

    $carpeta =
        $_SERVER["DOCUMENT_ROOT"]
        . "/Proyecto_Grupo1/View/Uploads/Inspecciones/";

    if (!is_dir($carpeta)) {
        mkdir(
            $carpeta,
            0775,
            true
        );
    }

    $nombreImagen =
        "inspeccion_"
        . $consecutivoInspeccion
        . "_elemento_"
        . $consecutivoElemento
        . ".png";

    $imagen =
        "/Proyecto_Grupo1/View/Uploads/Inspecciones/"
        . $nombreImagen;

    $destino =
        $_SERVER["DOCUMENT_ROOT"]
        . $imagen;

    if (
        !move_uploaded_file(
            $origen,
            $destino
        )
    ) {
        return "";
    }

    return $imagen;
}


function ProcesarInspeccionController(
    $codigoPuente,
    $consecutivoInspector,
    $fechaInspeccion,
    $observacionGeneral,
    $elementosSeleccionados
) {
    $resultado = array(
        "exito" => false,
        "mensajeExito" => "",
        "mensajeError" => "",
        "codigoPuente" => $codigoPuente,
        "fechaInspeccion" => $fechaInspeccion,
        "observacionGeneral" =>
            $observacionGeneral,
        "elementosSeleccionados" =>
            $elementosSeleccionados
    );


    if ($consecutivoInspector <= 0) {

        $resultado["mensajeError"] =
            "No fue posible identificar al inspector.";

        return $resultado;
    }


    if ($codigoPuente == "") {

        $resultado["mensajeError"] =
            "Debe seleccionar un puente.";

        return $resultado;
    }


    if ($fechaInspeccion == "") {

        $resultado["mensajeError"] =
            "Debe indicar la fecha de inspección.";

        return $resultado;
    }


    if (
        !is_array($elementosSeleccionados)
        || count($elementosSeleccionados) == 0
    ) {

        $resultado["mensajeError"] =
            "No se recibieron los elementos de la inspección.";

        return $resultado;
    }


    $detallesValidos = array();
    $cantidadAplicables = 0;


    foreach (
        $elementosSeleccionados
        as $detalle
    ) {

        $consecutivoElemento =
            isset($detalle["id"])
                ? (int) $detalle["id"]
                : 0;


        $valorCalificacion =
            isset($detalle["calificacion"])
                ? $detalle["calificacion"]
                : "";


        $observacion =
            isset($detalle["observacion"])
                ? trim(
                    $detalle["observacion"]
                )
                : "";


        if ($consecutivoElemento <= 0) {

            $resultado["mensajeError"] =
                "Se encontró un elemento no válido.";

            return $resultado;
        }


        if ($valorCalificacion == "") {

            $resultado["mensajeError"] =
                "Debe seleccionar una calificación o N/A para todos los elementos.";

            return $resultado;
        }


        if ($valorCalificacion == "NA") {

            $esAplicable = 0;
            $calificacion = null;

        } else {

            $calificacion =
                (int) $valorCalificacion;

            if (
                $calificacion < 1
                || $calificacion > 5
            ) {

                $resultado["mensajeError"] =
                    "Se encontró una calificación no válida.";

                return $resultado;
            }

            $esAplicable = 1;
            $cantidadAplicables++;


            if (
                $calificacion > 1
                && $observacion == ""
            ) {

                $resultado["mensajeError"] =
                    "Debe ingresar una observación para los elementos con calificación mayor a 1.";

                return $resultado;
            }


            if (
                $calificacion == 4
                || $calificacion == 5
            ) {

                if (
                    !isset(
                        $_FILES["elementos"]["tmp_name"]
                        [$consecutivoElemento]["imagen"]
                    )
                    || $_FILES["elementos"]["tmp_name"]
                        [$consecutivoElemento]["imagen"] == ""
                ) {

                    $resultado["mensajeError"] =
                        "Debe agregar una imagen para los elementos con calificación 4 o 5.";

                    return $resultado;
                }
            }
        }


        $detalleValido = array(
            "consecutivoElemento" =>
                $consecutivoElemento,

            "esAplicable" =>
                $esAplicable,

            "calificacion" =>
                $calificacion,

            "observacion" =>
                $observacion
        );


        array_push(
            $detallesValidos,
            $detalleValido
        );
    }


    if ($cantidadAplicables == 0) {

        $resultado["mensajeError"] =
            "La inspección debe tener al menos un elemento aplicable.";

        return $resultado;
    }


    $consecutivoInspeccion =
        RegistrarInspeccionController(
            $codigoPuente,
            $consecutivoInspector,
            $fechaInspeccion,
            $observacionGeneral
        );


    if (!$consecutivoInspeccion) {

        $resultado["mensajeError"] =
            "No fue posible registrar la inspección.";

        return $resultado;
    }


    foreach ($detallesValidos as $detalle) {

        $imagen = null;


        if (
            $detalle["calificacion"] == 4
            || $detalle["calificacion"] == 5
        ) {

            $imagen =
                GuardarImagenDanioController(
                    $consecutivoInspeccion,
                    $detalle["consecutivoElemento"]
                );


            if ($imagen == "") {

                $resultado["mensajeError"] =
                    "No fue posible guardar una de las imágenes de daño.";

                return $resultado;
            }
        }


        $guardado =
            RegistrarDetalleInspeccionController(
                $consecutivoInspeccion,
                $detalle["consecutivoElemento"],
                $detalle["esAplicable"],
                $detalle["calificacion"],
                $detalle["observacion"],
                $imagen
            );


        if (!$guardado) {

            $resultado["mensajeError"] =
                "No fue posible guardar todos los elementos de la inspección.";

            return $resultado;
        }
    }


    $resultadoFinal =
        FinalizarInspeccionController(
            $consecutivoInspeccion
        );


    if (!$resultadoFinal) {

        $resultado["mensajeError"] =
            "No fue posible finalizar la inspección.";

        return $resultado;
    }


    $resultado["exito"] = true;


    $resultado["mensajeExito"] =
        "La inspección se registró correctamente. "
        . "Daño acumulado: "
        . $resultadoFinal["DanioAcumulado"]
        . ". Índice de deterioro: "
        . $resultadoFinal["IndiceDeterioro"]
        . ". Condición preliminar: "
        . $resultadoFinal["CondicionPreliminar"]
        . ".";


    $resultado["codigoPuente"] = "";

    $resultado["fechaInspeccion"] =
        date("Y-m-d");

    $resultado["observacionGeneral"] = "";

    $resultado["elementosSeleccionados"] =
        array();


    return $resultado;
}


function RegistrarInspeccionFormularioController()
{
    $codigoPuente =
        isset($_POST["codigoPuente"])
            ? $_POST["codigoPuente"]
            : "";


    $fechaInspeccion =
        isset($_POST["fechaInspeccion"])
            ? $_POST["fechaInspeccion"]
            : "";


    $observacionGeneral =
        isset($_POST["observacionGeneral"])
            ? $_POST["observacionGeneral"]
            : "";


    $elementosSeleccionados =
        isset($_POST["elementos"])
            ? $_POST["elementos"]
            : array();


    $consecutivoInspector =
        isset(
            $_SESSION["ConsecutivoUsuario"]
        )
            ? $_SESSION["ConsecutivoUsuario"]
            : 0;


    $resultado =
        ProcesarInspeccionController(
            $codigoPuente,
            $consecutivoInspector,
            $fechaInspeccion,
            $observacionGeneral,
            $elementosSeleccionados
        );


    return $resultado;
}


if (
    isset(
        $_POST[
            "btnRegistrarInspeccion"
        ]
    )
) {

    $resultadoInspeccion =
        RegistrarInspeccionFormularioController();
}