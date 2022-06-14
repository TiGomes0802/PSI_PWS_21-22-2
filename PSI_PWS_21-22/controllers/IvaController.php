<?php

require_once 'BaseAuthController.php';

class IvaController extends BaseAuthController
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
        $ivas = Iva::all();

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('iva', 'index', ['ivas' => $ivas]);
    }

    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('iva','show', ['iva' => $iva]);
        }
    }

    public function create()
    {
        $ivas = Iva::find_all_by_emvigor([1]);
        $this->renderView('iva','create', ['ivas' => $ivas]);
    }

    public function store()
    {
        $iva = new Iva($_POST);
        $ivas = Iva::find_all_by_emvigor([1]);

        if($iva->is_valid()){
            $iva->save();

            $this->redirectToRoute('iva','index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('iva','create', ['iva' => $iva, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find([$id]);
        $iva= Iva::all();
        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('iva','edit', ['ivas' => $iva, 'iva' => $iva]);
        }
    }

    public function update($id)
    {
        $iva = Iva::find([$id]);
        $ivas = Iva::find_all_by_emvigor([1]);

        $iva->preco = $_POST['preco'];
        $iva->stock = $_POST['stock'];
        $iva->iva_id = $_POST['iva_id'];

        if($iva->is_valid()){
            $iva->save();
            //redirecionar para o index
            $ivas = Iva::all();
            $this->renderView('iva','index', ['ivas' => $ivas]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('iva','edit', ['iva' => $iva, 'ivas' => $ivas]);
        }
    }

}
