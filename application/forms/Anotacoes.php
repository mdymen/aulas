<?php

include APPLICATION_PATH.'/decorators/decorator1.php';
include APPLICATION_PATH.'/decorators/Textarea.php';
include APPLICATION_PATH.'/decorators/Combobox.php';
include APPLICATION_PATH.'/decorators/Button.php';
class Forms_Anotacoes extends Zend_Form {
    
    function init() {
        
        $dec = new Decorators_Textarea();
        $anotacoes = new Zend_Form_Element_Textarea("ST_TEXTO_ANO", array('placeholder' => 'Escreve as anotacoes do curso...'));
        $anotacoes->addDecorator($dec);
        
        $idusu = new Zend_Form_Element_Hidden('ID_USUARIO_USU');
        
        $idcurso = new Zend_Form_Element_Hidden('ID_CURSO_CR');
        
        $decbtn = new Decorators_Button();
        $gravar = new Zend_Form_Element_Button('Gravar', array('value' => 'Gravar', 'class' => 'btn btn-blue', 'type' => 'button'));
        $gravar->addDecorator($decbtn);
        
        $this->addElements(array($anotacoes, $idcurso, $idusu, $gravar));
        
    }
}
