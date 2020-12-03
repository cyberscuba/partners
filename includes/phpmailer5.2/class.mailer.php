<?php

date_default_timezone_set('America/Bogota'); //Se define la zona horaria
require('class.phpmailer.php');
require('class.smtp.php');

class Mailer{
    
    public function sendEmail($datos)
    {
        $mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.

        $mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP

        try 
        {
            $correo_emisor = $datos['email_remitente'];//Correo a utilizar para autenticarse
            //con Gmail o en caso de GoogleApps utilizar con @tudominio.com
            $nombre_emisor = $datos['nombre_remitente'];//Nombre de quien envía el correo
            $contrasena = $datos['passwd_remitente'];//contraseña de tu cuenta en Gmail
            //--------------------------------------------------------
            $mail->SMTPDebug  = 0;                     // Habilita información SMTP (opcional para pruebas)
                                                         // 1 = errores y mensajes
                                                         // 2 = solo mensajes
            $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP
            $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
            $mail->Host       = "mail.worktic.co";      // Establece Gmail como el servidor SMTP
            //$mail->Host       = "mail.teletiquete.com";      // Establece Gmail como el servidor SMTP
            $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
            $mail->Username   = $correo_emisor;         // Usuario Gmail
            $mail->Password   = $contrasena;           // Contraseña Gmail
            //A que dirección se puede responder el correo
            $mail->AddReplyTo($correo_emisor, $nombre_emisor);
            //La direccion a donde mandamos el correo
            
            $cant_destinatario = count($datos['destinatarios']);
            
            for($i = 0; $i < $cant_destinatario; $i++)
            {
                if($datos['destinatarios'][$i]['oculto']){
                    $mail->AddBCC($datos['destinatarios'][$i]['email_destinatario'], $datos['destinatarios'][$i]['nombre_destinatario']);
                }else{
                    $mail->AddAddress($datos['destinatarios'][$i]['email_destinatario'], $datos['destinatarios'][$i]['nombre_destinatario']);
                }
            }
            
            //$mail->AddAddress($correo_destino, $nombre_destino);
            //$mail->AddAddress('luispuentesvega@gmail.com', 'Este si es');
            //De parte de quien es el correo
            $mail->SetFrom($correo_emisor, $nombre_emisor);
            //Asunto del correo
            $mail->Subject = $datos['asunto'];
            //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
            $mail->AltBody = $datos['mensaje_alternativo'];
            //El cuerpo del mensaje, puede ser con etiquetas HTML
            $mail->MsgHTML($datos['mensaje_html']);
            //Archivos adjuntos
            if(isset($datos['adjunto']) AND !empty($datos['adjunto']))
            {
                if(is_array($datos['adjunto']))
                {
                    foreach($datos['adjunto'] as $adjunto)
                        $mail->AddAttachment($adjunto);
                }
                else
                    $mail->AddAttachment($datos['adjunto']);      // Archivos Adjuntos
            }
            
//            print_r($mail);EXIT;
                
            //Enviamos el correo
            try {
                $mail->Send();
            } catch (Exception $exc) {
                //echo $exc->getCode();
                echo $exc->getMessage();
                //echo $exc->getFile();
            }

            return 1;
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Errores de PhpMailer
            return 0;
        }
    }
}

?>