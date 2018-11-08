<?php

namespace app\controllers;

use app\base\App;
use app\models\Product;
use app\models\repository\BasketRepository;
use app\models\repository\ProductRepository;
use app\services\Request;

class BasketController extends Controller
{


    public function actionIndex()
    {
        $basket = App::call()->session->get('basket');
        $login = App::call()->session->get('login');
        $model = (new BasketRepository())->getAllFromLogin($login);
        if ($model){
            echo $this->render("basket", ['model' => $model]);
            if (isset($basket)) {
                $model = [];
                foreach ($basket['id'] as $key => $value) {
                    $product = (new ProductRepository())->getOne($key);
                    $price = (int)$product->price * $value['qty'];
                    $model['totalPrice'] += $price;
                    $model["productId$key"] = $product;
                    $model["productCount$key"] = $value['qty'];
                }
                echo $this->renderTemplate("sessionBasket", ['model' => $model]);
            }
        }else{
            $this->prepareBasket();
        }
        $this->actionAdd();
    }


    public function prepareBasket()
    {
        $basket = App::call()->session->get('basket');
        if (isset($basket)){
            $model = [];
            foreach ($basket['id'] as $key => $value){
                $product = (new ProductRepository())->getOne($key);
                $price = (int)$product->price*$value['qty'];
                $model['totalPrice'] += $price;
                $model["productId$key"] = $product;
                $model["productCount$key"] = $value['qty'];
            }
            echo $this->render("sessionBasket", ['model' => $model]);
        }else{
            $message = 'Корзина пуста';
            echo $this->render("message", ['message' => $message]);
        }
    }

    public function actionAdd(){
        $request = App::call()->request;
        if ($request->isPost()){
            $userName = $_SESSION['login'];
            $basket = base64_encode(serialize($_SESSION['basket']));
            $adress = $request->post('adress');
            $status = 'В пути';
            App::call()->basketRepo->addToBasket($userName, $basket, $adress, $status);
            unset($_SESSION['basket']);
        }
    }

}