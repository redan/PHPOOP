<?php

namespace app\models;

use app\services\Db;

abstract class DataModel implements IModel
{
    private $db;

    public  function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getAll(){
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getOne($id){
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, [':id' => $id]);
    }

    public function insert(){
        $table = $this->getTableName();
        $columns = [];
        $params = [];

        foreach ($this as $key => $value){
            if ($key = 'db'){
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(",", array_keys($params));

        $sql = "INSET INTO `{$table}` ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function delete(){
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
    }
}