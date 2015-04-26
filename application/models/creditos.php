<?php

class Application_Model_Creditos extends Zend_Db_Table_Abstract
{

    protected $_name = 'creditos';
        
    public function inserir($params){
        
        $info = array(
            'ID_USUARIO'=>$params['ID_USUARIO'],
            'NM_VALOR'=>$params['NM_VALOR'],
        );
        
        $this->insert($info);  
    }
    
    public function retornarCreditos($id){
        
        $adp = Zend_Db_Table::getDefaultAdapter();
        $cond = $adp->quoteInto('ID_USUARIO = ?', $id);
                
        $creditos = $this->select()
                         ->where($cond)
                         ->query()
                         ->fetchAll();
        return $creditos;
        
    }
   
}

