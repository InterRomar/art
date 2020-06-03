<?php

/**
 * Класс Feedback - модель для работы с товарами
 */
class Feedback
{


    /**
     * Возвращает данные об оставленном комментарии
     */
    public static function getFeedbackByGoods($id)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM rating_goods WHERE id_goods = :product';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':product', $id, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $feedback = array();
        while ($row = $result->fetch()) {
            $feedback[$i]['id'] = $row['id'];
            $feedback[$i]['id_user'] = $row['id_user'];
            $feedback[$i]['id_goods'] = $row['id_goods'];
            $feedback[$i]['rating'] = $row['rating'];
            $feedback[$i]['comment'] = $row['comment'];
            $i++;
        }
        return $feedback;
    }

    /**
     * Возвращает среднее значание рейтинга товара
     * @param integer $id <p>id товара</p>
     * @return integer <p>Средний рейтинга товара</p>
     */
    public static function getRating($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) as `count`,SUM(`rating`) as `sum` FROM rating_goods WHERE id_goods = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $row = $result->fetch();
        $votesRange = [1, 2, 3, 4, 5];
        $z = 1.64485;
        $vMin = min($votesRange);
        $vWidth = floatval(max($votesRange) - $vMin);
        $phat = ($row['sum'] - $row['count'] * $vMin) / $vWidth / floatval($row['count']);
        $rating = ($phat + $z * $z / (2 * $row['count']) - $z * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $row['count'])) / $row['count'])) / (1 + $z * $z / $row['count']);
        echo round($rating * $vWidth + $vMin, 2);
    }
}