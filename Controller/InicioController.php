<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UtilitarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/InicioModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnRegistrar"])) {
    $nombre = $_POST["nombre"];
    $correoElectronico = $_POST["correoElectronico"];
    $contrasenna = $_POST["contrasenna"];

    $datos = RegistrarUsuarioModel($nombre, $correoElectronico, $contrasenna);

    if ($datos) {
        header("Location: ../../View/vInicio/IniciarSesion.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido registrar su información correctamente";
}

if (isset($_POST["btnIniciarSesion"])) {
    $correoElectronico = $_POST["correoElectronico"];
    $contrasenna = $_POST["contrasenna"];

    $datos = IniciarSesionModel($correoElectronico, $contrasenna);

    if ($datos) {
        $_SESSION["NombreUsuario"] = $datos["Nombre"];
        $_SESSION["ConsecutivoUsuario"] = $datos["Consecutivo"];

        header("Location: ../../View/vInicio/Principal.php");
        exit();
    }

    $_POST["Mensaje"] = "No se ha podido autenticar su información correctamente";
}

if (isset($_POST["btnRecuperarAcceso"])) {
    $correoElectronico = $_POST["correoElectronico"];

    $datos = ValidarCorreoModel($correoElectronico);

    if ($datos) {
        $temporal = generarContrasena();
        $actualizacion = ActualizarContrasennaModel($datos['Consecutivo'], $temporal);

        if ($actualizacion) {
            $plantilla = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/View/templates/Recuperacion.html');
            $plantilla = str_replace("{{TEMPORAL}}", $temporal, $plantilla);
            $plantilla = str_replace("{{NOMBRE}}", $datos['Nombre'], $plantilla);

            EnviarCorreo("Recuperación de acceso", $plantilla, $datos['CorreoElectronico']);

            header("Location: ../../View/vInicio/IniciarSesion.php");
            exit();
        }
    }

    $_SESSION["Mensaje"] = "No se ha podido recuperar su acceso correctamente";
}

if (isset($_POST["btnSalir"])) {
    CerrarSesion();
}
