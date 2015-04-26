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
        $params = $this->_request->getParams();
        
        $usuario = new Models_Usuarios();
        $params['ST_CONFIRMADO_USU'] = md5($params['ST_SENHA_USU']);
        $usuario->save($params);
        
        $users = new Models_Usuarios();
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
            } 
        
        
        $this->redirect();
    }
    
    private function _mail($params) {
        $mail = Bobby_Mail::getInstance();
        $mail->addTo($params['ST_EMAIL_USU']);
        $mail->setSubject('Bem vindo Bobby Aulas');
        $mail->setBodyHtml('<a href="http://www.bobbyaulas.com/aulas/public/auth/confirmaremail&conf="'.$params['ST_CONFIRMAR'].'" target="_BLANK">confirma email</a>');
        $mail->setFrom('msn@dymenstein.com', 'Martin Dymenstein');
        $mail->send();
    }
    
    function logoutAction() {
        $storage = new Zend_Auth_Storage_Session();
        $storage->clear();
        $this->_redirect();
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
            } 
        }
        $this->_redirect('index/index');
    }
    
    function confirmaremailAction() {
        $params = $this->_request->getParams();
        
        $usuario = new Models_Usuarios();
        $result = $usuario->confirmar($params);
        
        if (is_array($result)) {
            $this->setParam('ST_USUARIO_USU', $result['ST_USUARIO_USU']);
            $this->setParam('ST_SENHA_USU', $result['ST_SENHA_USU']);
            $this->loginAction();
        } else {
            die('ERROR');
        }
    }
}
