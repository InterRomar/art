<?php

/**
 * Контроллер CompareController
 * Сравнение
 */
class CompareController
{

  /**
   * Action для добавления товара в сравнение синхронным запросом<br/>
   * (для примера, не используется)
   * @param integer $id <p>id товара</p>
   */
  public function actionAdd($id)
  {
    // Добавляем товар в сравнение
    Compare::addProduct($id);

    // Возвращаем пользователя на страницу с которой он пришел
    $referrer = $_SERVER['HTTP_REFERER'];
    header("Location: $referrer");
  }

  /**
   * Action для добавления товара в сравнение при помощи асинхронного запроса (ajax)
   * @param integer $id <p>id товара</p>
   */
  public function actionAddAjax($id)
  {
    // Добавляем товар в сравнение и печатаем результат: количество товаров в сравнениях
    echo Compare::addProduct($id);
    return true;
  }

  /**
   * Action для добавления товара в сравнение синхронным запросом
   * @param integer $id <p>id товара</p>
   */
  public function actionDelAjax($id)
  {
    // Удаляем заданный товар из корзины
    Compare::deleteProduct($id);
    return true;
  }
  /**
   * Action для добавления товара в сравнение синхронным запросом
   * @param integer $id <p>id товара</p>
   */
  public function actionDelete($id)
  {
    // Удаляем заданный товар из корзины
    Compare::deleteProduct($id);

    // Возвращаем пользователя в сравнение
    header("Location: /compare");
  }

  /**
   * Action для страницы "Сравнение"
   */
  public function actionIndex()
  {

    // Получим идентификаторы и количество товаров в сравнениях
    $productsInCompare = Compare::getProducts();

    if ($productsInCompare) {
      // Если в сравнениях есть товары, получаем полную информацию о товарах для списка
      // Получаем массив только с идентификаторами товаров
      $productsIds = array_keys($productsInCompare);
      // Получаем массив с полной информацией о необходимых товарах
      $products = Product::getProdustsByIds($productsIds);


      // $i = 0;
      $category = array();
      foreach ($products as $product) {

        $category[] = $product['category_id'];
      }
      $categories = Category::getCategoriesList();
      $categoriesCompare = Category::getCategoriesListByIds(array_keys(array_count_values($category)));
      // $products = Product::getProdustsCategoryByIds($productsInCompare, );
    }

    // Подключаем вид
    require_once(ROOT . '/views/compare/index.php');
    return true;
  }

  /**
   * Action для страницы "Сравнение товаров"
   */
  public function actionCategory($categoryId, $page = 1)
  {
    $productsInCompare = Compare::getProducts();

    if ($productsInCompare) {
    // Список категорий для левого меню
    $categories = Category::getCategoriesList();
    $productsIds = array_keys($productsInCompare);
    // Список товаров в категории
    $categoryProducts = Product::getCompareListByCategory($productsIds,$categoryId, $page);

    // Общее количетсво товаров (необходимо для постраничной навигации)
    $total = Product::getTotalProductsInCategory($categoryId);

    // Создаем объект Pagination - постраничная навигация
    $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

    // Подключаем вид
    require_once(ROOT . '/views/compare/compare.php');
    return true;
    }
  }
}