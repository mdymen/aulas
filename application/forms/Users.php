<?php

require_once 'Decorators/Decorator1.php';
require_once 'Decorators/Button.php';

class Forms_Users extends Zend_Form {
    
    function init() {  
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
         
        $this->setAction($root."/usuario/atualizar")->setMethod("post");
       
        $hdUser = new Zend_Form_Element_Hidden('ST_USUARIO_USU');
        $hdId = new Zend_Form_Element_Hidden('ID_ID_USU');
        
        $decorator = new Decorators_Decorator1();
        $usuario = new Zend_Form_Element_Text('ST_USUARIO_USU', array('placeholder' => 'Usuario', 'disabled'=>'disabled')); 
        $usuario->addDecorator($decorator);
        
        $decorator1 = new Decorators_Decorator1();
        $senha = new Zend_Form_Element_Text('ST_SENHA_USU', array('placeholder' => 'Senha', 'type' => 'password'));
        $senha->addDecorator($decorator1);
        
        $decorator2 = new Decorators_Decorator1();
        $confsenha = new Zend_Form_Element_Text('ST_CSENHA_USU', array('placeholder' => 'Confirmaçao senha', 'type'=>'password'));
        $confsenha->addDecorator($decorator2);

        $decorator3 = new Decorators_Decorator1();        
        $email = new Zend_Form_Element_Text('ST_EMAIL_USU',array('paceholder' => 'Correio eletronico'));
        $email->addDecorator($decorator3);
        
        $btnDecorator = new Decorators_Button();
        $btnAtualizar = new Zend_Form_Element_Button('Registrar', array('type' => 'submit', 'value' => 'Atualizar', 'class'=>'btn btn-success'));
        $btnAtualizar->addDecorator($btnDecorator);
        
        $this->addElements(array($hdId, $hdUser, $usuario, $senha, $confsenha, $email, $btnAtualizar));
        
    }
}
