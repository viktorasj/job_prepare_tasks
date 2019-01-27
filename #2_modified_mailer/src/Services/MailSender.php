<?php


namespace Services;

use Model\Message;
use Model\Sender;
use \Services\SymbolEscaper;
use \Services\MailerClient;


class MailSender
{

    public function validateAndSend(Message $message, Sender $sender)
    {
        $symbolEscaper = new \Services\SymbolEscaper();
        $mailerClient = new \Services\MailerClient();

        $message->setBody($symbolEscaper->validate($message->getBody()));
        $mailerClient->send($message, $sender);
    }
}