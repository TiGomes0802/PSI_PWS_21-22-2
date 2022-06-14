<?php

class Produto extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo Obrigatorio'),
        array('descricao', 'message' => 'Campo Obrigatorio'),
        array('stock', 'message' => 'Campo Obrigatorio'),
        array('iva_id', 'message' => 'Campo Obrigatorio'),
    );

    public function validate()
    {
        if ($this->stock < 0)
        {
            $this->errors->add('stock', "Quantidade insuficiente");
        }

        if ($this->preco == 0)
        {
            $this->errors->add('preco', "O preço não pode ser 0");
        }

        //if(static::exists(array("referencia" => $this->referencia))) {
        //    $this->errors->add('referencia', 'Essa referencia já está associado a outro produto');
        //}
    }

    static $belongs_to = array(
        array('iva')
    );

}