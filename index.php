<?php
require_once 'vendor/autoload.php';

chdir(dirname(__DIR__));

define("SYS_PATH", "Core/");

require SYS_PATH . "Router.php";
require "Application/Config/Routes.php";

$files = glob(__DIR__.'/Application/Config/env/*.private.env');
foreach ($files as $file) {
    $dirFile = dirname($file);
    if(file_exists(dirname($file) . '/local/' . basename($file))) {
        $dirFile = dirname($file) . '/local/';
    }
    try {
        $dotEnv = new Dotenv\Dotenv('/app/Application/Config/env','db.private.env');
        $dotEnv->load();
    } catch (Exception $e) {
        var_dump($e->getMessage());exit;
    }
}

$url = explode( '/', $_SERVER['REQUEST_URI'] );
$url = array_values( array_filter( $url ) );

$route = $url[0];
$params = isset($url[1])?$url[1]:'';

try {
    $action = \Core\Router::getAction($route);
    $moduleName = $action['module'];
    $controllerName = $action['controller'];
    $method = $action['method'];
    $class = "Application\\".$moduleName."\\Controller\\".$controllerName;
    $controller = new $class();
    $controller->$method($params);
} catch (Exception $e) {
    echo $e->getMessage();
}