<?php

include APPLICATION_PATH.'/decorators/decorator1.php';
include APPLICATION_PATH.'/decorators/Combobox.php';
include APPLICATION_PATH.'/decorators/textarea.php';
include APPLICATION_PATH.'/decorators/button.php';
class Forms_Slide_Editar extends Zend_Form{
  var $_cursos;
    
 function init() {
        
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/admin/slide/editslide")->setMethod("post");

        $id = new Zend_Form_Element_Hidden('ID_SLIDE_SLI');        
        
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
        
        $decButton = new Decorators_Button();
        $register = new Zend_Form_Element_Submit('Gravar', array('class' => 'btn btn-blue', 'value' => 'Gravar'));
        $register->addDecorator($decButton);
        
        $decPreview = new Decorators_Button();
        $preview = new Zend_Form_Element_Button('Preview', array('class' => 'btn btn-blue', 'value' => 'Preview', 'type' => 'button'));
        $preview->addDecorator($decPreview);        
        
        $this->addElements(array($id, $curso, $slide,$titulo, $desc, $slidehtml, $register, $preview));
    } 
    
}
