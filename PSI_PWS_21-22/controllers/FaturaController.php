<?php

require_once 'BaseAuthController.php';

class FaturaController extends BaseAuthController
{

    public function __construct()
    {
        $this->loginFilter();
    }

    public function index()
    {
        if($this->getRole() != 'cliente'){
            $faturas = Fatura::find('all', array('order' => 'data desc'));

            //mostrar a vista index passando os dados por parâmetro
            $this->renderView('fatura', 'index', ['faturas' => $faturas]);
        }else {
            $this->redirectToRoute('auth', 'logout');
        }

    }

    public function create($id_cliente)
    {
        if($this->getRole() != 'cliente'){
            //mostrar a vista create
            $cliente = User::find_by_id($id_cliente);

            $this->renderView('fatura','create', ['user' => $cliente]);
        }else {
            $this->redirectToRoute('auth', 'logout');
        }

    }

    public function store($id_cliente)
    {
        if($this->getRole() != 'cliente'){
            $fatura = new Fatura();

            $fatura->estado = "em lançamento";
            $fatura->valortotal = 0;
            $fatura->ivatotal = 0;
            $fatura->empregado_id = $_SESSION['id'];
            $fatura->cliente_id = $id_cliente;

            if($fatura->is_valid()){
                $fatura->save();
                //$this->redirectToRoute('linhasfatura', 'create',['fatura' => $fatura]);
                $this->redirectToRoute('linhasfatura', "create&id_fatura=$fatura->id");
            } else {
                //mostrar vista edit passando o modelo como parâmetro
                $this->renderView('fatura','create', ['fatura' => $fatura]);
            }
        }else {
            $this->redirectToRoute('auth', 'logout');
        }
    }

    public function edit($id)
    {
        if($this->getRole() != 'cliente'){
            $fatura_estado =  new Fatura();

            $fatura = Fatura::find([$id]);
            if (is_null($fatura) and $fatura_estado->Permitirestado($id)) {
                $this->redirectToRoute('fatura', 'index');
            } else {
                //mostrar a vista edit passando os dados por parâmetro
                $this->renderView('fatura','edit', ['fatura' => $fatura]);
            }
        }else {
            $this->redirectToRoute('auth', 'logout');
        }

    }

    public function updateestado($id)
    {
        if($this->getRole() != 'cliente'){
            $fatura = Fatura::find([$id]);

            $fatura->estado = "emitida";

            if($fatura->is_valid()){
                $fatura->save();
                //redirecionar para o index
                $faturas = Fatura::all();
                $this->renderView('fatura','index', ['faturas' => $faturas]);
            } else {
                //mostrar vista edit passando o modelo como parâmetro
                $this->renderView('fatura','edit', ['fatura' => $fatura]);
            }
        }else {
            $this->redirectToRoute('auth', 'logout');
        }
    }

    public function minhasfaturas()
    {
        if($this->getRole() == 'cliente'){
            $auth = new Auth();
            $user = $auth->getUser();

            $faturas = Fatura::find('all', array('conditions' => "cliente_id ='$user->id' and estado = 'emitida'", 'order' => 'data desc'));

            //mostrar a vista index passando os dados por parâmetro
            $this->renderView('fatura', 'minhasfaturas', ['faturas' => $faturas]);
        }else {
            $this->redirectToRoute('auth', 'logout');
        }
    }

    public function imprimir($id_fatura)
    {
        $auth = new Auth();
        $user = $auth->getUser();
            
        $fatura = Fatura::find_by_id([$id_fatura]);
        $linhasfatura = Linhasfatura::find_all_by_fatura_id([$id_fatura]);

        if($user->role != 'cliente' or $user->id == $fatura->cliente_id){

            //mostrar a vista index passando os dados por parâmetro
            $this->pageimprimirfatura('fatura', 'imprimir', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
        }else {
            $this->redirectToRoute('auth', 'logout');
        }
    }

    public function show($id_fatura)
    {
        $auth = new Auth();
        $user = $auth->getUser();

        $fatura = Fatura::find_by_id([$id_fatura]);
        $linhasfatura = Linhasfatura::find_all_by_fatura_id([$id_fatura]);

        if($user->role != 'cliente' or $user->id == $fatura->cliente_id){

            //mostrar a vista index passando os dados por parâmetro
            $this->renderView('fatura', 'imprimir', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
        }else {
            $this->redirectToRoute('auth', 'index');
        }
    }

}
