<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerguntasController
 *
 * @author Martin Dymenstein
 */
class PerguntasController extends Zend_Controller_Action {
    
    public function init() {
         //$this->_helper->layout->disableLayout();
    }
    
    public function indexAction(){
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());
    
        $data['ID_USUARIO_USU'] = $data['ID_ID_USU'];
        
        $perguntas = new Models_Perguntas();
        $result = $perguntas->perguntasUsuario($data);
        $this->view->perguntas = $result;
    }
}
