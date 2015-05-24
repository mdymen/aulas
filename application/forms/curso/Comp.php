<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comp
 *
 * @author Martin Dymenstein
 */
include_once APPLICATION_PATH.'/Decorators/Textarea.php';
include_once APPLICATION_PATH.'/Decorators/Button.php';
class Forms_Curso_Comp extends Zend_Form {
    
    function init() { 
        $dec = new Decorators_Textarea();
        
        $descipcao = new Zend_Form_Element_Textarea('ST_DESCR_CR',array('placeholder' => utf8_encode('Descrição'), 'rows' => 5));
        $descipcao->addDecorator($dec);
        
        $conte = new Zend_Form_Element_Textarea('ST_CONTEUDO_CR',array('placeholder' => utf8_encode('Conteúdo'), 'rows' => 5));
        $conte->addDecorator($dec);
        
        $obj = new Zend_Form_Element_Textarea('ST_OBJETIVO_CR',array('placeholder' => utf8_encode('Objetivo'), 'rows' => 5));
        $obj->addDecorator($dec);
        
        $caract = new Zend_Form_Element_Textarea('ST_CARACT_CR',array('placeholder' => utf8_encode('Caracteristicas'), 'rows' => 5));
        $caract->addDecorator($dec);
        
        $decButton = new Decorators_Button();
        $button = new Zend_Form_Element_Button('btnAtualizarComp', array('value' => 'Atualizar', 'class' => 'btn btn-success', 'type' => 'button'));
        $button->addDecorator(($decButton));
        
        $this->addElements(array($descipcao,$conte,$obj,$caract,$button));
    }
    
}
