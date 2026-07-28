<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UtilitarioController.php'; 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/InicioModel.php';

     if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_POST["btnCambiarContrasenna"]))
    {
        $nuevaContrasenna = $_POST["nuevaContrasenna"];
        $consecutivo = $_SESSION["ConsecutivoUsuario"];
        $nombreUsuario = $_SESSION["NombreUsuario"];
        $correoElectronico = isset($_SESSION["CorreoElectronicoUsuario"]) ? $_SESSION["CorreoElectronicoUsuario"] : "";
     
        $actualizacion = ActualizarContrasennaModel($consecutivo, $nuevaContrasenna);

        if($actualizacion)
        {
            if (empty($correoElectronico)) {
                $_SESSION["Mensaje"] = "No se encontró el correo del usuario para enviar la confirmación.";
            } else {
                $plantilla = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/templates/CambioContrasenna.html');
                $plantilla = str_replace("{{NOMBRE}}", $nombreUsuario, $plantilla);
                date_default_timezone_set('America/Costa_Rica');
                $plantilla = str_replace("{{FECHA}}", date('d/m/Y h:i A'), $plantilla);
                
                if (EnviarCorreo("Cambio de contraseña", $plantilla, $correoElectronico)) {
                    CerrarSesion();
                } else {
                    $_SESSION["Mensaje"] = "No se pudo enviar el correo de confirmación. Intente nuevamente.";
                }
            }
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido cambiar su contraseña correctamente";
        }
    }
