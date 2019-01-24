<?php

namespace Services;

use \Services\Validator;
use \Services\SendClient;

class Container
{

    private $sender;
    private $validator;
    private $sendClient;

    public function getSender(): Sender
    {
        if ($this->sender === null) {
            $this->sender = new Sender($this->getValidator(), $this->getSendClient());
        }
        return $this->sender;
    }

    private function getValidator(): \Services\Validator
    {
        if ($this->validator === null) {
            $this->validator = new \Services\Validator();
        }
        return $this->validator;
    }

    private function getSendClient(): \Services\SendClient
    {
        if ($this->sendClient === null) {
            $this->sendClient = new \Services\SendClient();
        }
        return $this->sendClient;
    }


}

