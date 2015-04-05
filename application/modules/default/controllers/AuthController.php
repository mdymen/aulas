<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Martin Dymenstein
 */
//include APPLICATION_PATH.'/models/usuarios.php';
class AuthController extends Zend_Controller_Action {
    
    function indexAction() {}
    
    function signupAction() {

    }
    
    function logoutAction() {
        $storage = new Zend_Auth_Storage_Session();
        $storage->clear();
        $this->_redirect('index/index');
    }
    
    function loginAction() {
               
        $params = $this->_request->getParams();
        $users = new Models_Usuarios();

        if (!empty($params['ST_USUARIO_USU']) && !empty($params['ST_SENHA_USU'])) {
            $auth = Zend_Auth::getInstance();
            $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(),'Usuarios');
            $authAdapter->setIdentityColumn('ST_USUARIO_USU')
                        ->setCredentialColumn('ST_SENHA_USU');
            $authAdapter->setIdentity($params['ST_USUARIO_USU'])
                        ->setCredential($params['ST_SENHA_USU']);

            $result = $auth->authenticate($authAdapter);

            if ($result->isValid()) {
                
                $storage = new Zend_Auth_Storage_Session();
                $storage->write($authAdapter->getResultRowObject());
                print_r('logo1234');
            } else {
                print_r('error1234');
            }
            die('.');
        }
      
    }
}
