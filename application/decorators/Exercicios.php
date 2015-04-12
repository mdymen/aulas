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
class Decorators_Exercicios extends Zend_Form_Decorator_Abstract {
                                                           
    public function render($content)
    {
        $action = htmlentities($this->getElement()->getAttrib("action"));
        $method = htmlentities($this->getElement()->getAttrib("method"));
        $enctype = htmlentities($this->getElement()->getAttrib("enctype"));
        $classes = $this->getElement()->getAttrib("class");
        
        $enctyestring= '';
        
        if ($enctype != ""){
            $enctyestring = 'enctype = multipart/form-data';
        }
        
        if ($classes == "") {
            $classes = "col-lg-12 col-sm-6 col-xs-12"; 
        }
        
        $form = "<form id='frmExc' ".$enctyestring." action=".$action." method=".$method." ><div class='widget-body ".$classes."'>";
        $elements = $this->getElement()->getElements();
        
        foreach ($elements as $element) {
            $form .= $element->__toString();
        }
        $form .= "</div></form>";
        return $form;
    }
}
