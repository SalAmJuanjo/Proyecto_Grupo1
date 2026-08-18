<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UtilitarioModel.php';

    function RegistrarPuenteModel(
    $codigo,
    $nombre,
    $numero_ruta,
    $clasificacion_ruta,
    $provincia,
    $canton,
    $coordenadas,
    $tipo_estructura,
    $material_principal,
    $longitud_total,
    $numero_tramos,
    $numero_superestructuras,
    $fecha_construccion,
    $importancia,
    $servicios_publicos,
    $restriccion_peso,
    $restriccion_altura,
    $imagen
) {
    try {
        $conn = OpenDB();

        $sql = "CALL spRegistrarPuente(
            '$codigo',
            '$nombre',
            '$numero_ruta',
            '$clasificacion_ruta',
            '$provincia',
            '$canton',
            '$coordenadas',
            '$tipo_estructura',
            '$material_principal',
            '$longitud_total',
            '$numero_tramos',
            '$numero_superestructuras',
            '$fecha_construccion',
            '$importancia',
            '$servicios_publicos',
            '$restriccion_peso',
            '$restriccion_altura',
            '$imagen'

        )";

        $response = $conn->query($sql);

        CloseDB($conn);
        return $response;
    } catch (Exception $e) {
        //AddError($e, 'RegistrarPuenteModel');
        return false;
    }
}
function ListarPuentesModel() {
    try {
        $conn = OpenDB();
 
        $sql = "CALL spListarPuentes()";
 
        $response = $conn->query($sql);
 
        CloseDB($conn);
        return $response;
    } catch (Exception $e) {
        //AddError($e, 'ListarPuentesModel');
        return false;
    }
}

function ConsultarInspeccionesPuenteModel(
    $codigoPuente
) {
    $conn = null;
    $stmt = null;

    try {

        $conn = OpenDB();

        $sql =
            "CALL spConsultarInspeccionesPuente(?)";

        $stmt =
            $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $codigoPuente
        );

        $stmt->execute();

        $response =
            $stmt->get_result();

        $inspecciones =
            array();

        while (
            $fila =
            $response->fetch_assoc()
        ) {
            $inspecciones[] =
                $fila;
        }

        $response->free();

        $stmt->close();

        while (
            $conn->more_results()
            && $conn->next_result()
        ) {
            $resultadoPendiente =
                $conn->store_result();

            if ($resultadoPendiente) {
                $resultadoPendiente->free();
            }
        }

        CloseDB($conn);

        return $inspecciones;

    } catch (Exception $e) {

        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return array();
    }
}


function ConsultarDetalleInspeccionModel(
    $consecutivoInspeccion
) {
    $conn = null;
    $stmt = null;

    try {

        $conn = OpenDB();

        $sql =
            "CALL spConsultarDetalleInspeccion(?)";

        $stmt =
            $conn->prepare($sql);

        $stmt->bind_param(
            "i",
            $consecutivoInspeccion
        );

        $stmt->execute();

        $response =
            $stmt->get_result();

        $detalles =
            array();

        while (
            $fila =
            $response->fetch_assoc()
        ) {
            $detalles[] =
                $fila;
        }

        $response->free();

        $stmt->close();

        while (
            $conn->more_results()
            && $conn->next_result()
        ) {
            $resultadoPendiente =
                $conn->store_result();

            if ($resultadoPendiente) {
                $resultadoPendiente->free();
            }
        }

        CloseDB($conn);

        return $detalles;

    } catch (Exception $e) {

        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return array();
    }
}