<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slide
 *
 * @author Dell
 */
include APPLICATION_PATH.'/decorators/decorator1.php';
class Form_Slide extends Zend_Form {
    
    function init() {
        
        $this->setAction("adicionar")->setMethod("post");
        
        $course = new Zend_Form_Element_Text('ID_COURSE_SLI', array('placeholder' => 'Curso'));
        
        
        $pos = new Zend_Form_Element_Text('NM_POSITION_SLI', array('placeholder' => 'Posicion'));
        
        $slide = new Zend_Form_Element_Textarea('ST_SLIDE_SLI', array('placeholder' => 'Slide HTML'));
        
        $add = new Zend_Form_Element_Submit('Adicionar');
        
        
        $this->addElements(array($course, $pos, $slide, $add));
      
        
    }
}
