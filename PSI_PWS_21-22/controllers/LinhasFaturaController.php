<?php

require_once 'BaseAuthController.php';

class LinhasFaturaController extends BaseAuthController
{

    public function __construct()
    {
        $this->loginFilter();
        if ($this->getRole() == 'cliente'){
            $this->redirectToRoute('fatura', 'minhasfaturas');
        }
    }

    public function create($id_fatura)
    {
        $fatura = Fatura::find_by_id([$id_fatura]);
        if ($fatura->estado !="emitida"){
            $linhasfatura = Linhasfatura::find_all_by_fatura_id([$id_fatura]);

            //mostrar a vista create
            $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
        }else{
            $this->redirectToRoute('fatura', 'index');
        }

    }

    public function store($id_fatura)
    {
        $produto = Produto::find_by_referencia($_POST['referencia']);
        $fatura = Fatura::find_by_id([$id_fatura]);
        $linhasfatura = Linhasfatura::find_all_by_fatura_id([$id_fatura]);

        if ($produto != null){
            $produto->stock -= $_POST['quantidade'];

            if($produto->is_valid()){
                $linhafatura = new LinhasFatura();

                $linhafatura->valor = $linhafatura->getValor($_POST['quantidade'], $produto->id);
                $linhafatura->valoriva = $linhafatura->getValorIva($_POST['quantidade'], $produto->id);
                $linhafatura->quantidade = $_POST['quantidade'];
                $linhafatura->produto_id = $produto->id;
                $linhafatura->fatura_id = $id_fatura;

                if($linhafatura->is_valid()){
                    $produto->save();
                    $linhafatura->save();

                    $linhasfatura = Linhasfatura::find_all_by_fatura_id([$id_fatura]);

                    $fatura->valortotal = $fatura->getvalor($linhasfatura);
                    $fatura->ivatotal = $fatura->getvaloriva($linhasfatura);

                    if($fatura->is_valid()) {
                        $fatura->save();

                        $this->redirectToRoute('linhasfatura', 'create', ['id_fatura' => $fatura->id]);
                    }else{
                        $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
                    }
                } else {
                    //mostrar vista edit passando o modelo como parâmetro
                    $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
                }
            }else {

                $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura, 'produto' => $produto]);
            }
        } else{
            $naoproduto = true;
            $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura, 'naoproduto' => $naoproduto]);
        }
    }

    public function delete($id)
    {
        $linhasfatura = Linhasfatura::find([$id]);
        $fatura = Fatura::find_by_id($linhasfatura->fatura_id);
        $produto = Produto::find_by_id($linhasfatura->produto_id);

        if ($fatura->estado !="emitida"){

            $produto->stock += $linhasfatura->quantidade;

            $linhasfatura->delete();

            $linhasfatura = Linhasfatura::find_all_by_fatura_id([$fatura->id]);

            $fatura->valortotal = $fatura->getvalor($linhasfatura);
            $fatura->ivatotal = $fatura->getvaloriva($linhasfatura);

            if($fatura->is_valid() and $produto->is_valid()) {
                $fatura->save();
                $produto->save();

                $this->redirectToRoute('linhasfatura', 'create', ['id_fatura' => $fatura->id]);
            }else{
                $this->renderView('linhasfatura','create', ['fatura' => $fatura, 'linhasfatura' => $linhasfatura]);
            }
        }else{
            $this->redirectToRoute('fatura', 'index');
        }
    }

}