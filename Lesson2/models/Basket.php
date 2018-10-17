<?php

namespace app\models;


class Basket extends Model
{
    public $order;
    public $orderHistory;
    public $sum;
    public $personalSale;


    public function getTableName()
    {
        return 'basket';
    }
}