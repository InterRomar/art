<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        $user = User::getUserById($userId);
        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);
        // Получаем список комментариев 
        $comments = Feedback::getFeedbackByGoods($product['id']);
        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

}
