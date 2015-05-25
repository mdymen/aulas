<?php

include_once APPLICATION_PATH.'/decorators/decorator1.php';
class Forms_Curso_AdUsuario extends Zend_Form {
    function init() {
        
        $d = new Decorators_Decorator1();
        $buscar_usuario = new Zend_Form_Element_Text('ST_USUARIO_USU', array('placeholder' => 'Buscar usuario', 'icono' => 'fa fa-search'));
        $buscar_usuario->addDecorator($d);
        
        $this->addElement($buscar_usuario);
    }
}
