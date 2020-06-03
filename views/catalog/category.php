<?php include ROOT . '/views/layouts/header.php'; ?>

<main>

    <!-- <div class="sidebar">
        <ul>
        <?php foreach($categories as $categoryItem): ?>
            <li>
                <a href="/category/<?php echo $categoryItem['id'];?>" class='pl-4'>
                    <?php echo $categoryItem['name'];?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div> -->
<div class="container">

    <section class="products">
        <h2 class="products__title">
        <?php
            foreach($categories as $categoryItem) 
                if ($categoryId == $categoryItem['id']) echo $categoryItem['name']; ?>
        </h2>

        
        
        <ul class="products__list row">
                        <?php foreach ($categoryProducts as $product): ?>
                            <li class="products__card col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                                <div class="card text-center pb-4">
                                    <div class="card-header mb-3">
                                        <p >
                                            <a href="/product/<?php echo $product['id']; ?>" class='card__name text-dark'>
                                            <?php
                                                if (mb_strlen($product['name']) <= 23 )
                                                {
                                                    echo $product['name']." ";
                                                    echo Feedback::getRating($product['id']);
                                                }
                                                else 
                                                {   
                                                    echo trim(mb_substr($product['name'], 0, 22))."..|";
                                                }
                                                
                                            ?>
                                            </a>
                                        </p>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <img class="card__img" src="../../upload/images/products/33.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="test"></div>
                                    <h2 class='card__price mb-3 text-warning'>$<?php echo $product['price']; ?></h2>
                                    <div class="buy__panel d-flex justify-content-center">
                                        <button class="btn btn-dark card__btn mr-4">Купить</button>
                                        <button class="btn btn-dark  rounded-circle card__btn cart-btn add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i></button>
                                        <button class="context-btn ml-4"><i class="fas fa-ellipsis-h"></i></и>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
    </section>       

</div>

</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>