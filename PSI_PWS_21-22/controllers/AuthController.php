<?php

require_once 'BaseAuthController.php';

class AuthController extends BaseAuthController
{

    public function index()
    {
        $this->renderView('auth','index');
    }

    public function login()
    {
         $auth = new Auth();
         $sessao = $auth->checkAuth($_POST['username'], md5($_POST['password']));

         if($sessao) {
              $user = $auth ->getUser();
             switch ($user->role){
                 case 'cliente':
                     $this->redirectToRoute('fatura', 'minhasfaturas');
                     break;
                 case 'funcionario':
                 case 'admin':
                     $this->redirectToRoute('user', 'index');
             }
         } else{
             $this->redirectToRoute('auth', 'index');
         }
    }

    public function logout()
    {
        $auth =  new Auth();

        $auth->logout();
        $this->redirectToRoute('auth', 'index');
    }

}
