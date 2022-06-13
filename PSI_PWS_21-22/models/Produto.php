<?php

class Produto extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo Obrigatorio'),
        array('descricao', 'message' => 'Campo Obrigatorio'),
        array('preco', 'message' => 'Campo Obrigatorio'),
        array('stock', 'message' => 'Campo Obrigatorio'),
        array('iva_id', 'message' => 'Campo Obrigatorio'),
    );

    public function validate()
    {
        if ($this->stock < 0)
        {
            $this->errors->add('stock', "Quantidade insuficiente");
        }
    }

    static $belongs_to = array(
        array('iva')
    );

}