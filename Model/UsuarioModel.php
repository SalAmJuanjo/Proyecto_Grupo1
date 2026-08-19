<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/UtilitarioModel.php';


function ListarInspectoresModel()
{
    $conn = null;
    $stmt = null;

    try {
        $conn = OpenDB();

        $sql = "
            SELECT
                Consecutivo,
                Nombre,
                CorreoElectronico,
                Estado + 0 AS Estado,
                ConsecutivoRol
            FROM tb_usuario
            WHERE ConsecutivoRol = 2
            ORDER BY Nombre ASC
        ";

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

        $sql = "
            SELECT
                Consecutivo,
                Nombre,
                CorreoElectronico,
                Estado + 0 AS Estado,
                ConsecutivoRol
            FROM tb_usuario
            WHERE Consecutivo = ?
              AND ConsecutivoRol = 2
            LIMIT 1
        ";

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

        $sql = "
            SELECT Consecutivo
            FROM tb_usuario
            WHERE CorreoElectronico = ?
              AND Consecutivo <> ?
            LIMIT 1
        ";

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

        $sql = "
            UPDATE tb_usuario
            SET
                Nombre = ?,
                CorreoElectronico = ?,
                Estado = ?
            WHERE Consecutivo = ?
              AND ConsecutivoRol = 2
        ";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssii",
            $nombre,
            $correoElectronico,
            $estado,
            $consecutivo
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

        $sql = "
            UPDATE tb_usuario
            SET Estado = ?
            WHERE Consecutivo = ?
              AND ConsecutivoRol = 2
        ";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ii",
            $estado,
            $consecutivo
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