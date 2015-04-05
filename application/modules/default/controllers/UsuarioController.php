<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Dell
 */
class UsuarioController extends Zend_Controller_Action {

    private $storage;
    private $data;  
    
    function init() {
         $this->storage = new Zend_Auth_Storage_Session();
         $this->data = get_object_vars($this->storage->read());  
    }
    
    function indexAction() {
        $usuario = new Models_Usuarios();
//        $cursos = $usuario->getCursos($this->data);
//        
//        $this->view->cursos = $cursos;
        
        $perguntas = $usuario->getPerguntas($this->data);
        
        $this->view->perguntas = $perguntas;
        
        $cursos = $usuario->getCursosSlidesDoUsuario($this->data);
        
        $this->view->cursos = $cursos;
    }
    
    function cursosAction() {
  
    }
      
}
