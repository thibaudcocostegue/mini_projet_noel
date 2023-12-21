<?php
require "routing.php";

$routing = new routing($_SERVER['REQUEST_URI']);

$routing->getResponse();
?>