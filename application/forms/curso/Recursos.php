<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recursos
 *
 * @author Martin Dymenstein
 */
class Forms_Curso_Recursos extends Zend_Form {
    
    function init() {
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public/admin';
        
        $this->setAction($root."/index/filetesting");
//        ->setMethod("post");

//        $this->setAttrib('enctype', 'multipart/form-data');       
        $this->setAttrib('class', 'dropzone');
        $this->setAttrib('id', 'my-awesome-dropzone');
        
        $file = new Zend_Form_Element_File('recurso');
        $file->setDestination(APPLICATION_PATH."/../public/recursos");
        
        $register = new Zend_Form_Element_Button('btnPerfil', array('type' => 'submit', 'class' => 'btn btn-blue'));
        
        $this->addElement($file);
        $this->addElement($register);
    }
    
}
