<?php

class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Campo Obrigatorio'),
        array('password', 'message' => 'Campo Obrigatorio'),
        array('email', 'message' => 'Campo Obrigatorio'),
        array('telefone', 'message' => 'Campo Obrigatorio'),
        array('nif', 'message' => 'Campo Obrigatorio'),
        array('morada', 'message' => 'Campo Obrigatorio'),
        array('codigopostal', 'message' => 'Campo Obrigatorio'),
        array('localidade', 'message' => 'Campo Obrigatorio'),
        array('role', 'message' => 'Campo Obrigatorio'),
    );

    static $validates_size_of = array(
        array('nif', 'maximum' => 9, 'message' => 'Demaciado grande apenas 9 numeros'),
        array('nif', 'minimum' => 9, 'message' => 'Demaciado pequeno são 9 numeros'),
        array('telefone', 'maximum' => 9, 'message' => 'Demaciado grande apenas 9 numeros'),
        array('telefone', 'minimum' => 9, 'message' => 'Demaciado pequeno são 9 numeros'),
    );

    static $validates_format_of = array(
    array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/' , 'message' => 'Não é um email valido'),
    array('codigopostal', 'with' => '/^[0-9_]{4,4}+([0-9_]+)*[-][0-9_]{2,2}+([0-9_])$/' , 'message' => 'codigopostal invalido, formato valido = (xxxx-xxx)')
  );

    static $has_many = array(
        array('faturas')
    );

}