<?php

include APPLICATION_PATH.'/decorators/decorator1.php';
include APPLICATION_PATH.'/decorators/Textarea.php';
include APPLICATION_PATH.'/decorators/Combobox.php';
include APPLICATION_PATH.'/decorators/Button.php';
class Forms_Slide_Adicionar extends Zend_Form{
    
    var $_cursos;
    
 function init() {
        
        $root = 'http' . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public/admin';
        
        $this->setAction($root."/slide/addslide")->setMethod("post");

        $decorator2 = new Decorators_Decorator1();  
        $slide = new Zend_Form_Element_Text('NM_SLIDE_SLI', array('placeholder' => '', 'icono' => 'fa fa-sort-numeric-asc', 'col' => 'col-sm-2')); 
        $slide->addDecorator($decorator2);
        
        $decorator3 = new Decorators_Combobox(); 
        $curso = new Zend_Form_Element_Select('ID_CURSO_CR', array('col' => 'col-sm-3')); 
 
        $cursos = new Models_Cursos();
        $cursos = $cursos->cursos();
               
        $curso->addMultiOptions($cursos);
        $curso->addDecorator($decorator3);

        $decorator = new Decorators_Decorator1();
        $titulo = new Zend_Form_Element_Text('ST_TITULO_SLI', array('placeholder' => 'Titulo'));
        $titulo->addDecorator($decorator);
   
        $desc = new Zend_Form_Element_Textarea('ST_DESCR_SLI', array('placeholder' => 'Descricao', 'rows' => 3));
        $desc->addDecorator(new Decorators_Textarea());        
        
        $slidehtml = new Zend_Form_Element_Textarea('ST_SLIDE_SLI', array('placeholder' => 'HTML'));
        $slidehtml->addDecorator(new Decorators_Textarea());
        
        $respostas = new Zend_Form_Element_Textarea('ST_RESPOSTAS_SLI', array('placeholder' => 'Json de respostas', 'rows' => 3));
        $respostas->addDecorator(new Decorators_Textarea());
        
        $decButton = new Decorators_Button();
        $register = new Zend_Form_Element_Submit('Adicionar', array('class' => 'btn btn-blue', 'value' => 'Adicionar'));
        $register->addDecorator($decButton);
        
        $decPreview = new Decorators_Button();
        $preview = new Zend_Form_Element_Button('Preview', array('class' => 'btn btn-blue', 'value' => 'Preview', 'type' => 'button'));
        $preview->addDecorator($decPreview);        
        
        $this->addElements(array($curso, $slide,$titulo, $desc, $slidehtml, $respostas, $register, $preview));
    } 
    
}
