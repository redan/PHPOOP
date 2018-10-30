<?php

namespace app\controllers;

use app\models\repository\BasketRepository;
use app\services\Request;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo "Basket";
    }


    public function actionBasket()
    {
        $id = (new Request())->get('id');

        $model = (new BasketRepository())->getOne($id);
        echo $this->render("basket", ['model' => $model]);
    }

}