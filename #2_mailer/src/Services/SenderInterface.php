<?php

namespace Services;

interface SenderInterface
{
    public function send(string $recipient, string $title, string $body): void;
}