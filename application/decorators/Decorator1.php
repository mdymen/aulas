<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Row
 *
 * @author Dell
 */
class Decorators_Decorator1 extends Zend_Form_Decorator_Abstract {
    
    protected $_format = '<input id="%s" name="%s"  class="form-control" placeholder="%s" type="%s" value="%s"/>';
 
    public function render($content)
    {
        $element = $this->getElement();
        $name    = htmlentities($element->getFullyQualifiedName());
        $id      = htmlentities($element->getId());
        $row     = htmlentities($element->getAttrib('row'));
        $col     = htmlentities($element->getAttrib('col'));
        $type    = htmlentities($element->getAttrib('type'));
        $icono  = htmlentities($element->getAttrib('icono'));
        $value   = htmlentities($element->getValue());
        $style = htmlentities($element->getAttrib('style'));
        
        $placeholder = htmlentities($element->getAttrib("placeholder"));
        
        $markup  = sprintf($this->_format,$id, $name, $placeholder, $type, $value);

        if ($icono != '') {
            $markup = '<span class="input-icon icon-right">'.$markup.'<i class="'.$icono.'"></i></span>';
        }
        
        $markup = '<div class="form-group">'.$markup.'</div>';
        
        
        
        if ($col != '') {
            $markup = '<div class="'.$col.'" style="padding-left: 0px !important">'.$markup.'</div>';
            
        }
        
        if ($row == 'yes') {
            $markup = '<div class="row">'.$markup.'</div>';
        }
        

        
        

        
        
        return $markup;
    }
}
