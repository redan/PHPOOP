<h1>Корзина</h1>
<?php
foreach ($model as $key => $value){
    $need = 'productId';
    $pos = strripos($key, $need);
    if($pos === false){
        continue;
    }else{
        $id = str_replace('productId', '',$key);
        $product = $value->product;
        $count = $model["productCount$id"];
        $price = $value->price*$count;
        echo ("<p>Товар: $product</p><p>Количество: $count</p><p>Цена: $price</p>");
    }
}
?>
<p>Общая ценна: <?=$model['totalPrice']?></p>
<form action="" method="post">
    Адрес:<input type="text" name="adress">
    <input type="submit" value="Сделать заказ">
</form>

