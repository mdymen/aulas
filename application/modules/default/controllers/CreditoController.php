<?php
include APPLICATION_PATH.'/models/creditos.php';

class CreditoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $modelo = new Application_Model_Creditos();
      $dados = $modelo->retornarCreditos(1);
      var_dump($dados);
      die;
        
        
    }
    public function comprarAction(){
        
         $modelo = new Application_Model_Creditos();
         
        
    }

}

