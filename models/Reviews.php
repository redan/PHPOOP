<?php


namespace app\models;


class Reviews extends DataEntity
{
    public $reviews;
    public $newReview;

    public static function getTableName()
    {
        return 'reviews';
    }
}