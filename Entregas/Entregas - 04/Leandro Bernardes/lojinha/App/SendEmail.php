<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendEmail{

    public function send($email,$frete,$total,$prod){
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.gabrielhenriq.com.br';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aulas@gabrielhenriq.com.br';                     //SMTP username
            $mail->Password   = '01020304@#$';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('aulas@gabrielhenriq.com.br', 'Lojinha');
            $mail->addAddress($email, 'Leandro Bernardes');      //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Compra Aprovada';
            $mail->Body    = 'Compra aprovada no valor de R$ '.$total.'<br>Valor do Frete R$ '.$frete.'
            <br>Valor do produto R$ '.($total-$frete).'<br>Produto: '.$prod;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            var_dump($e);
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

}


?>