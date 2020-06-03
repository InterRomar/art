<?php include ROOT . '/views/layouts/header.php'; ?>

<script>
async function hello() {
  let data = await '<?php echo json_encode($comments)?>'
  
  console.log(JSON.parse(data));
  // console.log(data);
  
}
  
  
</script>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Каталог</h2>
          <div class="panel-group category-products">
            <?php foreach ($categories as $categoryItem): ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="/category/<?php echo $categoryItem['id']; ?>">
                    <?php echo $categoryItem['name']; ?>
                  </a>
                </h4>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-sm-9 padding-right">
        <div class="product-details">
          <div class="row">
            <div class="col-sm-5">
              <div class="view-product">
                <img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
              </div>
            </div>
            <div class="col-sm-7">
              <div class="product-information">

                <?php if ($product['is_new']): ?>
                <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                <?php endif; ?>

                <h2><?php echo $product['name']; ?></h2>
                <p>Код товара: <?php echo $product['code']; ?></p>
                <span>
                  <span>US $<?php echo $product['price']; ?></span>
                  <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-default add-to-cart">
                    <i class="fa fa-shopping-cart"></i>В корзину
                  </a>
                </span>
                <p><b>Наличие:</b> <?php echo Product::getAvailabilityText($product['availability']); ?></p>
                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-sm-12">
              <br />
              <h5>Описание товара</h5>
              <p class="product__description">
                <?php echo $product['description']; ?>
              </p>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-sm-12">
              <br />
              <h5>Рейтинг:
              <?php echo Feedback::getRating($product['id']); ?>
              </h5>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <h5>Комментарии</h5>
              <?php foreach($comments as $comment):?>
              <?php
                    // for($i = 0;$i < 5; $i++)
                    //     if($comment['rating']>$i)
                    //     echo "*";
                    //     else echo"-";
                    ?>
                    <small>
                      <?php echo $comment['rating']  ?>
                    </small>
              <b><?php echo $comment['comment'];?></b>
              <b><?php echo ' '.User::getUserNameById($comment['id_user']);?></b><br>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>