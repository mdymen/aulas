<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logib
 *
 * @author Dell
 */
require_once 'Decorators/NewUser.php';
require_once 'Decorators/NewUser_1.php';
require_once 'Decorators/Row.php';
class Form_Login extends Zend_Form {
    
   function init() {
       $this->setAction("check")->setMethod("post");
       
       $email = new Zend_Form_Element_Text('ST_EMAIL_USU', array(
           'placeholder' => 'Correio electrónico', 
           'name' => 'email',
           'row' => 'yes',
           'col' => 'col-sm-7',
           'type' => 'text'));
       
       $d2 = new Decorators_Row();
       
       $email->addDecorator($d2);
       
       
      // $email->setDecorators(array($d1,$d2));
        
       $pass = new Zend_Form_Element_Password('ST_PASS_USU', array('placeholder' => 'Senha',
           'name' => 'senha',
           'row' => 'yes',
           'col' => 'col-sm-7',
           'type' => 'password'));
       $pass->addDecorator($d2);
       
       $enter = new Zend_Form_Element_Submit('Login', array('value' => 'Log In', 'class' => 'btn btn-blue'));

       
       $this->addElements(array($email, $pass, $enter));
   }
}
