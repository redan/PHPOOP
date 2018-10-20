<?php

namespace app\services;

class Autoloader
{
    /**
     * @param $className - имя используемого класса
     */
    public function loadClass($className){
        $className = str_replace(["app\\", "\\"], [ROOT_DIR , "/"], $className);
        $className .= ".php";
        if(file_exists($className)){
            include $className;
            }
    }
}