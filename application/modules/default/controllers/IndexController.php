<?php //

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author Martin Dymenstein
 */
include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
class IndexController extends Zend_Controller_Action {

    public function indexAction() {
        
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());
        
        $cursos = new Models_Cursos();
        $result = $cursos->countSlides();
        
        $usuario = new Models_Usuarios();
        
        $this->view->cursos = $result;
        $this->view->perguntas = $usuario->dashboard($data);
        $this->view->cantCursos = $cursos->cantCursos();
        
    }
    
    public function registerAction() {}
    
}
