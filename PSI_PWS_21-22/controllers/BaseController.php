<?php

require_once './models/Auth.php';
require_once './models/Empresa.php';

class BaseController
{

    public function redirectToRoute($controllerPrefix, $action, $params = []
    ){
        $url = 'Location: router.php?c='.$controllerPrefix.'&a='.$action;
        foreach ($params as $paramKey => $paramValue){
            $url.='&'.$paramKey.'='.$paramValue;
        }
        header($url);
    }

    public function renderView($controllerPrefix, $viewName, $params = []) {
        extract($params);

        if(isset($_GET['c'])){
            $controller = $_GET['c'];
        }

        $auth = new Auth();

        $empresa = $auth->getEmpresa();

        if(isset($_SESSION['id'])){
            $user = $auth->getUser();
        }

        require_once 'views/layouts/header.php';
        require_once 'views/'. $controllerPrefix . '/'. $viewName .'.php';
        require_once 'views/layouts/footer.php';
    }

    public function pageimprimirfatura($controllerPrefix, $viewName, $params = []) {
        extract($params);

        $auth = new Auth();

        $empresa = $auth->getEmpresa();

        require_once 'views/'. $controllerPrefix . '/'. $viewName .'.php';
    }

}