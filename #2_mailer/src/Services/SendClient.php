<?php

namespace Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendClient implements SendClientInterface
{
    /**
     * @param string $email
     * @param string $title
     * @param string $msg
     */
    public function mail(string $email, string $title, string $msg): void
    {
        try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->isHTML();
        $mail->Username = 'enterIt@gmail.com';
        $mail->Password = 'enterIt';
        $mail->setFrom('no-reply@gmail.com');
        $mail->Subject = $title;
        $mail->Body = $msg;
        $mail->addAddress($email);
        $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}