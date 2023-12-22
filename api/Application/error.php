<?php

namespace Application;

class error_api
{
    public static function return_error($code_error)
    {
        return array("Error ".$code_error => "Une erreur est survenue");
    }
}