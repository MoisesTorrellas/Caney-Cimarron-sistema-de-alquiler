<?php

class UserSession{
    public function __construct(){
        session_start();
    }

    public function setActiUser($user){
        $_SESSION['user'] = $user;
    }

    public function getActiUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}



?>