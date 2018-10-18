<?php

namespace app\models;

use app\services\IDb;

abstract class Model implements IModel
{
    private $db;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public function getAll(){
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        return $this->db->queryAll($sql);
    }

    public function getOne($id){
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }
}