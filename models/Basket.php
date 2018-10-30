<?php

namespace app\models;


class Basket extends DataEntity
{
    public $id;
    public $userName;
    public $basket;
    public $adress;
    public $status;

    public function prepareBasket()
    {
        return $this->basket = base64_decode(unserialize($this->basket));
    }

}