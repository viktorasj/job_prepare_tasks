<?php

namespace Controller;

use Model\Message;
use Services\MailSender;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    private $message;
    private $mailer;

    public function __construct()
    {
        $this->message = new Message();
        $this->mailer = new MailSender();
    }

    public function sendEmail($request)
    {
        if($request->request->get('submit')){
            $this->message->setRecipient($request->request->get('msg_recipient'));
            $this->message->setTitle($request->request->get('msg_title'));
            $this->message->setBody($request->request->get('msg_body'));
            $this->mailer->sendEmail($this->message);
        };

        return ['template' => 'base.html.twig'];
    }
}