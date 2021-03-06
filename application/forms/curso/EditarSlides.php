<?php

include_once APPLICATION_PATH.'/decorators/decorator1.php';
include_once APPLICATION_PATH.'/decorators/textarea.php';
include_once APPLICATION_PATH.'/decorators/file.php';
include_once APPLICATION_PATH.'/decorators/buttoniconer.php';

class Forms_Curso_EditarSlides extends Zend_Form {
    
    function init() {
        
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/curso/editar")->setMethod("post");

        $this->setAttrib('enctype', 'multipart/form-data');
                
        $decorator1 = new Decorators_Decorator1();        
        $nome = new Zend_Form_Element_Text('ST_NOME_CR"', array('placeholder' => 'Nome'));
        $nome->addDecorator($decorator1);
        
                $id = new Zend_Form_Element_Hidden('ID_ID_CR');
        
        $decorator8 = new Decorators_Decorator1();        
        $subtitulo = new Zend_Form_Element_Text('ST_SUBTITULO_CR"', array('placeholder' => 'Categoria'));
        $subtitulo->addDecorator($decorator8);
        
        $decorator2 = new Decorators_Decorator1();  
        $custo = new Zend_Form_Element_Text('VL_CUSTO_CR', array('placeholder' => 'Custo', 'icono' => 'fa fa-dollar', 'col' => 'col-sm-4')); 
        $custo->addDecorator($decorator2);
        
        $decorator7 = new Decorators_Textarea(); 
        $minides = new Zend_Form_Element_Textarea('ST_MINIDESCR_CR', array('placeholder' => 'Descricao curta', 'rows' => 5));
        $minides->addDecorator($decorator7);    
                                
        $decFile = new Decorators_File();
        $file = new Zend_Form_Element_File('ST_IMAGEM_CR', array('nomeCampo' => 'Imagem'));
        $file->setDestination(APPLICATION_PATH."/uploads");
        $file->addDecorator($decFile);
               
        $curso = new Zend_Form_Element_File('ST_IDENT_CR', array('nomeCampo' => 'Arquivo PPT'));
        $curso->setDestination(APPLICATION_PATH."/cursos");
        $curso->addDecorator($decFile);
        
        $decButton = new Decorators_ButtonIconeR();
        $register = new Zend_Form_Element_Button('Gravar', array('type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Atualizar'));        
        $register->addDecorator($decButton);
        
        $disponibilizar = new Zend_Form_Element_Button('btnDisp', array('type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Disponibilizar', 'icone' => 'fa fa-unlock'));
        $disponibilizar->addDecorator($decButton);
        
        $this->addElements(array($custo, $nome, $subtitulo, $minides, $file, $curso, $register, $id));
        
    }  //put your code here
    
}
