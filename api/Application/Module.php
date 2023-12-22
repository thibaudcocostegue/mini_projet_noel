<?php

namespace Application;

require __DIR__."/../error.php";

class Module
{

    protected $token;

    protected $header;

    function __construct()
    {
        
        $this->header = apache_request_headers();
        $this->token = (isset($this->header["token"])) ? $this->header["token"] : "";

        if (!$this->verifyToken())
        {
            $this->returnJson(error_api::return_error("401"));
            die();
        }
    }

    static function log()
    {
        Logger::enableSystemLogs();
    }

    private function verifyToken()
    {
        if ($this->token == "")
        {
            return false;
        }
        return true;
    }

    public function returnJson(array $array = array())
    {
        header('Content-Type: application/json');
        echo json_encode($array);   
    }
}