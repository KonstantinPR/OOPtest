<?php
return array(
    'table/([0-9]+)' => 'table/view/$1', // actionIndex в NewsController
    'table' => 'table/index', // контроллер TableController и метод actionIndex
    'auth' => 'auth/auth', // контроллер AuthController и метод actionAuth
    'finalReport'=>'report/finalReport',
    'changetransaction/([0-9]+)' => 'table/changetransaction/$1',
    'change/([0-9]+)' => 'table/change/$1',
    'sort/([a-z]+)' => 'table/sort/$1',
    'report'=>'report/report'
);


