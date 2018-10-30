<?php

namespace app\models;


class Basket extends DataEntity
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