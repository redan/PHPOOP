<?php

namespace app\controllers;

use app\models\repository\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo "catalog";
    }

    public function actionCard()
    {
        $id = (new Request())->get('id');

        $model = (new ProductRepository())->getOne($id);
        echo $this->render("basket", ['model' => $model]);
    }
}