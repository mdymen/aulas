<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil
 *
 * @author Martin Dymenstein
 */
class Forms_FotoPerfil extends Zend_Form{
    
    function init() {
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/usuario/perfil")->setMethod("post");

        $this->setAttrib('enctype', 'multipart/form-data');       
        $this->setAttrib('style', 'display: none');
        
        $file = new Zend_Form_Element_File('imgPerfil');
        $file->setDestination(APPLICATION_PATH."/../public/img/perfil");
        
        $register = new Zend_Form_Element_Button('btnPerfil', array('type' => 'submit', 'class' => 'btn btn-blue'));
        
        $this->addElement($file);
        $this->addElement($register);
    }
        
}
