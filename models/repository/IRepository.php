<?php
namespace app\models\repository;


interface IRepository
{
    public function getOne($id);
    public function getAll();
    public function getTableName();
    public function getEntityClass();
}