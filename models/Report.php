<?php

class Report
{

    //Выдаем общий отчет на статью расходов имя которое передаем методу
    public static function getReport($itemValue)
    {

        $db = Db::getConnection();
        $sql = "SELECT * FROM finance WHERE description='$itemValue'";
        $result = $db->prepare($sql);
        $result->execute();
        $fetchResult = $result->fetchAll();
        return $fetchResult;
    }

    // Получаем значение отправленное через $_POST
    public static function getPostValue()
    {
        foreach ($_POST as $key => $value) {
            $itemValue = $key;
        }
        return $itemValue;
    }

    // Заменяем нижнее подчеркивание пробелом у переданного значения
    public static function clearUnderscore($itemValue)
    {
        $itemValue=str_replace("_"," ",$itemValue);
        return $itemValue;
    }

}