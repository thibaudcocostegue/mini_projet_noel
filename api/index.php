<?php
require "routing.php";

$routing = new routing($_SERVER['REQUEST_URI']);
/*
$data = array('message' => 'Hello, World!');
$json = json_encode($data);
*/


header('Content-Type: application/json');
echo $json = json_encode($routing->getResponse());
?>