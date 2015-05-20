<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeleteSlide
 *
 * @author Martin Dymenstein
 */
class Forms_Curso_DeleteSlide extends Zend_Form {
    
    function init() {
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/curso/excluirslide")->setMethod("post");
        $this->addAttribs(array('id' => 'formExcluir'));
        
        
        $nome = new Zend_Form_Element_Hidden('ID_ID_CR');
        
        $this->addElement($nome);
    }
    
}
