<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UtilitarioModel.php';

    function RegistrarPuenteModel($codigo,$nombre,$ruta,$ubicacion,$longitud,$fecha,$calificacion)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spRegistrarPuente('$codigo','$nombre','$ruta','$ubicacion','$longitud','$fecha','$calificacion')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            //AddError($e, 'RegistrarPuenteModel');
            return false;
        }
    }