<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/Model/UtilitarioModel.php';

    function RegistrarUsuarioModel($nombre,$correoElectronico,$contrasenna)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spRegistrarUsuario('$nombre','$correoElectronico','$contrasenna')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            //AddError($e, 'RegistrarUsuarioModel');
            return false;
        }
    }
    