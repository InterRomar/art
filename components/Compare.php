<?php

/**
 * Класс Compare
 * Компонент для работы со сравнениями
 */
class Compare
{

    /**
     * Добавление товара в сравнении (сессию)
     * @param int $id <p>id товара</p>
     * @return integer <p>Количество товаров в сравнении</p>
     */
    public static function addProduct($id)
    {
        // Приводим $id к типу integer
        $id = intval($id);

        // Пустой массив для товаров в сравнении
        $productsInCompare = array();

        // Если в сравнении уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['compare'])) {
            // То заполним наш массив товарами
            $productsInCompare = $_SESSION['compare'];
        }

        // Проверяем есть ли уже такой товар в сравнении 
        if (!array_key_exists($id, $productsInCompare)) {
            // Если нет, добавляем id нового товара в сравнении с количеством 1
            $productsInCompare[$id] = 1;
        }

        // Записываем массив с товарами в сессию
        $_SESSION['compare'] = $productsInCompare;

        // Возвращаем количество товаров в сравнении
        return self::countItems();
    }

    /**
     * Подсчет количество товаров в сравнении (в сессии)
     * @return int <p>Количество товаров в сравнении</p>
     */
    public static function countItems()
    {
        // Проверка наличия товаров в сравнении
        if (isset($_SESSION['compare'])) {
            // Если массив с товарами есть
            // Подсчитаем и вернем их количество
            $count = 0;
            foreach ($_SESSION['compare'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // Если товаров нет, вернем 0
            return 0;
        }
    }

    /**
     * Возвращает массив с идентификаторами и количеством товаров в сравнении<br/>
     * Если товаров нет, возвращает false;
     * @return mixed: boolean or array
     */
    public static function getProducts()
    {
        // $array = array_count_values($_SESSION['compare']);
        // print_r($array);
        // print_r(array_keys($_SESSION['compare']));
        if (count($_SESSION['compare']) > 1) {
            return $_SESSION['compare'];
        }
        return false;
    }
    /**
     * Проверяет наличее товара в сравнении<br/>
     * Если товаров нет, возвращает false;
     * @return mixed: boolean or array
     */
    public static function checkProducts($id)
    {
        if (in_array($id, $_SESSION['compare'])) {
            return true;
        }
        return false;
    }

    /**
     * Получаем общую стоимость переданных товаров
     * @param array $products <p>Массив с информацией о товарах</p>
     * @return integer <p>Общая стоимость</p>
     */
    public static function getTotalPrice($products)
    {
        // Получаем массив с идентификаторами и количеством товаров в сравнении
        $productsInCompare = self::getProducts();

        // Подсчитываем общую стоимость
        $total = 0;
        if ($productsInCompare) {
            // Если в сравнении не пусто
            // Проходим по переданному в метод массиву товаров
            foreach ($products as $item) {
                // Находим общую стоимость: цена товара * количество товара
                $total += $item['price'] * $productsInCompare[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Очищает сравнении
     */
    public static function clear()
    {
        if (isset($_SESSION['compare'])) {
            unset($_SESSION['compare']);
        }
    }

    /**
     * Удаляет товар с указанным id из корзины
     * @param integer $id <p>id товара</p>
     */
    public static function deleteProduct($id)
    {
        // Получаем массив с идентификаторами и количеством товаров в сравнении
        $productsInCompare = self::getProducts();
        echo $id;
        // Удаляем из массива элемент с указанным id
        unset($productsInCompare[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['compare'] = $productsInCompare;
        
    }
    
    /**
     * Удаляет товар с указанным id из корзины
     * @param integer $id <p>id товара</p>
     */
    public static function delProduct($id)
    {
        // Получаем массив с идентификаторами и количеством товаров в сравнении
        $productsInCompare = self::getProducts();

        // Удаляем из массива элемент с указанным id
        unset($productsInCompare[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['compare'] = $productsInCompare;
        
    }
}
