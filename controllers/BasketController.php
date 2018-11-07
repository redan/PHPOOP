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
        $id = App::call()->session->get('id');
        $model = (new BasketRepository())->getOne($id);
        if ($model){
            echo $this->render("basket", ['model' => $model]);
        }else{
            $this->prepareBasket();
        }
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
        $this->getSession();
        $request = App::call()->request;
        if ($request->isPost()){
            $adress = $request->post('adress');
            //todo
        }
    }

}