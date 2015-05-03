<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author Junqueira
 */
include APPLICATION_PATH.'/models/creditosPendentes.php';

class Admin_DashboardController extends Zend_Controller_Action{
    
        public function init()
    {
         $this->_helper->layout->setLayout('admin');
    }

    public function indexAction(){
        
        $modUsuarios = new Models_Usuarios();
        
        $data = $modUsuarios->getAll();

        $this->view->usuarios = $data;
  
    }
    
    public function creditopendenteAction(){
        
        $dados = $this->_request->getParams();
        $modelo = new Application_Model_Creditos_Pendentes();
        
        if(!empty($dados['idCredito'])){
            
//            $this->getHelper('viewRenderer')->setNoRender();
//            $this->getHelper('layout')->disableLayout('admin');

            $id = $dados['idCredito'];
            
            $modelo->liberarCredito($id);
        }else{
            $data = $modelo->getAll();
            $this->view->pendentes = $data;
        } 
    }   
}
