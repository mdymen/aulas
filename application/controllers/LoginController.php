<?php

include APPLICATION_PATH.'/models/login.php';
class LoginController extends Zend_Controller_Action
{
 
    public function init()
    {
//               
         
        /* Initialize action controller here */
    }
 
    public function indexAction()
    {
         
    }
 
    public function sairAction()
    {
       $auth = Zend_Auth::getInstance();
       $auth->clearIdentity();
       $this->redirect('../');
         
         
    }
 
    public function logonAction()
    {
        
        //desabilita a view
        $this->_helper->viewRenderer->setNoRender();
        
        //cria uma instancia do formulario de login
       // $form = new Forms_Logar();
         
        //pega os dados da requisicao
        $params = $this->_request->getParams();       
         
        //verifica se existe a acao logar
       if(isset($params['BTN_LOGAR'])){
            
           //coloca os dados da requisicao nao variavel dados
           //$dados = $resquest;
           //valida os dados com o metodo isValido do zend form
          // if($form->isValid($dados)){
               //pega os valores validados do form
              // $dados = $form->getValues();
   
               
                //cria a instancia do model login
               $modelo = new Models_Login();
                //chama a funcao logar do model
               $login = $modelo->logar($params['ST_LOGIN_USU'], $params['ST_SENHA_USU']);
                         
               //valida login
               if($login){
                   //se logar com sucesso redireciona para a index
                  // $url = $this->_helper->url(array('controller'=>'Index','action'=>index));
                   $this->redirect('../public');
                            
                   //$this->view->assign('message', 'logado');
               }else{
                   $this->redirect('../public/Login/logon');
                   //AINDA NAO IMPLEMENTEI...
                    
                    
                  // se nao logar faz alguma coisa
                   //se nao consegue se logar 
                  // $this->_helper->viewRenderer('Index/index', null, true);
 
                  // $this->view->assign('message', $flash->getMessages());
               }
           //}
            
            
            
       }
    }
}