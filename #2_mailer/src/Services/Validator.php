<?php

namespace Services;

class Validator implements ValidatorInterface
{
    public function validate(string $myStr): string
    {
        return preg_replace('/[^(\x20-\x7F)]*/','', $myStr);
    }
}