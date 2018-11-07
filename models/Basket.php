<?php

namespace app\models;

use app\base\App;

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

    public function add($productId, $qty = 1){
        $basket = $this->getSession();
        if (isset($basket['id'][$productId])){
            $basket['id'][$productId]['qty'] += (int) $qty;
        }else{
            $basket['id'][$productId]['qty'] = (int) $qty;
        }
        App::call()->session->set('basket', $basket);
    }

    public function getSession(){
        $session = App::call()->session;
        return $session->get('basket');
    }
}