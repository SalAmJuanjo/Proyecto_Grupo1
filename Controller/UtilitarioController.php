<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Grupo1/Model/UtilitarioModel.php';

function generarContrasena()
{
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $contrasena = '';
    $max = strlen($caracteres) - 1;

    for ($i = 0; $i < 8; $i++) {
        $contrasena .= $caracteres[random_int(0, $max)];
    }

    return $contrasena;
}

function EnviarCorreo($asunto, $contenido, $destinatario)
{
    try {
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Eliminé el mío (juanjo), pero si me funcionó
        $correoSalida = "juanjosama0627@gmail.com";
        $contrasennaSalida = "xjbq wdmq wpcb juuv";

        if ($contrasennaSalida == "") {
            return true; // Simulación de envío exitoso
        }

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';

        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $correoSalida;
        $mail->Password = $contrasennaSalida;

        $mail->SetFrom($correoSalida);
        $mail->Subject = $asunto;
        $mail->MsgHTML($contenido);
        $mail->AddAddress($destinatario);
        $mail->send();
        return true;
    } catch (Exception $e) {
        //AddError($e, 'EnviarCorreo');
        return false;
    }
}
