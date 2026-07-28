<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/PriorizacionModel.php';


function ValidarAccesoPriorizacionController()
{
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


function ConsultarPriorizacionController()
{
    $metodo = "condicion";

    if (isset($_GET["metodo"])) {
        $metodoRecibido = trim($_GET["metodo"]);

        if (
            $metodoRecibido === "condicion"
            || $metodoRecibido === "condicion_importancia"
        ) {
            $metodo = $metodoRecibido;
        }
    }

    $puentes = ConsultarPriorizacionModel($metodo);

    return array(
        "metodo" => $metodo,
        "puentes" => $puentes
    );
}