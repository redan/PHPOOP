<?php

namespace app\controllers;

use app\services\renderers\IRenderer;
use app\base\App;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $layoutForNewUser = 'newMain';
    protected $useLayout = true;

    protected $renderer = null;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function run($action = null)
    {
        $this->action = $action?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if(method_exists($this, $method)){
            $this->$method();
        }else{
            header('HTTP/1.1 404 Not Found', true, 404);
        }
    }

    public function render($template, $params = [])
    {
        if($this->useLayout){
            $content = $this->renderTemplate($template, $params);
            if(!empty(App::call()->session->get('login'))){
                $content = $this->renderTemplate("layouts/{$this->layout}", ['content' => $content]);
            }else{
                $content = $this->renderTemplate("layouts/{$this->layoutForNewUser}", ['content' => $content]);
            }
            return $content;
        }else{
            $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }
}