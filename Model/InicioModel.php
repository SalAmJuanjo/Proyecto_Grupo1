<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UtilitarioModel.php';

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

    function IniciarSesionModel($correoElectronico,$contrasenna)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spIniciarSesionUsuario('$correoElectronico','$contrasenna')";
            $response = $conn -> query($sql);

            //Se guarda el resultado en una variable nueva
            $datos = null;
            while($fila = $response -> fetch_assoc())
            {
                $datos = $fila;
            }

            CloseDB($conn);
            return $datos;
        }
        catch(Exception $e)
        {
            //AddError($e, 'IniciarSesionModel');
            return null;
        }
    }

    function ValidarCorreoModel($correoElectronico)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spValidarCorreo('$correoElectronico')";
            $response = $conn -> query($sql);

            //Se guarda el resultado en una variable nueva
            $datos = null;
            while($fila = $response -> fetch_assoc())
            {
                $datos = $fila;
            }

            CloseDB($conn);
            return $datos;
        }
        catch(Exception $e)
        {
            //AddError($e, 'ValidarCorreoModel');
            return null;
        }
    }
    function ActualizarContrasennaModel($consecutivo,$contrasenna)
    {
        try
        {
            $conn = OpenDB();

            $sql = "CALL spActualizarContrasenna('$consecutivo','$contrasenna')";
            $response = $conn -> query($sql);

            CloseDB($conn);
            return $response;
        }
        catch(Exception $e)
        {
            //AddError($e, 'ActualizarContrasennaModel');
            return false;
        }
    }