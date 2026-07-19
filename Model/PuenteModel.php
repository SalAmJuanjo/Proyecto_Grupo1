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
    $restriccion_altura
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
            '$restriccion_altura'
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

        $sql = "SELECT 
                    codigo,
                    nombre,
                    numero_ruta,
                    clasificacion_ruta,
                    provincia,
                    canton,
                    coordenadas,
                    tipo_estructura,
                    material_principal,
                    longitud_total,
                    numero_tramos,
                    numero_superestructuras,
                    fecha_construccion,
                    importancia,
                    servicios_publicos,
                    restriccion_peso,
                    restriccion_altura
                FROM registrarpuente";

        $response = $conn->query($sql);

        CloseDB($conn);
        return $response;
    } catch (Exception $e) {
        //AddError($e, 'ListarPuentesModel');
        return false;
    }
}
