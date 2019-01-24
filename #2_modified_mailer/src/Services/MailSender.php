<?php


namespace Services;

use Model\Message;
use \Services\SymbolEscaper;
use \Services\MailerClient;


class MailSender
{

    public function sendEmail(Message $message)
    {
        print_r($message);
    }
}