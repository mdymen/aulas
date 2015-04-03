<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewUser
 *
 * @author Dell
 */
class Decorators_NewUser extends Zend_Form_Decorator_Abstract {
                                                           
    protected $_format = '<div class="form-group col-md-6">
                    <input id="%s" name="%s" type="text" class="form-control" placeholder="%s">
                </div>';
 
    public function render($content)
    {
        $element = $this->getElement();
        $name    = htmlentities($element->getFullyQualifiedName());
        $label   = htmlentities($element->getLabel());
        $id      = htmlentities($element->getId());
        $placeholder = htmlentities($element->getAttrib("placeholder"));
 
        $markup  = sprintf($this->_format,$id, $name, $placeholder);
        return $markup;
    }
}
