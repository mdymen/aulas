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
//        $users = new Models_Usuarios();
//
//            $auth = Zend_Auth::getInstance();
//            $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(),'Usuarios');
//            $authAdapter->setIdentityColumn('ST_USUARIO_USU')
//                        ->setCredentialColumn('ST_SENHA_USU');
//            $authAdapter->setIdentity('mdymen')
//                        ->setCredential('3345531');
//
//            $result = $auth->authenticate($authAdapter);
//     
//            $user = $authAdapter->getResultRowObject();
//         
//                $storage = new Zend_Auth_Storage_Session();
//                $storage->write($user);
            
        
    }
    
    public function registerAction() {}
    
    public function testAction() {
        
        $x[0]['pergunta'] = 'PERGUNTA??';
        $x[0]['nome'] = 'pergunta1';
        
        $x[1]['pergunta'] = 'y ahora que pergunta?';
        $x[1]['nome'] = 'pergunta2';
        
        $form = new Forms_Exercicios_Perguntas($x);
        $this->view->form = $form;
    }
    
    
}
