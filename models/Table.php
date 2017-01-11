<?php

class Table
{


    // Зациклить получение записей из базы данных
    public static function CicleTable($result, array $tableList)
    {
        $i = 0;
        while ($row = $result->fetch()) {
            $tableList[$i]['id'] = $row['id'];
            $tableList[$i]['date'] = $row['date'];
            $tableList[$i]['username'] = $row['username'];
            $tableList[$i]['summ'] = $row['summ'];
            $tableList[$i]['currency'] = $row['currency'];
            $tableList[$i]['description'] = $row['description'];
            $tableList[$i]['fulldescription'] = $row['fulldescription'];
            $i++;
        }
        return $tableList;
    }

    // Получить все возможные записи из таблицы
    public static function getTableList()
    {

        /* ORDER BY date DESC LIMIT 10*/
        $db = Db::getConnection();
        $tableList = array();
        $result = $db->query('SELECT * FROM finance ORDER BY id DESC');
        $tableList = self::CicleTable($result, $tableList);

        return $tableList;
    }

    public static function getSortedList($sortedColumn)
    {

        $db = Db::getConnection();
        $tableList = array();
        $result = $db->query("SELECT * FROM finance ORDER BY $sortedColumn DESC");
        $tableList = self::CicleTable($result, $tableList);

        return $tableList;
    }

    public static function getTableListId($id)
    {

        $db = Db::getConnection();
        $tableList = array();
        $result = $db->query("SELECT * FROM finance WHERE id='$id' ORDER BY id DESC");
        $tableList = self::CicleTable($result, $tableList);

        return $tableList;
    }

    public static function changeTableListId($tableList)
    {
        $summ = $tableList['summ'];
        $id = $tableList['id'];
        $db = Db::getConnection();
        $result = $db->query("UPDATE finance SET summ='$summ' WHERE id='$id '");
        echo "yes";
        echo $tableList['summ'];
        return $result;


    }


    //Вернуть названия столбцов в таблице
    public static function getTableColumnName()
    {

        /* ORDER BY date DESC LIMIT 10*/
        $db = Db::getConnection();
        $resultColumn = array();
        $result = $db->query('SHOW FIELDS FROM finance');
        $resultColumn = $result->fetch();
        return $resultColumn;
    }


    //получить список всех статей (счетов) транзакций (расходов)
    public static function getItemList()
    {

        /* ORDER BY date DESC LIMIT 10*/
        $db = Db::getConnection();
        $itemList = array();
        $result = $db->query('SELECT * FROM item ORDER BY id ASC');
        $i = 0;

        while ($row = $result->fetch()) {
            $itemList[$i]['value'] = $row['value'];
            $i++;
        }

        return $itemList;
    }

    // Получить текущую валюту для данной операции
    public static function getCurrency()
    {

        /* ORDER BY date DESC LIMIT 10*/
        $db = Db::getConnection();
        $currency = array();
        $result = $db->query('SELECT * FROM currency ORDER BY id ASC');
        $i = 0;

        while ($row = $result->fetch()) {
            $currency[$i]['currency'] = $row['currency'];
            $i++;
        }

        return $currency;
    }

    // Получить запись с определенным (переданным) id
    public static function getTableItemById($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM finance WHERE id = ' . $id);

        $result->setFetchMode(PDO::FETCH_NUM);
        $result->setFetchMode(PDO::FETCH_ASSOC);


        $tableItem = $result->fetch();
        return $tableItem;

    }

    // Занести транзакцию в таблицу с раходами
    public static function  insertIntoTable()
    {
        if (isset($_POST ['summ'])) {

            $date = date("Y-m-d H:i:s");
            $date = $_POST['date'];
            $username = $_POST['username'];
            $summ = $_POST['summ'];
            $currency = $_POST['currency'];
            $description = $_POST['description'];
            $fulldescription = $_POST['fulldescription'];


            //устанавливаем запоминание имени в ячейке имя
            if (!isset ($_COOKIE['name'])) {
                setcookie('name', $username, time() + 3600 * 24 * 30 * 12);
            }

            if ($date == null) {
                $date = date("Y-m-d H:i:s");
            }

            $db = Db::getConnection();
            $db->query("INSERT INTO finance VALUES ('','$date','$username', '$summ', '$currency', '$description', '$fulldescription') ");
        }
    }

    public static function  updateTable($id)
    {
        if (isset($_POST ['summ'])) {

            $date = date("Y-m-d H:i:s");
            $id = $id;
            $date = $_POST['date'];
            $username = $_POST['username'];
            $summ = $_POST['summ'];
            $currency = $_POST['currency'];
            $description = $_POST['description'];
            $fulldescription = $_POST['fulldescription'];


            //устанавливаем запоминание имени в ячейке имя
            if (!isset ($_COOKIE['name'])) {
                setcookie('name', $username, time() + 3600 * 24 * 30 * 12);
            }

            if ($date == null) {
                $date = date("Y-m-d H:i:s");
            }

            $db = Db::getConnection();

            $db->query("UPDATE finance SET username='$username', currency='$currency', description='$description', fulldescription='$fulldescription', summ='$summ' WHERE id='$id'");
            unset ($_POST);
            return $db;
        }
        return false;
    }


    //Получаем итоговые значения всех затрат
    public static function  getSummAllTransactions()
    {
        $tableList = self::getTableList();
        $summ = 0;
        foreach ($tableList as $tableItem) {
            if ($tableItem['currency'] == 'usd') $currency = 65; else $currency = 1;
            $summ = $summ + $tableItem['summ'] * $currency;
        }
        return $summ;
    }


    // Получаем массив для сгруппированной итоговой ведомости, которая включает в себя 2 столбца -
    // статья расходов и итоговые значение по этим статьям за весь период
    public static function  getGroupedResult()
    {

        $tableList = self::getTableList();
        $itemList = self::getItemList();

        $summItem = array();
        foreach ($itemList as $itemValue) {
            $summ = 0;
            foreach ($tableList as $tableItem) {
                if ($itemValue ['value'] == $tableItem['description']) {
                    if ($tableItem['currency'] == 'usd') $currency = 65; else $currency = 1;
                    $summ = $summ + $tableItem['summ'] * $currency;
                }
            }
            $summItem[$itemValue['value']] = $summ;

        }
        return $summItem;
    }

    public static function  checkName()
    {

        if (isset ($_COOKIE['name'])) {
            $name = $_COOKIE['name'];
        } else {
            $name = "Имя";
        }
        return $name;

    }

}
