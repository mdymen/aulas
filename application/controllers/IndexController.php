<?php

include APPLICATION_PATH.'/models/usuarios.php';
include APPLICATION_PATH.'/models/login.php';
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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

