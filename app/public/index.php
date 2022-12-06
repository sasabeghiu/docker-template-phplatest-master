<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

error_reporting(E_ALL);
ini_set("display errors", 1);

require __DIR__ . '/../switchrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new SwitchRouter();
$router->route($uri);

?>