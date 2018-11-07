<?php

namespace app\models\repository;


use app\models\User;

class UserRepository extends Repository
{
    public function getTableName()
    {
        return 'Users';
    }

    public function getEntityClass()
    {
        return User::class;
    }

    public function getLoginPassAut($login, $password)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE login = :login AND password = :password";
        return static::getDb()->queryOne($sql, [':login' => $login, ':password' => $password]);
    }

    public function executeNewUser($login, $password, $email)
    {
        $table = $this->getTableName();
        $sql = "INSERT INTO {$table} (login, password, email) VALUES (:login, :password, :email)";
        return static::getDb()->execute($sql, [':login' => $login, ':password' => $password, ':email' => $email]);
    }
}