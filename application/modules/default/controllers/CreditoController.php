<?php
date_default_timezone_set('America/Sao_Paulo');
include APPLICATION_PATH.'/models/creditos.php';
include APPLICATION_PATH.'/models/creditosPendentes.php';

class CreditoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $modelo = new Application_Model_Creditos_Pendentes();
      $dados = $modelo->retornarPendentes();

        
        
    }
    public function comprarAction(){
//        
//        $this->getHelper('viewRenderer')->setNoRender();
//        $this->getHelper('layout')->disableLayout();
        
       
         $modelo = new Application_Model_Creditos_Pendentes();
         
         $storage = new Zend_Auth_Storage_Session();
         $data = (get_object_vars($storage->read()));
          
         $dados = $this->_request->getParams();
         $dados = array_merge($dados,$data);
   
         try{
//            $num = $modelo->select()
//                          ->where('ID_USUARIO = (?)',$dados['ID_ID_USU'])
//                          ->query()
//                          ->fetchAll();
            
            
          //Se ja existir credito atualiza para o novo valor, senao insere o valor novo
//          if(count($num)){
//             $timestamp = date('Y-m-d H:i:s');
//             $modelo->update(array('VL_VALOR_CREDITO_PEN'=>$dados['VL_VALOR_CREDITO'],
//                                   'DT_DATA_CREDITO_PEN'=>$timestamp),
//                                   'ID_USUARIO = ('.$dados['ID_ID_USU'].')');  
//          }else{
             $row = $modelo->createRow(array(
                   'ID_USUARIO'=>$dados['ID_ID_USU'],
                   'VL_VALOR_CREDITO_PEN'=>$dados['VL_VALOR_CREDITO']
           ));
          $row->save();
       // }
         
        }  catch (Exception $e){
             throw new Exception('Erro ao inserir credito', $e);
        }  
    }
}

