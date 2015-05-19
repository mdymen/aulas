<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author Martin Dymenstein
 */
class Decorators_File extends Zend_Form_Decorator_Abstract {
    
    public function render($content)
    {
        
        
        $element = $this->getElement();
        $name    = htmlentities($element->getFullyQualifiedName());
        $id      = htmlentities($element->getId());
        $label   = $element->getAttrib('nomeCampo');

        $_format = '<label for="%s">%s</label><input type="file" id="%s" name="%s"  class="form-control" /><br>';
        $markup  = sprintf($_format,$name,$label,$id, $name);

        return $markup;
    }
}
