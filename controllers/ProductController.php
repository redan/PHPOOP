<?php

namespace app\controllers;


use app\models\Product;

class ProductController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function run($action = null)
    {
        $this->action = $action?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if(method_exists($this, $method)){
            $this->$method();
        }else{
            echo "404";
        }
    }

    public function actionIndex()
    {
        echo "catalog";
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $model = Product::getOne($id);
        echo $this->render("card", ['name'=>'product', 'description'=>'bebefbee']);
    }

    public function render($template, $params = [])
    {
        if($this->useLayout){
            $content = $this->renderTemplate($template, $params);
            return $this->renderTemplate("layouts/{$this->layout}", ['content' => $content]);
        }else{
            $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        include TEMPLATES_DIR . $template . ".php";
        return ob_get_clean();
    }
}