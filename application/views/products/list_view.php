<section class="h1"><?= $title ?></section>
<ul class="products">
    <?php foreach($products as $product): ?>
        <li>
            <a href="/products/view/<?php echo $product['id']; ?>
            ">
                <div class="products_img">
                    <img src="/images/content/prod_1.png" alt="">
                </div>
                <div class="products_title">
                    <span><?php echo $product['title']; ?></span>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

