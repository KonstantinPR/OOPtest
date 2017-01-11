<?php
include_once ROOT . '/models/Table.php';

class TableController
{


    public function actionIndex()
    {
        User::isAccess();
        Table::insertIntoTable();
        $name = Table::checkName();
        $tableList = Table::getTableList();
        $itemList = Table::getItemList();
        $currency = Table::getCurrency();
        $summItem = Table::getGroupedResult();
        $summAll = Table::getSummAllTransactions();
        require_once(ROOT . '/views/table/index.php');
        return true;
    }

    public function actionChange($id)
    {
        Table::insertIntoTable();
        $name = Table::checkName();
        $tableList = Table::getTableListId($id);
        $itemList = Table::getItemList();
        $currency = Table::getCurrency();
        require_once(ROOT . '/views/table/change.php');
        return true;
    }

    public function actionSort($sortedColumn)
    {
        $name = Table::checkName();
        $tableList = Table::getSortedList($sortedColumn);
        $itemList = Table::getItemList();
        $currency = Table::getCurrency();
        $summItem = Table::getGroupedResult();
        $summAll = Table::getSummAllTransactions();
        require_once(ROOT . '/views/table/index.php');
        return true;
    }

    public function actionChangetransaction($id)
    {
        Table::updateTable($id);
        self::actionIndex();
    }

}
