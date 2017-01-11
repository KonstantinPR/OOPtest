<?php
header("Content-Type: text/html; charset=utf-8");


//FRONT CONTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');



// 3. Подключение к Базе Данных
session_start();
$db = Db::getConnection();



// 4. Вызов Router
$router = new Router();
$router->run();


