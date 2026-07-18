<?php
 if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/PuenteModel.php';




 
if(isset($_POST["btnRegistrarPuente"]))
    {
        $codigo = $_POST["CodigoPuente"];
        $nombre = $_POST["nombrePuente"];
        $ruta = $_POST["ruta"];
        $ubicacion = $_POST["ubicacion"];
        $longitud = $_POST["longitud"];
        $fecha = $_POST["fecha"];
        $calificacion = $_POST["calificacion"];

        $datos = RegistrarPuenteModel($codigo,$nombre,$ruta,$ubicacion,$longitud,$fecha,$calificacion);

        if($datos)
        {
            header("Location: ../../View/vInicio/Principal.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar la información correctamente";
    }
