<?php

/**
 * Контроллер ProductController
 * Товар
 */
class FeedbackController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionIndex($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        $user = User::getUserById($userId);
        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);

        // Подключаем вид
        require_once(ROOT . '/views/feedback/index.php');
        return true;
    }
    
    public function actionFeedback($productId)
    {
        if (isset($_POST['send'])) {
            $form['prod_id'] = intval($_POST['prod_id']);  // ID товара
            $form['rating']  = intval($_POST['rating']);   // Оценка
            $form['name']    = $_POST['name'];             // Имя
            $form['text']    = $_POST['text'];             // Отзыв

            $sth = $dbh->prepare("
                INSERT INTO 
                    `reviews` 
                SET 
                    `prod_id` = :prod_id, 
                    `rating`  = :rating,
                    `name`    = :name,
                    `text`    = :text,
                    `date`    = UNIX_TIMESTAMP()
            ");
            $sth->execute($form);
        }
    }
}