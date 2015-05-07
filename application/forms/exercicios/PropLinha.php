<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropLinha
 *
 * @author Martin Dymenstein
 */
class Forms_Exercicios_PropLinha extends Zend_Form {
    
    function init() {
        $decorator = new Decorators_Decorator1();
        
        $id = new Zend_Form_Element_Text('txtId', array('placeholder' => 'ID da pergunta'));
        $id->addDecorator($decorator);
        
        $izq = new Zend_Form_Element_Text('txtIzq', array('placeholder' => 'Texto da izq...'));
        $izq->addDecorator($decorator);
        
        $dir = new Zend_Form_Element_Text('txtDer', array('placeholder' => 'Texto da dir...'));
        $dir->addDecorator($decorator);
        
        $resp = new Zend_Form_Element_Text('txtResp', array('placeholder' => 'Resposta...'));
        $resp->addDecorator($decorator);
        
        $this->addElements(array($id, $izq, $dir, $resp));
    }
    
}
