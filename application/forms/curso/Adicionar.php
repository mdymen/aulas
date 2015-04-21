<?php

include APPLICATION_PATH.'/decorators/decorator1.php';
include APPLICATION_PATH.'/decorators/textarea.php';
class Forms_Curso_Adicionar extends Zend_Form{
 function init() {
        
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public/admin';
        
        $this->setAction($root."/curso/addcurso")->setMethod("post");

        $this->setAttrib('enctype', 'multipart/form-data');
        
        $decorator = new Decorators_Decorator1();
        $id = new Zend_Form_Element_Text('ST_IDENT_CR', array('placeholder' => 'Identificador do curso', 'icono' => 'fa fa-key', 'col' => 'col-sm-6'));
        $id->addDecorator($decorator);
        
        $decorator1 = new Decorators_Decorator1();        
        $nome = new Zend_Form_Element_Text('ST_NOME_CR"', array('placeholder' => 'Nome do curso'));
        $nome->addDecorator($decorator1);
        
        $decorator2 = new Decorators_Decorator1();  
        $custo = new Zend_Form_Element_Text('VL_CUSTO_CR', array('placeholder' => 'Custo', 'icono' => 'fa fa-dollar', 'col' => 'col-sm-4')); 
        $custo->addDecorator($decorator2);
        
        $decorator3 = new Decorators_Textarea(); 
        $des = new Zend_Form_Element_Textarea('ST_DESCR_CR', array('placeholder' => 'Descripcion', 'rows' => 5));
        $des->addDecorator($decorator3);    
        
        $decorator4 = new Decorators_Textarea(); 
        $conteudo = new Zend_Form_Element_Textarea('ST_CONTEUDO_CR', array('placeholder' => 'Conteudo. Separe o conteudo usando ";"', 'rows' => 5));
        $conteudo->addDecorator($decorator4);  

        $decorator5 = new Decorators_Textarea(); 
        $objetivo = new Zend_Form_Element_Textarea('ST_OBJETIVO_CR', array('placeholder' => 'Objetivo', 'rows' => 5));
        $objetivo->addDecorator($decorator5);          

        $decorator6 = new Decorators_Textarea(); 
        $caract = new Zend_Form_Element_Textarea('ST_CARACT_CR', array('placeholder' => 'Caracteristicas. Separe as caracteristicas usando ";"', 'rows' => 5));
        $caract->addDecorator($decorator6);         
        
        $file = new Zend_Form_Element_File('ST_IMAGEM_CR');
        $file->setDestination(APPLICATION_PATH."/uploads");
        
        $register = new Zend_Form_Element_Button('Adicionar', array('type' => 'submit', 'class' => 'btn btn-blue'));
        
        $this->addElements(array($id, $custo, $nome,  $des, $objetivo, $conteudo, $caract, $file, $register));
        
    }  //put your code here
}
