<?php

require_once 'BaseController.php';

class BaseAuthController extends BaseController
{
    public function loginFilter()
    {
        $auth = new Auth();
        if(!$auth->isLoggedin()){
            header('Location: ./router.php?'.INVALID_ACCESS_ROUTE);
        }
    }

    public function getRole()
    {
        $user = User::find([$_SESSION['id']]);

        return $user->role;
    }
}