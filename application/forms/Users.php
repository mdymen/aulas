<?php

require_once 'Decorators/NewUser.php';

class Form_Users extends Zend_Form {
    
    function init() {  
        $this->setAction("index/cadastrar")->setMethod("post");
        
        //$name = new Zend_Form_Element_Text('ST_NAME_USU', array('placeholder' => 'Nome completo', 'decorators' => array($decorator)));
        $name = new Zend_Form_Element_Text('ST_USUARIO_USU', array('placeholder' => 'Nome completo')); 
        
        $pass = new Zend_Form_Element_Text('ST_SENHA_USU', array('placeholder' => 'Senha'));
        
        $cpass = new Zend_Form_Element_Text('ST_CSENHA_USU', array('placeholder' => 'Confirmaçao senha'));
        
        /*$city = new Zend_Form_Element_Text('ST_CITY_USU');
        $state = new Zend_Form_Element_Text('ST_STATE_USU');*/
     /*   $email = new Zend_Form_Element_Text('ST_EMAIL_USU', array('placeholder' => 'Correio electrónico'));
        $birth = new Zend_Form_Element_Text('DT_BIRTH_USU', array('placeholder' => 'Data nacimento'));
        $register = new Zend_Form_Element_Button('Registrar', array('type' => 'submit'));
        
        $this->addElements(array($id, $name, $pass, $cpass, $email, $birth, $register));
        */
    }
}
