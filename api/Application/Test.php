<?php

namespace Application;

use Application\Module;

class Test extends Module
{

    public function __construct()
    {
        parent::__construct();
    }



    
    public function index()
    {
        $this->returnJson(["response"=>"TEST"]);
    }
}