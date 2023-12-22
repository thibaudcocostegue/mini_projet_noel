<?php

namespace Application\Controller;


class Test extends Module
{
    public function index()
    {
        $this->returnJson( ["response"=>"TEST"]);
    }
}