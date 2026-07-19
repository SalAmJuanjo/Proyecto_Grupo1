<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/UtilitarioModel.php';


function LimpiarResultadosInspeccionModel($conn)
{
    while ($conn->more_results() && $conn->next_result()) {
        $resultadoPendiente = $conn->store_result();

        if ($resultadoPendiente) {
            $resultadoPendiente->free();
        }
    }
}


function ConsultarElementosInspeccionModel()
{
    $conn = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spConsultarElementosInspeccion()";
        $response = $conn->query($sql);

        if (!$response) {
            throw new Exception($conn->error);
        }

        $elementos = array();

        while ($fila = $response->fetch_assoc()) {
            $elementos[] = $fila;
        }

        $response->free();

        LimpiarResultadosInspeccionModel($conn);

        CloseDB($conn);

        return $elementos;
    } catch (Exception $e) {
        if ($conn) {
            CloseDB($conn);
        }

        return array();
    }
}


function ConsultarPuentesInspeccionModel()
{
    $conn = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spConsultarPuentesInspeccion()";
        $response = $conn->query($sql);

        if (!$response) {
            throw new Exception($conn->error);
        }

        $puentes = array();

        while ($fila = $response->fetch_assoc()) {
            $puentes[] = $fila;
        }

        $response->free();

        LimpiarResultadosInspeccionModel($conn);

        CloseDB($conn);

        return $puentes;
    } catch (Exception $e) {
        if ($conn) {
            CloseDB($conn);
        }

        return array();
    }
}


function RegistrarInspeccionModel(
    $codigoPuente,
    $consecutivoInspector,
    $fechaInspeccion,
    $observacionGeneral
) {
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spRegistrarInspeccion(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception($conn->error);
        }

        $stmt->bind_param(
            "siss",
            $codigoPuente,
            $consecutivoInspector,
            $fechaInspeccion,
            $observacionGeneral
        );

        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $resultado = $stmt->get_result();
        $consecutivoInspeccion = 0;

        if ($resultado && $fila = $resultado->fetch_assoc()) {
            if (isset($fila["ConsecutivoInspeccion"])) {
                $consecutivoInspeccion =
                    (int) $fila["ConsecutivoInspeccion"];
            } else {
                $valores = array_values($fila);

                if (isset($valores[0])) {
                    $consecutivoInspeccion = (int) $valores[0];
                }
            }

            $resultado->free();
        }

        $stmt->close();

        LimpiarResultadosInspeccionModel($conn);

        CloseDB($conn);

        return $consecutivoInspeccion;
    } catch (Exception $e) {
        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return 0;
    }
}


function RegistrarDetalleInspeccionModel(
    $consecutivoInspeccion,
    $consecutivoElemento,
    $esAplicable,
    $calificacion,
    $observacion
) {
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spRegistrarDetalleInspeccion(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception($conn->error);
        }

        $stmt->bind_param(
            "iiiis",
            $consecutivoInspeccion,
            $consecutivoElemento,
            $esAplicable,
            $calificacion,
            $observacion
        );

        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $resultado = $stmt->get_result();

        if ($resultado) {
            $resultado->free();
        }

        $stmt->close();

        LimpiarResultadosInspeccionModel($conn);

        CloseDB($conn);

        return true;
    } catch (Exception $e) {
        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return false;
    }
}


function FinalizarInspeccionModel($consecutivoInspeccion)
{
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spFinalizarInspeccion(?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception($conn->error);
        }

        $stmt->bind_param(
            "i",
            $consecutivoInspeccion
        );

        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $resultado = $stmt->get_result();
        $resumen = array();

        if ($resultado && $fila = $resultado->fetch_assoc()) {
            $resumen = $fila;
            $resultado->free();
        }

        $stmt->close();

        LimpiarResultadosInspeccionModel($conn);

        CloseDB($conn);

        return $resumen;
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