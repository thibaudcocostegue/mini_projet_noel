<?php
require "Module.php";
class Test extends Module
{
    public function index()
    {
        $this->returnJson( ["response"=>"TEST"]);
    }
}