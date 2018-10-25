<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "/services/Autoloader.php";
include ROOT_DIR . "/vendor/autoload.php";


spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

//$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
//$actionName = $_GET['a'];
//
//$controllerClass = CONTROLLERS_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";
//
//if(class_exists($controllerClass)){
//    $controller = new $controllerClass;
//    $controller->run($actionName);
//}
$product = array(
    'product' => 'product1',
    'price' => '10.00',
    'description' => 'Good product'
);

$loader = new Twig_Loader_Filesystem(ROOT_DIR . '/views');
$twig = new Twig_Environment($loader);

echo $twig->render('templateForTwig.php', $product);