<?php


namespace Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerClient
{
    public function send($msg, $sender)
    {
        try{
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->isHTML();
            $mail->Username = $sender->getUsername();
            $mail->Password = $sender->getPassword();
            $mail->setFrom('no-reply@gmail.com');
            $mail->Subject = $msg->getTitle();
            $mail->Body = $msg->getBody();
            $mail->addAddress($msg->getRecipient());
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            throw new \Exception('Message could not be sent. Mailer Error: '. $mail->ErrorInfo);
        }
    }
}

