<?php

namespace app\services;

class Autoloader
{
    public $dirName = 'WorkingSpace';
    /**
     * @param $className - имя используемого класса
     */
    public function loadClass($className){
        $className = str_replace('app', 'WorkingSpace', $className);
        $filename = $_SERVER['DOCUMENT_ROOT']. "/{$className}.php";
        if(file_exists($filename)){
            include $filename;
            }
    }
}