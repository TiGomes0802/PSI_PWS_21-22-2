<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'Campo Obrigatorio'),
        array('descricao', 'message' => 'Campo Obrigatorio'),
        array('emvigor', 'message' => 'Campo Obrigatorio'),
    );

    static $has_many = array(
        array('produtos')
    );
}