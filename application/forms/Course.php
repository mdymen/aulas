<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author Dell
 */
class Form_Course extends Zend_Form {
    
    function init() {
        $this->setAction("save")->setMethod("post");
        
        $title = new Zend_Form_Element_Text('ST_TITLE_CUR', array('placeholder' => 'Nome do curso'));
        $desc = new Zend_Form_Element_Textarea('ST_DESCR_CUR', array('placeholder' => 'Descipcao'));
        $tags = new Zend_Form_Element_Text('ST_TAGS_CUR', array('placeholder' => 'Tags'));
        $price = new Zend_Form_Element_Text('VL_PRICE_CUR', array('placeholder' => 'Preço'));
        $add = new Zend_Form_Element_Submit('Adicionar');
        
        
        $this->addElements(array($title, $desc, $tags,$price, $add));
    }
}
