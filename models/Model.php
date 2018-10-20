<?php

namespace app\models;

use app\services\Db;

abstract class Model implements IModel
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getAll(){
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        return $this->db->queryAll($sql);
    }

    public function getOne($id){
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
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