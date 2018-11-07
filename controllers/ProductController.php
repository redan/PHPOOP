<?php

namespace app\controllers;

use app\base\App;
use app\models\Basket;
use app\models\repository\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function getSession()
    {
        $session = App::call()->session;
        return $session->get('login');
    }

    public function actionCard()
    {
        $this->actionAdd();
        $id = (new Request())->get('id');
        $model = (new ProductRepository())->getOne($id);
        echo $this->render("card", ['model' => $model]);
    }

    public function actionAdd()
    {
        $this->getSession();
        $request = App::call()->request;
        $add = $request->post('addToBasket') ?? null;
        if($add){
            $productId = $request->post('id');
            //Добавляем в сессию
            (new Basket())->add($productId);
        }
    }
}