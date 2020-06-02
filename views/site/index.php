<?php include ROOT . '/views/layouts/header.php'; ?>
    
    <main>
        <div class="container">
            <section class="products">
                    <h2 class="products__title">Последние товары</h2>

                    <ul class="products__list">
                        <?php foreach ($latestProducts as $product): ?>
                            <li class="card products__card">
                                <div class="card__inner">
                                    <p>
                                        <a href="/product/<?php echo $product['id']; ?>" class='card__name'>
                                        <?php
                                            if (mb_strlen($product['name']) <= 23 )
                                                echo $product['name'];
                                            else echo trim(mb_substr($product['name'], 0, 22))."..";
                                            
                                        ?>
                                        </a>
                                    </p>
                                    <div class="card__img-wrap ibg">
                                        
                                    </div>
                                    <h2 class='card__price'>$<?php echo $product['price']; ?></h2>
                                    <div class="buy__panel">
                                        <button class="btn card__btn">Купить</button>
                                        <button class="btn card__btn cart-btn" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i></button>
                                        <button class="context-btn"><i class="fas fa-ellipsis-h"></i></и>
                                    </div>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>


                </section>            
        </div>
    </main>

<?php include ROOT . '/views/layouts/footer.php'; ?> 