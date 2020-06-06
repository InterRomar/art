<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Каталог</h2>
          <div class="panel-group category-products">
            <?php foreach ($categoriesCompare as $categoryItem) : ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a href="/compare/<?php echo $categoryItem['id']; ?>">
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
        <div class="features_items">
          <h2 class="title text-center">Корзина</h2>

          <?php if ($productsInCompare) : ?>
          <p>Вы выбрали такие товары:</p>
          <table class="table-bordered table-striped table">
            <tr>
              <?php foreach ($products as $product) : ?>
              <th>
                <table class="table-bordered table-striped table">
                  <tr>
                    <th>
                      <a href="/product/<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                      </a>
                    </th>
                    <th>
                      <a href="/compare/delete/<?php echo $product['id']; ?>">
                        <i class="fa fa-times"></i>
                      </a>
                    </th>


                  </tr>


                  <tr>
                    <td>Код продукта</td>
                    <td><?php echo $product['code']; ?></td>
                  </tr>
                  <tr>
                    <td>Навзвание</td>
                    <td>
                      <a href="/product/<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Цена</td>
                    <td><?php echo $product['category_id']; ?></td>
                  </tr>

                </table>
              </th>
              <?php endforeach; ?>
            </tr>
          </table>
          <?php else : ?>
          <p>Сравнивать нечего</p>

          <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-compare"></i> Вернуться к покупкам</a>
          <?php endif; ?>

        </div>



      </div>
    </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>