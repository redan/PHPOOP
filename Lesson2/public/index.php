<?php
include $_SERVER['DOCUMENT_ROOT']. "/Lesson2/services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$product = new \app\models\Product(new app\services\Db);

var_dump($product);