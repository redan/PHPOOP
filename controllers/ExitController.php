<?php

namespace app\controllers;


class ExitController extends Controller
{
    public function actionIndex(){
        session_start();
        session_destroy();
        echo $this->render('index');
    }
}