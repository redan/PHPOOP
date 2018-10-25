<?php

namespace app\controllers;


class BasketController
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
        $id = $_GET['id'];
        $model = Basket::getOne($id);
        echo $this->render("basket", ['model' => $model]);
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