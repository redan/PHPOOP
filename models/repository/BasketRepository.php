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

    public function addToBasket($userName, $basket, $adress, $status)
    {
        $table = $this->getTableName();
        $sql = "INSERT INTO {$table} (userName, basket, adress, status) VALUES (:userName, :basket, :adress, :status)";
        return static::getDb()->execute($sql, [':userName' => $userName, ':basket' => $basket, ':adress' => $adress, ':status' => $status]);
    }

    public function getAllFromLogin($login)
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE userName = :userName";
        return static::getDb()->queryAll($sql, [':userName' => $login], $this->getEntityClass());
    }

}