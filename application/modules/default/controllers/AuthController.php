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
    
    function checkusuarioAction() {
        $params = $this->_request->getParams();
        
        $usuarios = new Models_Usuarios();
        $usuario = $usuarios->getUserByUser($params['usuario']);
        $exists = true;
        if (empty($usuario)) {
            $exists = false;
        }
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($exists); 
    }

   function checkemailAction() {
        $params = $this->_request->getParams();
        
        $usuarios = new Models_Usuarios();
        $email = $usuarios->getUserByEmail($params['email']);
        $exists = true;
        if (empty($email)) {
            $exists = false;
        }
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($exists); 
    }
    
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
        
        $this->_mail($params);       
        $this->redirect();
    }
    
    private function _mail($params) {
        $mail = Bobby_Mail::getInstance();
        $mail->addTo('<'.$params['ST_EMAIL_USU'].'>');
        $mail->setSubject('Bem vindo Bobby Aulas');
        $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public/auth/confirmaremail?conf='.$params['ST_CONFIRMADO_USU'];
        $string = '<a href="'.$root.'" target="_BLANK">confirma email</a>';
        $mail->setBodyHtml($string);
        $mail->setFrom('bobbyaulas@gmail.com', 'Bobby Aulas');
        return $mail->send();
    }
    
    public function reenviarmailAction() {
        $params = $this->_request->getParams();
        
        $info = array(
            'ST_EMAIL_USU' => $params['email'],
            'ST_CONFIRMADO_USU' => $params['conf']
        );
        
        $this->_mail($info);
        
        $this->_redirect('index/index');
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
    
    function mailesqueceusenhaAction() {
        $params = $this->_request->getParams();
        
        $usuario = new Models_Usuarios();
        $email = $usuario->getUserByEmail($params['ST_EMAIL_USU']);
        
        if (!empty($email)) {
            $md5 = md5($params['ST_EMAIL_USU']);
            $mail = Bobby_Mail::getInstance();
            $mail->addTo('<'.$params['ST_EMAIL_USU'].'>');
            $mail->setSubject('Bem vindo Bobby Aulas');
            $root = 'http'. '://' . $_SERVER['HTTP_HOST'] . '/aulas/public/?esqueceu='.$md5;
            $string = '<a href="'.$root.'" target="_BLANK">mudar senha</a>';
            $mail->setBodyHtml($string);
            $mail->setFrom('bobbyaulas@gmail.com', 'Bobby Aulas');
            $mail->send();    
            
            $usuario->mudarSenhaMd5($md5, $params['ST_EMAIL_USU']);
        }
        
        $this->redirect('?senha=x');
        
    }
    
    function trocarsenhaAction() {
        $params = $this->_request->getParams();
         
        $usuarios = new Models_Usuarios();
        $usuario = $usuarios->trocarSenhaEsquecida($params);
        
        if ($usuario) {
            $this->setParam('ST_USUARIO_USU', $usuario['ST_USUARIO_USU']);
            $this->setParam('ST_SENHA_USU', $usuario['ST_SENHA_USU']);
            $this->loginAction();
        }
        
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
