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
class Decorators_Form extends Zend_Form_Decorator_Abstract {
                                                           
    protected $_format = '<form>%elements</form>';
 
    public function render($content)
    {
        $titulo = htmlentities($this->getElement()->getAttrib("titulo"));
        $action = htmlentities($this->getElement()->getAttrib("action"));
        $method = htmlentities($this->getElement()->getAttrib("method"));
        $enctype = htmlentities($this->getElement()->getAttrib("enctype"));
        $classes = $this->getElement()->getAttrib("class");
        
        $enctyestring= '';
        
        if ($enctype != ""){
            $enctyestring = 'enctype = multipart/form-data';
        }
        
        if ($classes == "") {
            $classes = "col-lg-6 col-sm-6 col-xs-12"; 
        }
        
        $v = '<div class="'.$classes.'">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption" id="tituloForm">'.$titulo.'</span>
                </div>
                <div class="widget-body">
                    <div>';
        
        $form = $v."<form ".$enctyestring." action=".$action." method=".$method." >";
        $elements = $this->getElement()->getElements();
        
        foreach ($elements as $element) {
            $form .= $element->__toString();
        }
        $form .= "</form></div></div></div></div>";
        return $form;
    }
       /* $element = $this->getElement();
        $name    = htmlentities($element->getFullyQualifiedName());
        $label   = htmlentities($element->getLabel());
        $id      = htmlentities($element->getId());
        $placeholder = htmlentities($element->getAttrib("placeholder"));
 
        $markup  = sprintf($this->_format, $name, $label, $id, $name, $placeholder);
        return $markup;*
    }*/
}
