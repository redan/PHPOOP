<?php

namespace app\controllers;

use app\models\repository\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = (new Request())->get('id');

        $model = (new ProductRepository())->getOne($id);
        echo $this->render("card", ['model' => $model]);
    }
}