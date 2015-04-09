<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perguntas
 *
 * @author Martin Dymenstein
 */
class Decorators_Perguntas extends Zend_Form_Decorator_Abstract {
 
    public function render($content) {
        
        
        
        $_format ='
            <div class="form-group col-sm-5">
              
            <label for="exampleInputEmail1">%s</label>
            <span class="input-icon icon-right"> 
                <input type="email" class="form-control" name="%s" id="%s" placeholder="%s">
                <i class="fa fa-times" id="%s_times" style="display:none"></i>
                <i class="fa fa-check" id="%s_check" style="display:none"></i>                                                   
            </span></div>';          
//<div class="form-group">
//                                <label for="inputEmail3" class="col-sm-3 control-label no-padding-right">%s</label>
//                                    <div class="col-sm-3">
//                                        <span class="input-icon icon-right">                           
//                                            <input type="text" class="form-control" name="%s" id="%s" placeholder="%s">
//                                            <i class="fa fa-times" id="%s_times" style="display:none"></i>
//                                            <i class="fa fa-check" id="%s_check" style="display:none"></i>
//                                          </span>
//                                    </div>
//                            </div>';
        
        
        $element = $this->getElement();
        $name = $element->getName();
        $pergunta = $element->getAttrib('pergunta');
        $placeholder = $element->getAttrib("placeholder");
        $markup  = sprintf($_format,$pergunta, $name, $name, $placeholder,$name,$name);
        return $markup;
    }
}
