<?php

Class User
{
    public static function authUser()
    {

        if (isset ($_COOKIE['email'])) {
            header("Location: http://new.elenachezelle.ru/pattern/fin/table");
        } else {
            if (isset ($_POST['email']) && $_POST['email'] != '') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                setcookie('email', $email);
                setcookie('password', $password);
                $db = db::getConnection();
                $sql = "INSERT INTO user (email, password) VALUES (:email,:password)";
                $result = $db->prepare($sql);
                $result->bindParam(':email',$email);
                $result->bindParam(':password',$password);
                $result->execute();

                header("Location: http://new.elenachezelle.ru/pattern/fin/table");
            }

        }
        return true;
    }

    public static function isAccess()
    {
        setcookie('email','',time()-3600);
        if (isset ($_COOKIE['email'])) {
        } else {
            header("Location: http://new.elenachezelle.ru/pattern/fin/auth");
        }
        return true;
    }


    public static function checkUser()
    {
        if (isset ($_COOKIE['user'])) {
            $n = 'good';
            return $n;
        } else {
            $n = 'nogood';
            return $n;
        }
    }

    public static function findUser($user, $password)
    {
        $db = db::getConnection();
        $sql = "SELECT * FROM user WHERE name = :user AND password=:password";
        $result = $db->prepare($sql);
        $result->bindParam(':user', $user, PDO::FETCH_ASSOC);
        $result->bindParam(':password', $password, PDO::FETCH_ASSOC);
        $result = $db->query($sql, PDO::FETCH_ASSOC);
        $result->execute();
        $user = $result->fetch();
        if ($user && $password) {
            header("Location: /pattern/fin/table/" . $user);
        }
        return false;
    }

}