<?php

namespace Services;


class Sender implements SenderInterface
{
    /**
     * @var Validator $validator
     */
    private $validator;
    /**
     * @var SendClient $sendClient
     */
    private $sendClient;
    /**
     * @var array $messageData
     */
    private $messageData = [];

    public function __construct($validator, $sendClient)
    {
        $this->validator = $validator;
        $this->sendClient = $sendClient;
    }

    /**
     * @param string $recipient
     * @param string $title
     * @param string $body
     * @return mixed
     */
    public function send(string $recipient, string $title, string $body): void
    {
        $this->messageData['recipient'] = $recipient;
        $this->messageData['title'] = $title;
        $this->messageData['body'] = $this->validator->validate($body);
        $this->sendClient->mail($this->messageData['recipient'], $this->messageData['title'], $this->messageData['body']);
    }

}