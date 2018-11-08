<?php /** @var \app\models\Basket $model */;?>

<h1>Заказчик: <?=$model[0]['userName']?></h1>
<?php foreach ($model as $id => $order):
    $basket = $order['basket'];
    $basket = base64_decode($basket);
    $basket = unserialize($basket);
foreach ($basket as $key => $value) :
    $product = \app\base\App::call()->productRepo->getOne(key($value));
?>
    <p>Товар: <?=$product->product?></p>
    <p>Количество: <?=$value[key($value)]['qty']?></p>
    <p>Адрес: <?=$order['adress']?></p>
    <p>Статус: <?=$order['status']?></p>
    <hr>
<?php endforeach ?>
<?php endforeach ?>
