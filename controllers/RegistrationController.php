<?php


namespace app\controllers;

use app\base\App;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        $request = App::call()->request;
        if($request->isPost()){
            $login = $request->post('login');
            $password = $request->post('password');
            $email = $request->post('email');
            App::call()->userrepo->executeNewUser($login, $password, $email);
            //Берем id нового юсера
            $user = App::call()->userrepo->getLoginPassAut($login, $password);
            $id = $user['id'];
            //Добавляем в сессию (сразу авторизуем)
            $session = App::call()->session;
            $session->set('id', $id);
            $session->set('login', $login);
            $this->actionWelcome();
        }
        echo $this->render('registration');
    }

    public function actionWelcome()
    {
        echo $this->render('welcome');
        die;
    }
}