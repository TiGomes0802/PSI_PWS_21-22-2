<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'Campo Obrigatorio'),
        array('descricao', 'message' => 'Campo Obrigatorio'),
        array('emvigor', 'message' => 'Campo Obrigatorio'),
    );

    static $validates_format_of = array(
        array('percentagem', 'with' => '/^[0-9_]+([0-9_]+)$/' , 'message' => 'apenas números'),
    );

    static $has_many = array(
        array('produtos')
    );
}