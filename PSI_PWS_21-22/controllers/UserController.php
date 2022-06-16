<?php

require_once 'BaseAuthController.php';

class UserController extends BaseAuthController
{
    public function __construct()
    {
        $this->loginFilter();
        if ($this->getRole() == 'cliente'){
            $this->redirectToRoute('fatura', 'minhasfaturas');
        }
    }

    public function index()
    {
        //$clientes = User::find_all_by_role("cliente");
        if (isset($_POST['pesquisa'])){
            $pesquisa = $_POST['pesquisa'];
        } else {
            $pesquisa = '';
        }
        $clientes = User::find('all', array('conditions' => "role = 'cliente' and username LIKE '%$pesquisa%'"));

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('user', 'index', ['clientes' => $clientes]);
    }

    public function index_all_user()
    {
        if (isset($_POST['pesquisa'])){
            $pesquisa = $_POST['pesquisa'];
        } else {
            $pesquisa = '';
        }
        $users = User::find('all', array('conditions' => "username LIKE '%$pesquisa%' or role LIKE '%$pesquisa%'"));

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('user', 'index_all_user', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find([$id]);
        $faturas = Fatura::find('all', array('conditions' => "cliente_id ='$id'"));
        if (is_null($user)) {
            $this->redirectToRoute('user','index');
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('user','show', ['cliente' => $user, 'faturas' => $faturas]);
        }
    }

    public function edit($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('user','edit', ['user' => $user]);
        }
    }

    public function update($id)
    {
        $user = User::find([$id]);
        $user->email=$_POST['email'];
        if ($_POST['password'] != null){
            $user->password = md5($_POST['password']);
        }
        if($user->is_valid()){
            $user->save();
            //redirecionar para o index
            $users = User::all();
            $this->redirectToRoute('user','index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('user','edit', ['cliente' => $user]);
        }
    }

    public function create_cliente()
    {
        //mostrar a vista create
        if ($this->getRole() == 'funcionario'){
            $this->renderView('user','create_cliente');
        }else{
            $this->redirectToRoute('user', 'create_user');
        }

    }

    public function store_cliente()
    {
        if ($this->getRole() == 'funcionario'){
            $cliente = new User();

            $cliente->username = $_POST['username'];
            if($_POST['password']!= ''){
                $cliente->password = md5($_POST['password']);
            }
            else{
                $cliente->password = $_POST['password'];
            }
            $cliente->email = $_POST['email'];
            $cliente->telefone = $_POST['telefone'];
            $cliente->nif = $_POST['nif'];
            $cliente->morada = $_POST['morada'];
            $cliente->codigopostal = $_POST['codigopostal'];
            $cliente->localidade = $_POST['localidade'];
            $cliente->role = 'cliente';

            if($cliente->is_valid()){
                $cliente->save();
                //redirecionar para o index
                $this->redirectToRoute('user', 'index');
            } else {
                //mostrar vista edit passando o modelo como parâmetro
                $cliente->password=$_POST['password'];
                $this->renderView('user','create_cliente', ['cliente' => $cliente]);
            }
        }else{
            $this->redirectToRoute('user', 'create_user');
        }
    }

    public function create_user()
    {
        //mostrar a vista create
        if ($this->getRole() == 'admin'){
            $this->renderView('user','create_user');
        }else{
            $this->redirectToRoute('user', 'create_cliente');
        }

    }

    public function store_user()
    {
        if ($this->getRole() == 'admin'){
            $user = new User();

            $user->username = $_POST['username'];
            if($_POST['password']!= ''){
                $user->password = md5($_POST['password']);
            }
            else{
                $user->password = $_POST['password'];
            }
            $user->email = $_POST['email'];
            $user->telefone = $_POST['telefone'];
            $user->nif = $_POST['nif'];
            $user->morada = $_POST['morada'];
            $user->codigopostal = $_POST['codigopostal'];
            $user->localidade = $_POST['localidade'];
            $user->role = $_POST['role'];

            if($user->is_valid()){
                $user->save();
                //redirecionar para o index
                $this->redirectToRoute('user', 'index_all_user');
            } else {
                //mostrar vista edit passando o modelo como parâmetro
                $user->password=$_POST['password'];
                $this->renderView('user','create_user', ['cliente' => $user]);
            }
        }else{
            $this->redirectToRoute('user', 'create_user');
        }

    }

}
