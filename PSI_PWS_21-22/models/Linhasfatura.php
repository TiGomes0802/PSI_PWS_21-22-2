<?php

class Linhasfatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade', 'message' => 'Campo Obrigatorio'),
        array('produto_id', 'message' => 'Campo Obrigatorio'),
    );

    static $belongs_to = array(
        array('produto'),
        array('fatura')
    );

    function getValor($quantidade, $produto_id)
    {
        $produto = Produto::find([$produto_id]);
        $valor = $quantidade * $produto->preco;

        return $valor;
    }

    function getValorIva($quantidade, $produto_id)
    {
        $produto = Produto::find([$produto_id]);
        $valoriva = $quantidade * ($produto->preco * ($produto->iva->percentagem / 100));

        return $valoriva;
    }

}