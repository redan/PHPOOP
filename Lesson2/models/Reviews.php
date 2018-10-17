<?php


namespace app\models;


class Reviews extends Model
{
    public $reviews;
    public $newReview;

    public function getTableName()
    {
        return 'reviews';
    }
}