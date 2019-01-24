<?php

namespace Services;

interface ValidatorInterface
{
    public function validate(string $myStr): string;
}