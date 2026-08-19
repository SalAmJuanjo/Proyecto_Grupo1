<?php

function OpenDB()
{
    //los puertos son diferentes 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3307", "root", "", "proyectogrupo1");
}

function CloseDB($conn)
{
    $conn->close();
}

function AddError($error, $accion, $idUsuario)
    {
        $conn = OpenDB();

        $mensaje = $conn -> real_escape_string($error -> getMessage());

        $sql = "CALL spRegistrarError('$mensaje', '$accion', '$idUsuario')";
        $response = $conn -> query($sql);           
            
        CloseDB($conn);
    }