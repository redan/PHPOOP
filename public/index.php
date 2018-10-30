<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "/vendor/autoload.php";

$request = new \app\services\Request();

$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );
    $controller->run($actionName);
}
//var_dump(base64_decode(unserialize($basket)));