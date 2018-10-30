<?php /** @var \app\models\Basket $model */
$basket = $model->basket;
$basket = base64_decode($basket);
$basket = unserialize($basket);
;?>

<h1><?=$model->userName?></h1>
<?php foreach ($basket[0] as $key => $value) : ?>
<h2><?=$key?>:</h2>
<p><?=$value?></p>
<?php endforeach ?>
<p>Адрес:<?=$model->adress?></p>
<p>Статус:<?=$model->status?></p>