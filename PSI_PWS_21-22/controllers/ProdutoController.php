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
        $ivas = Iva::find_all_by_emvigor([1]);
        $this->renderView('produto','create', ['ivas' => $ivas]);
    }

    public function store()
    {
        $produto = new Produto($_POST);
        $ivas = Iva::find_all_by_emvigor([1]);

        if($produto->is_valid()){
            $produto->save();
            
            $this->redirectToRoute('produto','index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('produto','create', ['produto' => $produto, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        $produto = Produto::find([$id]);
        $ivas = Iva::find_all_by_emvigor([1]);
        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('produto','edit', ['ivas' => $ivas, 'produto' => $produto]);
        }
    }

    public function update($id)
    {
        $produto = Produto::find([$id]);
        $ivas = Iva::find_all_by_emvigor([1]);

        $produto->preco = $_POST['preco'];
        $produto->stock = $_POST['stock'];
        $produto->iva_id = $_POST['iva_id'];

        if($produto->is_valid()){
            $produto->save();
            //redirecionar para o index
            $produtos = Produto::all();
            $this->renderView('produto','index', ['produtos' => $produtos]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('produto','edit', ['produto' => $produto, 'ivas' => $ivas]);
        }
    }

    public function escolher_produto($fatura_id)
    {
        if (isset($_POST['pesquisa'])){
            $pesquisa = $_POST['pesquisa'];
        } else {
            $pesquisa = '';
        }
        $produtos = Produto::find('all', array('conditions' => "descricao LIKE '%$pesquisa%'"));

        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('produto', 'escolher_produto', ['produtos' => $produtos, 'fatura_id' => $fatura_id]);
    }

}
