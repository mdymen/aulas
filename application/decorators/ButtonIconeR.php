<?php

class Decorators_ButtonIconeR extends Zend_Form_Decorator_Abstract {
    
    protected $_format = '<button name="%s" id="%s" type="%s" class="%s" style="margin-right: 10px">%s<i class="%s right"></i></button>';

    public function render($content)
    {
        $element = $this->getElement();
        $name    = htmlentities($element->getFullyQualifiedName());
        $id      = htmlentities($element->getId());
        $value   = htmlentities($element->getValue());
        $class   = htmlentities($element->getAttrib('class'));
        $type = htmlentities($element->getAttrib('type'));
        $icone = $element->getAttrib('icone');
        
        if ($type == '') {
            $type = "submit";
        }
        
        $markup  = sprintf($this->_format, $name, $id, $type, $class, $value,$icone);
        return $markup;
    }
}
