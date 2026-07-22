<?php

require_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/DashboardModel.php';


function ValidarAccesoDashboardController()
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["ConsecutivoUsuario"])) {
        header(
            "Location: /Proyecto_Grupo1/View/vInicio/IniciarSesion.php"
        );
        exit();
    }
}


function ObtenerClaseCondicionDashboardController($condicion)
{
    $condicionNormalizada = strtolower(
        str_replace(
            array("í", "Í"),
            "i",
            trim($condicion)
        )
    );

    switch ($condicionNormalizada) {
        case "buena":
            return "dashboard-badge-buena";

        case "regular":
            return "dashboard-badge-regular";

        case "deficiente":
            return "dashboard-badge-deficiente";

        case "critica":
            return "dashboard-badge-critica";

        default:
            return "dashboard-badge-neutral";
    }
}


function FormatearFechaDashboardController($fecha)
{
    if (empty($fecha)) {
        return "Sin fecha";
    }

    $marcaTiempo = strtotime($fecha);

    if (!$marcaTiempo) {
        return $fecha;
    }

    return date("d/m/Y", $marcaTiempo);
}


function ConsultarDashboardController()
{
    $datosModel = ConsultarDashboardModel();

    if (!is_array($datosModel)) {
        $datosModel = array();
    }

    $resumenModel =
        isset($datosModel["resumen"])
        && is_array($datosModel["resumen"])
            ? $datosModel["resumen"]
            : array();

    $resumen = array(
        "totalPuentes" =>
            isset($resumenModel["totalPuentes"])
                ? (int) $resumenModel["totalPuentes"]
                : 0,

        "totalInspecciones" =>
            isset($resumenModel["totalInspecciones"])
                ? (int) $resumenModel["totalInspecciones"]
                : 0,

        "puentesCriticos" =>
            isset($resumenModel["puentesCriticos"])
                ? (int) $resumenModel["puentesCriticos"]
                : 0,

        "rutasAfectadas" =>
            isset($resumenModel["rutasAfectadas"])
                ? (int) $resumenModel["rutasAfectadas"]
                : 0
    );

    $condiciones =
        isset($datosModel["condiciones"])
        && is_array($datosModel["condiciones"])
            ? $datosModel["condiciones"]
            : array();

    $rutas =
        isset($datosModel["rutas"])
        && is_array($datosModel["rutas"])
            ? $datosModel["rutas"]
            : array();

    $calificaciones =
        isset($datosModel["calificaciones"])
        && is_array($datosModel["calificaciones"])
            ? $datosModel["calificaciones"]
            : array();

    $importancias =
        isset($datosModel["importancias"])
        && is_array($datosModel["importancias"])
            ? $datosModel["importancias"]
            : array();

    $prioridadesModel =
        isset($datosModel["prioridades"])
        && is_array($datosModel["prioridades"])
            ? $datosModel["prioridades"]
            : array();

    $prioridades = array();

    foreach ($prioridadesModel as $puente) {
        $codigo =
            isset($puente["codigo"])
                ? $puente["codigo"]
                : "";

        $nombre =
            isset($puente["nombre"])
                ? $puente["nombre"]
                : "";

        $numeroRuta =
            isset($puente["numero_ruta"])
                ? $puente["numero_ruta"]
                : "";

        $provincia =
            isset($puente["provincia"])
                ? $puente["provincia"]
                : "";

        $canton =
            isset($puente["canton"])
                ? $puente["canton"]
                : "";

        $fechaInspeccion =
            isset($puente["FechaInspeccion"])
                ? $puente["FechaInspeccion"]
                : null;

        $indiceDeterioro =
            isset($puente["IndiceDeterioro"])
                ? (float) $puente["IndiceDeterioro"]
                : 0;

        $condicion =
            isset($puente["CondicionPreliminar"])
            && trim($puente["CondicionPreliminar"]) !== ""
                ? $puente["CondicionPreliminar"]
                : "Sin clasificar";

        $prioridades[] = array(
            "codigo" => $codigo,
            "nombre" => $nombre,
            "numero_ruta" => $numeroRuta,
            "provincia" => $provincia,
            "canton" => $canton,
            "FechaInspeccion" => $fechaInspeccion,
            "FechaFormateada" =>
                FormatearFechaDashboardController(
                    $fechaInspeccion
                ),
            "IndiceDeterioro" => $indiceDeterioro,
            "IndiceFormateado" =>
                number_format(
                    $indiceDeterioro,
                    2
                ),
            "CondicionPreliminar" => $condicion,
            "ClaseCondicion" =>
                ObtenerClaseCondicionDashboardController(
                    $condicion
                )
        );
    }

    $error =
        isset($datosModel["error"])
            ? $datosModel["error"]
            : "";

    return array(
        "resumen" => $resumen,
        "condiciones" => $condiciones,
        "rutas" => $rutas,
        "calificaciones" => $calificaciones,
        "importancias" => $importancias,
        "prioridades" => $prioridades,
        "error" => $error
    );
}