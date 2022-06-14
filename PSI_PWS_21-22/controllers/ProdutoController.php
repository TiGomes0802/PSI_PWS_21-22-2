<?php

require_once 'BaseAuthController.php';

class ProdutoController extends BaseAuthController
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
        $produtos = Produto::all();

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('produto', 'index', ['produtos' => $produtos]);
    }

    public function show($id)
    {
        $produto = Produto::find([$id]);
        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('produto','show', ['produto' => $produto]);
        }
    }

    public function create()
    {
        $iva= Iva::all();
        $this->renderView('produto','create', ['iva', $iva]);
    }

    public function store()
    {
        $produto = new Produto($_POST);
        if($produto->is_valid()){
            $produto->save();
            //redirecionar para o index
            $produtos = Produto::all();
            $this->renderView('produto','index', ['produtos' => $produtos]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('produto','create', ['produto' => $produto]);
        }
    }

    public function edit($id)
    {
        $produto = Produto::find([$id]);
        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('produto','edit', ['produto' => $produto]);
        }
    }

    public function update($id)
    {
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        if($produto->is_valid()){
            $produto->save();
            //redirecionar para o index
            $produtos = Produto::all();
            $this->renderView('produto','index', ['produtos' => $produtos]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('produto','edit', ['produto' => $produto]);
        }
    }

}
