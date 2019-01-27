<?php

namespace Controller;

use Model\Message;
use Model\Sender;
use Services\MailSender;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    private $sender;
    private $message;
    private $mailer;

    public function __construct()
    {
        $this->sender = new Sender();
        $this->message = new Message();
        $this->mailer = new MailSender();
    }

    public function sendEmail($request)
    {
        if($request->request->get('submit')){
            $this->sender->setUsername($request->request->get('usr_email'));
            $this->sender->setPassword($request->request->get('usr_psw'));
            $this->message->setRecipient($request->request->get('msg_recipient'));
            $this->message->setTitle($request->request->get('msg_title'));
            $this->message->setBody($request->request->get('msg_body'));
            $this->mailer->validateAndSend($this->message, $this->sender);
        };

        return ['template' => 'base.html.twig'];
    }
}