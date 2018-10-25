<?php

namespace app\models;


class Basket extends DataModel
{
    public $id;
    public $userName;
    public $Basket;
    public $adress;
    public $status;


    public static function getTableName()
    {
        return 'orders';
    }
}