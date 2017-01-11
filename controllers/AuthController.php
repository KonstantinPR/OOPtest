<?php

class AuthController
{


    public function actionAuth()
    {
        User::authUser();
        require_once(ROOT . '/views/table/auth.php');
    }


}
