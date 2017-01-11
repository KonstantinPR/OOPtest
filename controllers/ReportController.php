<?php

class ReportController
{
    //Отчет для конкретной статьи расходов
    public static function actionReport()
    {
        $itemValue = Report::getPostValue();
        $itemValue = Report::clearUnderscore($itemValue);
        $fetchResult = Report::getReport($itemValue);
        require_once(ROOT . "/views/table/report.php");
    }

    //Самый общий отчет, в который выводятся общие итоги и диаграммы о расходах
    public static function actionFinalReport()
    {
        $fetchResult=Table::getTableList();
        require_once(ROOT . "/views/table/finalreport.php");
    }
}