<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/InspeccionModel.php';


function ConsultarElementosInspeccionController()
{
    return ConsultarElementosInspeccionModel();
}


function ConsultarPuentesInspeccionController()
{
    return ConsultarPuentesInspeccionModel();
}


function RegistrarInspeccionController(
    $codigoPuente,
    $consecutivoInspector,
    $fechaInspeccion,
    $observacionGeneral
) {
    return RegistrarInspeccionModel(
        $codigoPuente,
        $consecutivoInspector,
        $fechaInspeccion,
        $observacionGeneral
    );
}


function RegistrarDetalleInspeccionController(
    $consecutivoInspeccion,
    $consecutivoElemento,
    $esAplicable,
    $calificacion,
    $observacion
) {
    return RegistrarDetalleInspeccionModel(
        $consecutivoInspeccion,
        $consecutivoElemento,
        $esAplicable,
        $calificacion,
        $observacion
    );
}


function FinalizarInspeccionController($consecutivoInspeccion)
{
    return FinalizarInspeccionModel(
        $consecutivoInspeccion
    );
}