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

               <!-- <div class="row"> -->
                  <div class=" col-12">
                    <textarea name="" id="" cols="60" rows="10" placeholder="Enter your comment.."></textarea>
                  <!-- </div> -->
              </div> 

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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Запустить модальное окно
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" id="ajax_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <input type="text" name="rating" placeholder="enter rating"> <br>
                <input type="text" name="comment" placeholder="enter comment"> <br>
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        </div>
        <hr>
        <div  action="" id="result_form"></div>
        <div class="modal-footer">
          <button type="button" data-id="<?php echo $product['id']; ?>"  id="submitComment" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>