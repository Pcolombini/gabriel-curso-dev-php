<?php
namespace Joaolucas\Frete\Classes;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class EmailSend
{

    public function Send($nome,$email,$valort)
    {
        $mail = new PHPMailer(true);


        try {
            //Server settings                 //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.gabrielhenriq.com.br';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aulas@gabrielhenriq.com.br';                     //SMTP username
            $mail->Password   = '01020304@#$';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
           
            //Recipients
            $mail->setFrom('aulas@gabrielhenriq.com.br', 'Mailer');
            $mail->addAddress($email, 'O poderoso mago');     //Add a recipient
        

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nota Fiscal';
            $mail->Body    = 'Olá comprador,<br>
            O usuario ' . $nome . '. Acaba de realizar uma compra no valor de '. $valort .'.<br><br>att:Equipe de atendimento ';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
