<?php

namespace app\models\repository;

use app\models\Product;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return 'shop';
    }

    public function getEntityClass()
    {
        return Product::class;
    }

    public function getProductsWithDiscount()
    {

    }
}