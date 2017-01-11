<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        //маршруты в массиве файла routes.php
        $this->routes = include($routesPath);
    }

    // Возвращает строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run()
    {
//--- РАБОТА СО СТРОКОЙ ЗАПРОСА ---//

        // Получить строку запроса
        $uri = $this->getURI();

        //удаляем дополнительный путь от корня до папки с компонентами
        $uri = str_replace("pattern/fin/", "", $uri);

        // Удостоверитья, что такой запрос есть в route
        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                // получаем внутренний путь из внешнего согласно правилу preg_replace
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                /*              echo $uri . " ";
                                echo $path . " ";
                                echo $uriPattern . " ";
                                echo $internalRoute . " ";*/
                // Если есть совпадения, то определить какой controller и action обрабатывают запрос
                $segments = explode("/", $internalRoute);

                // Название Конроллера состоит из первого элемента вытащенного через explode элемента и окончания ..Controller
                $controllerName = array_shift($segments) . 'Controller';

                //Делаем первую букву Контроллера заглавной согласно нашему шаблону названий
                $controllerName = ucfirst($controllerName);

                //Называем его метод по шаблону actionName
                $actionName = 'action' . ucfirst(array_shift($segments));

                // Путь до Контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                // Подключить класс-контроллер
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (action)
                $controllerObject = new $controllerName;

                // Функция вызывает у объекта (контроллера) метод и передает параметры (массив)
                $result = call_user_func_array(array($controllerObject, $actionName), $segments);

                if (isset ($_POST)) unset ($_POST['summ']);


                if ($result != null) {
                    break;
                }


            }
        }


    }

}


