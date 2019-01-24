<?php

namespace Model;

class Message
{
    private $recipient;
    private $title;
    private $body;

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     */
    public function setRecipient(string $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $messageTitle
     */
    public function setTitle(string $messageTitle)
    {
        $this->title = $messageTitle;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $messageBody
     */
    public function setBody(string $messageBody)
    {
        $this->body = $messageBody;
    }

}