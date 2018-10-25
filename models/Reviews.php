<?php


namespace app\models;


class Reviews extends DataModel
{
    public $reviews;
    public $newReview;

    public static function getTableName()
    {
        return 'reviews';
    }
}