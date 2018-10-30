<?php


namespace app\models\repository;

use app\models\Basket;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

}