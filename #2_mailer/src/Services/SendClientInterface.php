<?php

namespace Services;


interface SendClientInterface
{
    public function mail(string $email, string $title, string $msg): void;
}