<?php

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
class Admin_IndexController extends Zend_Controller_Action {
    
    public function init()
    {
        $this->_helper->layout->setLayout('admin');
    }

    public function indexAction()
    {
        // action body
    }
    
    public function loginAction() {}

    public function cadastrarAction() {
        $params = $this->_request->getParams();
        
        $params['ST_LOGIN_USU'] = $params['ID_USUARIO_USU'];
        $params['FL_ADMIN_USU'] = false;
        
        $model = new Models_Usuarios();
        $model->save($params);
        
        $login = Models_Login::logar($params['ID_USUARIO_USU'], $params['ST_SENHA_USU']);
        if ($login) {
            $this->indexAction();
        }
    }
    
    public function cadastroAction() {}

}
