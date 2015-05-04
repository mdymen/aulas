<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sugestoes
 *
 * @author Martin Dymenstein
 */
include APPLICATION_PATH.'/decorators/textarea.php';
include_once APPLICATION_PATH.'/decorators/button.php';
class Forms_Sugestoes extends Zend_Form {
    
    function init() {
        
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/usuario/addsugestao")->setMethod("post");

        
        $dec = new Decorators_Textarea();
        $sug = new Zend_Form_Element_Textarea("ST_TEXTO_SUG", array('placeholder' => 'Escreve sua sugestao...','rows' => '5', 'cols' => '26'));
        $sug->addDecorator($dec);
                
        $decbtn = new Decorators_Button();
        $gravar = new Zend_Form_Element_Button('btnEnviarSugestao', array('value' => 'Enviar', 'class' => 'btn btn-blue', 'type' => 'submit'));
        $gravar->addDecorator($decbtn);
        
        $this->addElements(array($sug, $gravar));
    }
}
