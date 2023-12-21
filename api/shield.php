<?php

class shield
{
    public function cleanString(string $string)
    {
        $sanitizedString = trim($string);

        $sanitizedString = htmlspecialchars($sanitizedString, ENT_QUOTES, 'UTF-8');

        return $sanitizedString;
    }
}