<?php

require __DIR__ . '/vendor/autoload.php';
use Application\error;
use Application\Module;

class routing
{

    private $routes;
    public $actualRoute;

    public function __construct($route = "/")
    {
        $this->actualRoute = (substr($route, -1) !== '/') ? $route."/" : $route;

        $this->routes = array(
            "/" => array("test", "Index"),
            "/api/test/" => array("Test", "Index"),
        );
    }


    public function getResponse()
    {

        if ($this->getRoute($this->actualRoute))
        {

            $route = $this->routes[$this->actualRoute];
            
            $Classe = $route[0];
            $ClasseNamespace = '\\Application\\'.$route[0];

            $Methode = $route[1];

            include_once "Application/".$Classe.".php";

            $instance = new $ClasseNamespace();

            $data = array();

            return call_user_func_array([$instance, $Methode], $data);
        }
        else
        {
            return error::return_error("500");
        }

    }

    public function getRoute($route) {
            return isset($this->routes[$route]);
    }
}