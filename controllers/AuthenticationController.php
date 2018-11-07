<?php

namespace app\controllers;


use app\base\App;

class AuthenticationController extends Controller
{
    public function actionIndex()
    {
        $message = "";
        $request = App::call()->request;
        if($request->isPost()){
            $login = $request->post('login');
            $password = $request->post('password');
            $user = App::call()->userrepo->getLoginPassAut($login, $password);
            $id = $user['id'];
            if($user){
                $session = App::call()->session;
                $session->set('id', $id);
                $session->set('login', $login);
                $this->actionWelcome();
            }
            $message = "Неправильное имя или пароль";
        }
        echo $this->render('authentication' , ['message' => $message]);
    }

    public function actionWelcome()
    {
        echo $this->render('welcome');
        die;
    }
}