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
        // Подключаем вид
        $date =date("Y-m-d H:i:s");
        require_once(ROOT . '/views/product/view.php');
        return true;
    }
    /**
     * Action для отправки комментария в бд
     */
    public function actionAddAjax() 
    {      
        $post = array(
            'comment' => $_POST["comment"],
            'rating' => $_POST["rating"],
            'id' => $_POST["id"],
        );
        echo json_encode($post); 
        $id_user = 1; 
        if(isset($_SESSION['user']))
        {
            $id_user = $_SESSION['user'];
        }
       

        Feedback::addComment($id_user,$post);
        return true;
        // Переводим массив в JSON
    }
}