<?php
    require_once 'startup/boot.php';
    require_once 'controllers/AuthController.php';
    require_once 'controllers/EmpresaController.php';
    require_once 'controllers/FaturaController.php';
    require_once 'controllers/UserController.php';
    require_once 'controllers/ProdutoController.php';
    require_once 'controllers/IvaController.php';
    require_once 'controllers/LinhasFaturaController.php';

    if(!(isset($_GET['c']) AND isset($_GET['a']))){
        $auth = new AuthController();
        $auth->index();
    }else{

        $controller = $_GET['c'];
        $action = $_GET['a'];

        switch ($controller){
            case 'auth':
                $auth = new AuthController();
                switch ($action){
                    case 'index':
                        $auth->index();
                        break;
                    case 'login':
                        $auth->login();
                        break;
                    case 'logout':
                        $auth->logout();
                        break;
                }
                break;
            case 'empresa':
                $empresa = new EmpresaController();
                switch ($action) {
                    case 'show':
                        $id = $_GET['id'];
                        $empresa->show($id);
                        break;
                    case 'edit':
                        $id = $_GET['id'];
                        $empresa->edit($id);
                        break;
                    case 'update':
                        $id = $_GET['id'];
                        $empresa->update($id);
                        break;
                }
                break;
            case 'fatura':
                $fatura = new FaturaController();
                switch ($action) {
                    case 'index':
                        $fatura->index();
                        break;
                    case 'minhasfaturas':
                        $fatura->minhasfaturas();
                        break;
                    case 'imprimir':
                        $id_fatura = $_GET['id_fatura'];
                        $fatura->imprimir($id_fatura);
                        break;
                    case 'create':
                        $id_cliente = $_GET['id_cliente'];
                        $fatura->create($id_cliente);
                        break;
                    case 'store':
                        $id_cliente = $_GET['id_cliente'];
                        $fatura->store($id_cliente);
                        break;
                    case 'show':
                        $id = $_GET['id'];
                        $fatura->show($id);
                        break;
                    case 'updateestado':
                        $id = $_GET['id'];
                        $fatura->updateestado($id);
                        break;
                }
                break;
            case 'user':
                $user = new UserController();
                switch ($action) {
                    case 'index':
                        $user->index();
                        break;
                    case 'show':
                        $id = $_GET['id'];
                        $user->show($id);
                        break;
                    case 'edit':
                        $id = $_GET['id'];
                        $user->edit($id);
                        break;
                    case 'update':
                        $id = $_GET['id'];
                        $user->update($id);
                        break;
                    case 'create_cliente':
                        $user->create_cliente();
                        break;
                    case 'store_cliente':
                        $user->store_cliente();
                        break;
                    case 'create_user':
                        $user->create_user();
                        break;
                    case 'store_user':
                        $user->store_user();
                        break;
                }
                break;
            case 'linhasfatura':
                $linhasfatura = new LinhasFaturaController();
                switch ($action) {
                    case 'create':
                        $id = $_GET['id_fatura'];
                        $linhasfatura->create($id);
                        break;
                    case 'store':
                        $id = $_GET['id_fatura'];
                        $linhasfatura->store($id);
                        break;
                    case 'delete':
                        $id = $_GET['id'];
                        $linhasfatura->delete($id);
                        break;
                }
                break;
            case 'produto':
                $produto = new ProdutoController();
                switch ($action) {
                    case 'index':
                        $produto->index();
                        break;
                    case 'create':
                        $produto->create();
                        break;
                    case 'store':
                        $produto->store();
                        break;
                    case 'show':
                        $id = $_GET['id'];
                        $produto->show($id);
                        break;
                    case 'edit':
                        $id = $_GET['id'];
                        $produto->edit($id);
                        break;
                    case 'update':
                        $id = $_GET['id'];
                        $produto->update($id);
                        break;
                    case 'delete':
                        $id = $_GET['id'];
                        $produto->delete($id);
                        break;
                }
                break;

            case 'iva':
                $iva = new IvaController();
                switch ($action) {
                    case 'index':
                        $iva->index();
                        break;
                    case 'create':
                        $iva->create();
                        break;
                    case 'store':
                        $iva->store();
                        break;
                    case 'show':
                        $id = $_GET['id'];
                        $iva->show($id);
                        break;
                    case 'edit':
                        $id = $_GET['id'];
                        $iva->edit($id);
                        break;
                    case 'update':
                        $id = $_GET['id'];
                        $iva->update($id);
                        break;
                    case 'delete':
                        $id = $_GET['id'];
                        $iva->delete($id);
                        break;
                }
                break;
        }
    }
?>