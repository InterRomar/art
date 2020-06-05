<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
  <div class="container">
    <div class="row">

      <div class="col-sm-9 padding-right">
        <div class="features_items">
          <h2 class="title text-center">Корзина</h2>

          <?php if ($productsInCompare): ?>
          <p>Вы выбрали такие товары:</p>
          <table class="table-bordered table-striped table">
            <tr>
              <?php foreach ($products as $product): ?>

              <th>
                <a href="/product/<?php echo $product['id'];?>">
                  <?php echo $product['name'];?>
                </a>
              </th>

              <?php endforeach; ?>
            </tr>

            <?php foreach ($products as $product): ?>
            <tr>
              <td><?php echo $product['code'];?></td>
              <td>
                <a href="/product/<?php echo $product['id'];?>">
                  <?php echo $product['name'];?>
                </a>
              </td>
              <td><?php echo $product['price'];?></td>
              <td><?php echo $productsInCompare[$product['id']];?></td>
              <td>
                <a href="/compare/delete/<?php echo $product['id'];?>">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="4">Общая стоимость, $:</td>
              <td><?php echo $totalPrice;?></td>
            </tr>

          </table>

          <a class="btn btn-default checkout" href="/compare/checkout"><i class="fa fa-shopping-compare"></i> Оформить
            заказ</a>
          <?php else: ?>
          <p>Корзина пуста</p>

          <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-compare"></i> Вернуться к покупкам</a>
          <?php endif; ?>

        </div>



      </div>
    </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>