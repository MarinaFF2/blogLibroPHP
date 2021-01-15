<?php

require_once 'Conexion.php';

/**
 * Description of Email
 *
 * @author daw207
 */
class Email {

    static function enviarCorreo($para) {
        //Instalamos con: sudo apt-get install libphp-phpmailer. Se podría hacer con sendmail pero es más rollo.
//        require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
//        require '/usr/share/php/libphp-phpmailer/class.smtp.php';

        $pwd = Email::generateRandomString(5);
        $pwdBD = md5($pwd);
        //cifro la contraseña generada
        Conexion::ModificarUsuContra($para, $pwdBD);


//        $email_user = "AuxiliarDAW2@gmail.com";
//        $email_password = "Chubaca20";
//        $the_subject = "Se ha olvidado la contraseña ";
//        $address_to = $para;
//        $from_name = "Usuario";
//        $phpmailer = new PHPMailer();
//        // ---------- datos de la cuenta de Gmail -------------------------------
//        $phpmailer->Username = $email_user;
//        $phpmailer->Password = $email_password;
//        //-----------------------------------------------------------------------
//        // $phpmailer->SMTPDebug = 1;
//        $phpmailer->SMTPSecure = 'ssl'; //Puede ser TSL pero el puerto sería 587.
//        $phpmailer->Host = "smtp.gmail.com"; // GMail
//        $phpmailer->Port = 465;
//        $phpmailer->IsSMTP(); // use SMTP
//        $phpmailer->SMTPAuth = true;
//        $phpmailer->setFrom($phpmailer->Username, $from_name);
//        $phpmailer->AddAddress($address_to); // recipients email
//        $phpmailer->Subject = $the_subject;
//        $phpmailer->Body .= "<h1 style='color:#3498db;'>Un dos, si, hey, si, un dos!!!!</h1>";
//        $phpmailer->Body .= "<p>Mensaje personalizado</p>";
//        $phpmailer->Body .= "<p>Fecha y Hora: " . date("d-m-Y h:i:s") . "</p>";
//        $phpmailer->IsHTML(true);
//        if ($phpmailer->send()){
//            echo 'Correo enviado.';
//        }
//        else {
//            echo 'Se ha producido algún error en el envío.';
//        }
//Lo que viene a continuación sería para windows. Bajando la librería sendmail y configurando php.ini y sendmail.ini en XAMPP.        
//        $desde = "AuxiliarDAW2@gmail.com";
//        $destinatario = 'faranzabe@gmail.com';
//        $titulo = 'Se ha olvidado la contraseña ';
//        $cabeceras = phpversion();
//        //$cabeceras = "From:" . $desde;
//        $mensaje = 'Tu cuenta ha sido validada';
//        //mail($destinatario, $titulo, $mensaje);
//        mail($destinatario, $titulo, $mensaje, $cabeceras);
//        echo "El correo ha sido enviado.";
//
//        $cabeceras = 'From: webmaster@example.com' . "\r\n" .
//                'Reply-To: webmaster@example.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//        mail($para, $titulo, $mensaje, $cabeceras);
//        $destino = 'faranzabe@gmail.com';
//
//        $titulo = 'Se ha olvidado la contraseña ';
//        $cabeceras = 'From: Equipo' . "\r\n" .
//                'Reply-To: ese' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//        $mensaje = "Estamos estudiando su solicitud, recibirá un correo con toda la información necesaria";
//
//        mail($destino, $titulo, $mensaje, $cabeceras);
//        echo "El correo ha sido enviado.";





        $mensaje = "La nueva contraseña para entrar del usuario " . $para . " es: '" . $pwd . "'.";
        $asunto = "Se ha olvidado la contraseña ";
        if (mail($para, $asunto, $mensaje)) {
            header('Location: ../index.php');
        } else {
            header('Location: ../../vista/usuario/olvidarPwd.php');
        }
    }

    /**
     * Genera la contraseña
     * @param type $length
     * @return type
     */
    public static function generateRandomString($length) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

}
