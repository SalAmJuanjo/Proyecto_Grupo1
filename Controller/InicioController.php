<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/Controller/UtilitarioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Avance2_Grupo1/Model/InicioModel.php';

if(isset($_POST["btnRegistrar"]))
    {
        $nombre = $_POST["nombre"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $datos = RegistrarUsuarioModel($nombre,$correoElectronico,$contrasenna);

        if($datos)
        {
            header("Location: ../../View/vInicio/IniciarSesion.php");
            exit();
        }

        $_POST["Mensaje"] = "No se ha podido registrar su información correctamente";
    }