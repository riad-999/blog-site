<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include $ROOT_PATH . '/vendor/autoload.php';

class Mail
{
    private $sender;
    private $password;

    public function __construct(string $sender, string $password)
    {
        $this->sender = $sender;
        $this->password = $password;
    }
    public function mail(array $recipients, array $body, string $subject): bool
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->do_debug = 0;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->sender;                     //SMTP usernam e
            $mail->Password   = $this->password;                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //subject 
            $mail->Subject = $subject;
            //Recipients
            $mail->setFrom($this->sender, 'riad');
            foreach ($recipients as $recipient) {
                $mail->addAddress($recipient, SITE_NAME);
            }


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $body['html-body'];
            $mail->AltBody = $body['text-body'];

            $mail->send();
            return true;
        } catch (Throwable $e) {
            return false;
        }
    }
}