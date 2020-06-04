<?php

/**
 * Контроллер FeedbackController
 * Отзыв/Оценка товара
 */
class FeedbackController
{

    /**
     * Action для главной страницы
     */
    public function actionView()
    {
        // Список категорий для левого меню
        $comments = Feedback::getFeedbackByGoods($product['id']);
        $gog = "fsdf";

        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
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

    public function actionAddAjax($id) {
        // Feedback::addComment($_POST["id"], 5, $_POST["comment"], $_POST["rating"]);
        
        $result = array(
            'comment' => $_POST["comment"],
            'rating' => $_POST["rating"],
            'id' => $_POST["id"],
        ); 
        
        
        // // Переводим массив в JSON
        echo json_encode($result); 
        // // echo json_encode($someValue); 
        
        // return true;
    }
}