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
      print_r($products);
      // Получаем общую стоимость товаров
      $totalPrice = Compare::getTotalPrice($products);
    }

    // Подключаем вид
    require_once(ROOT . '/views/compare/index.php');
    return true;
  }
}
