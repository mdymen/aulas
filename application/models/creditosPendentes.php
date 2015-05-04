<?php

class Application_Model_Creditos_Pendentes extends Zend_Db_Table_Abstract
{

    protected $_name = 'credito_pendentes';
        
    public function inserir($params){
        
        $info = array(
            'ID_USUARIO'=>$params['ID_USUARIO'],
            'NM_VALOR'=>$params['NM_VALOR'],
        );
        
        $this->insert($info);  
    }
    
    public function retornarPendentes($id=''){
        
        $adp = Zend_Db_Table::getDefaultAdapter();
        $cond = $adp->quoteInto('ID_USUARIO = ?', 1);
        
        if($id){
           $cond = $adp->quoteInto('ID_USUARIO = ?', $id);
        }
                
        $creditos = $this->select()
                         ->where($cond)
                         ->query()
                         ->fetchAll();
        return $creditos;
        
    }
    
    public function getAll($id = ''){
        
        $db = $this->_db;
        $where = 1;
        if($id){
            $where = $db->quoteInto('ID_ID_USU = (?)', $id);
        }
        
        
      $dados = $db->select()
                ->from(array('pen'=>'credito_pendentes'))   
                ->joinLeft(array('usu'=>'usuarios'), 'pen.ID_USUARIO = usu.ID_ID_USU')
                ->where($where)
                ->query()
                ->fetchAll();   
        return $dados; 
    }
    
    public function liberarCredito($id){
        
        $db = $this->_db;
        $cond = $db->quoteInto('ID_CREDITO_PEN = (?)', $id);
        $db->update($this->_name, array('FL_PENDENTE'=>0),$cond);
        
    }
    
    public function countPendentes() {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        return $db->select()->from($this->_name,array('count' => 'Count(*)'))
                ->where('FL_PENDENTE = ?',1)
                ->query()
                ->fetch();
    }
}
