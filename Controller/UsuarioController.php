<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Controller/UtilitarioController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/InicioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UsuarioModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function ObtenerDatosUsuario()
{
    return [
        "Consecutivo" => $_SESSION["ConsecutivoUsuario"] ?? "",
        "Nombre" => $_SESSION["NombreUsuario"] ?? "",
        "CorreoElectronico" => $_SESSION["CorreoElectronicoUsuario"] ?? "",
        "Rol" => $_SESSION["NombreRol"] ?? ""
    ];
}

if (isset($_POST["btnCambiarContrasenna"])) {
    $nuevaContrasenna = $_POST["nuevaContrasenna"];
    $consecutivo = $_SESSION["ConsecutivoUsuario"];
    $nombreUsuario = $_SESSION["NombreUsuario"];
    $correoElectronico = isset($_SESSION["CorreoElectronicoUsuario"]) ? $_SESSION["CorreoElectronicoUsuario"] : "";

    $actualizacion = ActualizarContrasennaModel($consecutivo, $nuevaContrasenna);

    if ($actualizacion) {
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
    } else {
        $_POST["Mensaje"] = "No se ha podido cambiar su contraseña correctamente";
    }
}



function EsAdministradorUsuarioController()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION["ConsecutivoRol"])
        && (int) $_SESSION["ConsecutivoRol"] === 1;
}


function ValidarAdministradorUsuarioController()
{
    if (!EsAdministradorUsuarioController()) {

        http_response_code(403);

        exit(
            "No tiene permisos para realizar esta operación."
        );
    }
}


function ListarInspectoresController()
{
    ValidarAdministradorUsuarioController();

    return ListarInspectoresModel();
}


function ConsultarInspectorController($consecutivo)
{
    ValidarAdministradorUsuarioController();

    if ($consecutivo <= 0) {
        return null;
    }

    return ConsultarInspectorModel(
        $consecutivo
    );
}



if (isset($_POST["btnActualizarInspector"])) {

    ValidarAdministradorUsuarioController();

    $consecutivo =
        isset($_POST["Consecutivo"])
        ? (int) $_POST["Consecutivo"]
        : 0;

    $nombre =
        isset($_POST["Nombre"])
        ? trim($_POST["Nombre"])
        : "";

    $correoElectronico =
        isset($_POST["CorreoElectronico"])
        ? trim($_POST["CorreoElectronico"])
        : "";

    $estado =
        isset($_POST["Estado"])
        ? (int) $_POST["Estado"]
        : 0;


    if ($consecutivo <= 0) {

        $_SESSION["MensajeInspector"] =
            "El inspector indicado no es válido.";

        $_SESSION["TipoMensajeInspector"] =
            "danger";

    } elseif ($nombre === "") {

        $_SESSION["MensajeInspector"] =
            "Debe ingresar el nombre del inspector.";

        $_SESSION["TipoMensajeInspector"] =
            "danger";

    } elseif (
        !filter_var(
            $correoElectronico,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        $_SESSION["MensajeInspector"] =
            "Debe ingresar un correo electrónico válido.";

        $_SESSION["TipoMensajeInspector"] =
            "danger";

    } elseif (
        ExisteCorreoUsuarioModel(
            $correoElectronico,
            $consecutivo
        )
    ) {

        $_SESSION["MensajeInspector"] =
            "El correo electrónico ya pertenece a otro usuario.";

        $_SESSION["TipoMensajeInspector"] =
            "danger";

    } else {

        $actualizado =
            ActualizarInspectorModel(
                $consecutivo,
                $nombre,
                $correoElectronico,
                $estado
            );


        if ($actualizado) {

            $_SESSION["MensajeInspector"] =
                "La información del inspector se actualizó correctamente.";

            $_SESSION["TipoMensajeInspector"] =
                "success";

        } else {

            $_SESSION["MensajeInspector"] =
                "No fue posible actualizar la información del inspector.";

            $_SESSION["TipoMensajeInspector"] =
                "danger";
        }
    }


    header(
        "Location: /Proyecto_Grupo1/View/vUsuario/GestionInspectores.php"
    );

    exit();
}




if (isset($_POST["btnCambiarEstadoInspector"])) {

    ValidarAdministradorUsuarioController();

    $consecutivo =
        isset($_POST["Consecutivo"])
        ? (int) $_POST["Consecutivo"]
        : 0;

    $nuevoEstado =
        isset($_POST["NuevoEstado"])
        ? (int) $_POST["NuevoEstado"]
        : 0;


    $nuevoEstado =
        $nuevoEstado === 1
        ? 1
        : 0;


    if ($consecutivo <= 0) {

        $_SESSION["MensajeInspector"] =
            "No fue posible identificar al inspector.";

        $_SESSION["TipoMensajeInspector"] =
            "danger";

    } else {

        $resultado =
            CambiarEstadoInspectorModel(
                $consecutivo,
                $nuevoEstado
            );


        if ($resultado) {

            $_SESSION["MensajeInspector"] =
                $nuevoEstado === 1
                ? "El inspector fue activado correctamente."
                : "El inspector fue desactivado correctamente.";

            $_SESSION["TipoMensajeInspector"] =
                "success";

        } else {

            $_SESSION["MensajeInspector"] =
                "No fue posible modificar el estado del inspector.";

            $_SESSION["TipoMensajeInspector"] =
                "danger";
        }
    }


    header(
        "Location: /Proyecto_Grupo1/View/vUsuario/GestionInspectores.php"
    );

    exit();
}
