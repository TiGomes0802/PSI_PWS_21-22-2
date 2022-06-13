<?php

class Auth
{
    public function __construct(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    function checkAuth($username, $password)
    {
        $user = User::find_by_username_and_password($username, $password);

        if($user) {
            $_SESSION['id'] = $user->id;
            return true;
        } else{
            return false;
        }
    }

    function isLoggedin()
    {
        if(isset($_SESSION['id'])){
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function getUser()
    {
        $user = User::find([$_SESSION['id']]);

        return $user;
    }

}