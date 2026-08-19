<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/PriorizacionModel.php';


function ValidarAccesoPriorizacionController()
{
    if (
        session_status()
        == PHP_SESSION_NONE
    ) {

        session_start();
    }


    if (
        !isset(
            $_SESSION[
                "ConsecutivoUsuario"
            ]
        )
    ) {

        header(
            "Location: /Proyecto_Grupo1/View/vInicio/IniciarSesion.php"
        );

        exit();
    }
}


function ConsultarPriorizacionController()
{
    $metodo =
        "condicion";


    if (
        isset(
            $_GET["metodo"]
        )
    ) {

        $metodoRecibido =
            trim(
                $_GET["metodo"]
            );


        if (
            $metodoRecibido
                == "condicion"

            || $metodoRecibido
                == "condicion_importancia"
        ) {

            $metodo =
                $metodoRecibido;
        }
    }


    $puentes =
        ConsultarPriorizacionModel(
            $metodo
        );


    $configuracion =
        ConsultarConfiguracionPriorizacionModel();


    $pesoCondicion =
        isset(
            $configuracion[
                "PesoCondicion"
            ]
        )
            ? (float)
                $configuracion[
                    "PesoCondicion"
                ]
            : 0;


    $pesoImportancia =
        isset(
            $configuracion[
                "PesoImportancia"
            ]
        )
            ? (float)
                $configuracion[
                    "PesoImportancia"
                ]
            : 0;


    $datos =
        array(

            "metodo" =>
                $metodo,

            "puentes" =>
                $puentes,

            "pesoCondicion" =>
                $pesoCondicion,

            "pesoImportancia" =>
                $pesoImportancia

        );


    return $datos;
}


function ObtenerClaseCondicionPriorizacionController(
    $condicion
) {
    $condicionNormalizada =
        strtolower(
            str_replace(
                array(
                    "í",
                    "Í"
                ),
                "i",
                trim(
                    $condicion
                )
            )
        );


    switch (
        $condicionNormalizada
    ) {

        case "buena":

            return
                "dashboard-badge-buena";


        case "regular":

            return
                "dashboard-badge-regular";


        case "deficiente":

            return
                "dashboard-badge-deficiente";


        case "critica":

            return
                "dashboard-badge-critica";


        default:

            return
                "dashboard-badge-neutral";
    }
}


function FormatearFechaPriorizacionController(
    $fecha
) {
    if (
        empty(
            $fecha
        )
    ) {

        return
            "Sin fecha";
    }


    $marcaTiempo =
        strtotime(
            $fecha
        );


    if (
        !$marcaTiempo
    ) {

        return
            $fecha;
    }


    return date(
        "d/m/Y",
        $marcaTiempo
    );
}

?>