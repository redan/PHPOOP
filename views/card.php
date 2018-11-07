<?php /** @var \app\models\Product $model */?>

<h1><?=$model->id?></h1>
<h2><?=$model->product?></h2>
<p><?=$model->info?></p>
<p><?=$model->price?></p>
<form action="" method="post">
    <input type="hidden" name="id" value="<?=$model->id?>">
    <input type="submit" value="Купить" name="addToBasket">
</form>