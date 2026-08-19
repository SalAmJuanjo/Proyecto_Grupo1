<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/UtilitarioModel.php';


function ListarInspectoresModel()
{
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spListarInspectores()";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->get_result();

        $inspectores = array();

        while ($fila = $resultado->fetch_assoc()) {
            $inspectores[] = $fila;
        }

        $resultado->free();
        $stmt->close();
        CloseDB($conn);

        return $inspectores;

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


function ConsultarInspectorModel($consecutivo)
{
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

                $sql = "CALL spConsultarInspector(?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "i",
            $consecutivo
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $inspector = null;

        if ($fila = $resultado->fetch_assoc()) {
            $inspector = $fila;
        }

        $resultado->free();
        $stmt->close();
        CloseDB($conn);

        return $inspector;

    } catch (Exception $e) {

        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return null;
    }
}


function ExisteCorreoUsuarioModel(
    $correoElectronico,
    $consecutivoExcluir
) {
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

                $sql = "CALL spExisteCorreoUsuario(?, ? )";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "si",
            $correoElectronico,
            $consecutivoExcluir
        );

        $stmt->execute();

        $resultado = $stmt->get_result();

        $existe = $resultado->num_rows > 0;

        $resultado->free();
        $stmt->close();
        CloseDB($conn);

        return $existe;

    } catch (Exception $e) {

        if ($stmt) {
            $stmt->close();
        }

        if ($conn) {
            CloseDB($conn);
        }

        return true;
    }
}


function ActualizarInspectorModel(
    $consecutivo,
    $nombre,
    $correoElectronico,
    $estado
) {
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "CALL spActualizarInspector(?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "issi",
            $consecutivo,
            $nombre,
            $correoElectronico,
            $estado
        );

        $resultado = $stmt->execute();

        $stmt->close();
        CloseDB($conn);

        return $resultado;

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


function CambiarEstadoInspectorModel(
    $consecutivo,
    $estado
) {
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

                $sql = "CALL spCambiarEstadoInspector(?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ii",
            $consecutivo,
            $estado
        );

        $resultado = $stmt->execute();

        $stmt->close();
        CloseDB($conn);

        return $resultado;

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