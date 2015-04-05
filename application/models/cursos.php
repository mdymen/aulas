<?php

class Models_Cursos extends Zend_Db_Table_Abstract {
    protected $_name = 'Cursos';
 
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
            (
            'ST_IDENT_CR'   =>   $params['ST_IDENT_CR'],
            'ST_NOME_CR'   =>   $params['ST_NOME_CR'],
            'ST_DESCR_CR'  =>   $params['ST_DESCR_CR'],
            'VL_CUSTO_CR'  =>   $params['VL_CUSTO_CR'],
            'ST_CONTEUDO_CR' => $params['ST_CONTEUDO_CR'],
            'ST_OBJETIVO_CR' => $params['ST_OBJETIVO_CR'],
            'ST_CARACT_CR' => $params['ST_CARACT_CR'],
            'ST_IMAGEM_CR' => $params['ST_IMAGEM_CR'],
                
            
            );
        $db->insert($this->_name, $info);       
    }
    
    function curso($id) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)->where('ID_ID_CR = ?', $id);
        
        $query = $select->query();
        
        $curso = $query->fetchAll();
        
        return $curso;
    }
    
    function cursos() {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table);
  
        $query = $select->query();
                
        $cursos = $query->fetchAll();
        
        return $cursos;         
    }
    

}
