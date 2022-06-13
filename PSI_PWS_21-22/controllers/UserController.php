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
        $clientes = User::find('all', array('conditions' => "username LIKE '%$pesquisa%' and role = 'cliente'"));

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('user', 'index', ['clientes' => $clientes]);
    }

    public function show($id)
    {
        $user = User::find([$id]);
        $faturas = Fatura::find('all', array('conditions' => "cliente_id ='$user->id' and estado = 'emitida'"));

        if (is_null($user)) {
            $this->redirectToRoute('user','index');
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('user','show', ['cliente' => $user, 'faturas' => $faturas]);
        }
    }

    public function create()
    {
        //mostrar a vista create
        $this->renderView('user','create');
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
        $user->update_attributes($_POST);
        if($user->is_valid()){
            $user->save();
            //redirecionar para o index
            $users = User::all();
            $this->renderView('user','index', ['users' => $users]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('user','edit', ['user' => $user]);
        }
    }

    public function delete($id)
    {
        $user = User::find([$id]);
        $user->delete();
        //redirecionar para o index
        $users = User::all();
        $this->renderView('user','index', ['users' => $users]);
    }

    public function create_cliente()
    {
        //mostrar a vista create
        $this->renderView('user','create_cliente');
    }

    public function store_cliente()
    {

        $cliente = new User();

        $cliente->username=$_POST['username'];
        if($_POST['password']!= ''){
            $cliente->password=md5($_POST['password']);
        }
        else{
            $cliente->password=$_POST['password'];
        }
        $cliente->email=$_POST['email'];
        $cliente->telefone=$_POST['telefone'];
        $cliente->nif=$_POST['nif'];
        $cliente->morada=$_POST['morada'];
        $cliente->codigopostal=$_POST['codigopostal'];
        $cliente->localidade=$_POST['localidade'];
        $cliente->role='cliente';

        if($cliente->is_valid()){
            $cliente->save();
            //redirecionar para o index
            $this->redirectToRoute('user', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $cliente->password=$_POST['password'];
            $this->renderView('user','create_cliente', ['cliente' => $cliente]);
        }
    }

    public function create_user()
    {
        //mostrar a vista create
        $this->renderView('user','create_user');
    }

    public function store_user()
    {
        $cliente = new User($_POST);

        if($cliente->is_valid()){
            $cliente->save();

            //redirecionar para o index
            $this->redirectToRoute('auth', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('user','create_user', ['cliente' => $cliente]);
        }
    }

}
