<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'Campo Obrigatorio'),
        array('email', 'message' => 'Campo Obrigatorio'),
        array('morada', 'message' => 'Campo Obrigatorio'),
        array('telefone', 'message' => 'Campo Obrigatorio'),
        array('nif', 'message' => 'Campo Obrigatorio'),
        array('codigopostal', 'message' => 'Campo Obrigatorio'),
        array('localidade', 'message' => 'Campo Obrigatorio'),
    );

    static $validates_size_of = array(
        array('nif', 'maximum' => 9, 'too_long' => 'too long!'),
        array('nif', 'minimum' => 9, 'too_short' => 'too short!'),
        array('telefone', 'maximum' => 9, 'too_long' => 'too long!'),
        array('telefone', 'minimum' => 9, 'too_short' => 'too short!'),
  );

}