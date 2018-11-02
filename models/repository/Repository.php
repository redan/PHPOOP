<?php

namespace app\models\repository;

use app\base\App;
use app\models\DataEntity;
use app\services\Db;

abstract class Repository implements IRepository
{
    private $db;

    public function __construct()
    {
        $this->db = static::getDb();
    }

    public function getOne($id)
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return static::getDb()->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return static::getDb()->queryAll($sql);
    }

    public function delete(DataEntity $entity)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $this->db->execute($sql, [':id' => $entity->id]);
    }

    //['name' => 'dkfjk']
    public function insert(DataEntity $entity)
    {
        $columns = [];
        $params = [];

        foreach ($entity as $key => $value) {
            if ($key == 'db') {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $table = $this->getTableName();
        // INSERT INTO products (id, name, description) VALUES (:id, :name, :descritpion)
        $sql = "INSERT INTO `{$table}` ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity)
    {

    }

    public function save(DataEntity $entity)
    {
        if(is_null($entity->id)){
            $this->insert($entity);
        }else{
            $this->update($entity);
        }
    }

    private static function getDb(){
        return App::call()->db;
    }
}