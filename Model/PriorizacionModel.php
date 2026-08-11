<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Proyecto_Grupo1/Model/UtilitarioModel.php';


function LimpiarResultadosPriorizacionModel($conn)
{
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
}


function ConsultarPriorizacionModel($metodo)
{
    $conn = null;
    $stmt = null;

    try {

        $conn = OpenDB();

        $sql =
            "CALL spConsultarPriorizacionPuentes(?)";

        $stmt =
            $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception(
                $conn->error
            );
        }

        $stmt->bind_param(
            "s",
            $metodo
        );

        if (!$stmt->execute()) {
            throw new Exception(
                $stmt->error
            );
        }

        $response =
            $stmt->get_result();

        $puentes =
            array();

        if ($response) {

            while (
                $fila =
                $response->fetch_assoc()
            ) {
                array_push(
                    $puentes,
                    $fila
                );
            }

            $response->free();
        }

        $stmt->close();
        $stmt = null;

        LimpiarResultadosPriorizacionModel(
            $conn
        );

        CloseDB($conn);
        $conn = null;

        return $puentes;

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