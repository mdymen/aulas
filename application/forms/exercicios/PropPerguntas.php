<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropPerguntas
 *
 * @author Martin Dymenstein
 */
class Forms_Exercicios_PropPerguntas extends Zend_Form {
    
    function init() {
        $decorator = new Decorators_Decorator1();
        
        $id = new Zend_Form_Element_Text('txtId', array('placeholder' => 'ID da pergunta'));
        $id->addDecorator($decorator);
        
        $pergunta = new Zend_Form_Element_Text('txtPergunta', array('placeholder' => 'Escreva a pergunta...'));
        $pergunta->addDecorator($decorator);
        
        $resposta = new Zend_Form_Element_Text('txtResposta', array('placeholder' => 'Escreva a resposta correta...'));
        $resposta->addDecorator($decorator);
        
        $this->addElements(array($id, $pergunta, $resposta));
        
    }
    
}
