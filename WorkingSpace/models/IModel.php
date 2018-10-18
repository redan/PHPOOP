<?php

namespace app\models;


interface IModel
{
    public function getTableName();
    public function getOne($id);
    public function getAll();
}