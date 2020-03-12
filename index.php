<?php

require_once("vendor/autoload.php");

use Raw\Data\DatabaseFactory;
use Raw\Core\URLParser;
use Raw\Controllers\IndexController;

define('MYSQL_DBTYPE', 'mysql');

$db_config = include('config/database.php');
$db = DatabaseFactory::getInstance('mysql', $db_config['database'][MYSQL_DBTYPE])->connect();

$route_info = URLParser::parse();

$controller = "Raw\\Controllers\\" . $route_info['controller'];
$method = $route_info['method'];

try {
    $c = new $controller;
    echo $c->$method();
} catch (Exception $e) {
    echo 'err';
    error_log($e->getMessage());
}