<?php

require_once("vendor/autoload.php");

use Raw\Data\DatabaseFactory;
use Raw\Core\URLParser;
use Raw\Controllers\IndexController;

$db_config = include('config/database.php');
$db = DatabaseFactory::getInstance('mysql', $db_config['database']['mysql']);

$route_info = URLParser::parse();
// echo '<pre>';
// print_r($route_info);
// print_r($route_info['controller']);

$controller = "Raw\\Controllers\\".$route_info['controller'];
$method = $route_info['method'];

try {
    $c = new $controller;
    echo $c->$method();
} catch (Exception $e) {
    echo 'err';
    error_log($e->getMessage());
}