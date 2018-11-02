<?php /** @var \app\models\Product $products */?>

<div class="catalog">
    <ul>
        <?php foreach ($products as $product) : ?>
        <li>
            <a href="/product/card/?id=<?=$product['id']?>">
                <?echo $product['product']?>
            </a></li>
        <? endforeach;?>
    </ul>
</div>
