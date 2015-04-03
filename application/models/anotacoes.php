<?php

class Models_Anotacoes extends Zend_Db_Table_Abstract {
    protected $_name = 'Anotacoes';
    
   function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_CURSO_CR'   =>   $params['ID_CURSO_CR'],
            'ID_USUARIO_USU'   =>   $params['ID_USUARIO_USU'],
            'ST_TEXTO_ANO'  =>   $params['ST_TEXTO_ANO'],
        );
        $db->insert($this->_name, $info);       
    }    
    
    function anotacoes($idCurso, $idUsuario){
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)
                ->where('ID_CURSO_CR = ?', $idCurso)
                ->where('ID_USUARIO_USU = ?', $idUsuario);
        
        $query = $select->query();
        
        $anotacao = $query->fetchAll();
        
        return $anotacao;
    }
    
    function delete($idCurso, $idUsuario) {
        $db = Zend_Db_Table::getDefaultAdapter();
         
        $table = $this->_name;
        
        $db->delete($table, array(
           'ID_CURSO_CR = ?' => $idCurso,
           'ID_USUARIO_USU = ?' => $idUsuario
        ));       
    }
    
}
