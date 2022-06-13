<?php

class Fatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('cliente_id', 'message' => 'Campo Obrigatorio', 'message' => 'Campo Obrigatorio'),
    );

    static $belongs_to = array(
        array('user_empregado', 'class_name' => 'User', 'foreign_key'=> 'empregado_id'),
        array('user_cliente', 'class_name' => 'User', 'foreign_key'=> 'cliente_id'),
    );

    static $has_many = array(
        array('linhasfaturas')
    );

    function Permitirestado($id){
        $fatura = Fatura::find([$id]);
        if($fatura->estado == "em lançamento"){
            return true;
        } else {
            return false;
        }
    }

    public function getvalor($linhasfatura)
    {

        $valor = 0;

        foreach ($linhasfatura as $linhafatura){
            $valor += $linhafatura->valor;
        }
        return $valor;
    }

    public function getvaloriva($linhasfatura)
    {
        $valoriva = 0;

        foreach ($linhasfatura as $linhafatura) {
            $valoriva += $linhafatura->valoriva;
        }
        return $valoriva;
    }
}