<?php

namespace app\services;

class Autoloader
{
    public $dirName = 'Lesson2';
    /**
     * @param $className - имя используемого класса
     */
    public function loadClass($className){
        $className = str_replace('app', 'Lesson2', $className);
        $filename = $_SERVER['DOCUMENT_ROOT']. "/{$className}.php";
        if(file_exists($filename)){
            include $filename;
            }
    }
}