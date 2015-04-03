<?php


class Models_Perguntas extends Zend_Db_Table_Abstract {
    
    protected $_name = "Perguntas_Cursos";
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_CURSO_CR'   =>   $params['ID_CURSO_CR'],
            'ID_USUARIO_USU'  =>   $params['ID_USUARIO_USU'],
            'ST_PERGUNTA_PER'  =>   $params['ST_PERGUNTA_PER'],
            'ST_RESPOSTA_PER' => '',
            'DT_UTIMOMOV_PER' => $params['DT_UTIMOMOV_PER']
        );
        $db->insert($this->_name, $info);   
    }
    
    function perguntas($curso, $usuario) {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table)->where("ID_CURSO_CR = ".$curso)->where("ID_USUARIO_USU = ".$usuario);
  
        $query = $select->query();
                
        $perguntas = $query->fetchAll();
        
        return $perguntas;         
    }
    
    function todasPerguntas() {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table);
  
        $query = $select->query();
                
        $perguntas = $query->fetchAll();
        
        return $perguntas;           
    }
    
    function pergunta($idPergunta) {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table)->where('ID_PERGUNTA_PER = '.$idPergunta);
  
        $query = $select->query();
                
        $perguntas = $query->fetchAll();
        
        return $perguntas;          
    }
    
    function responder($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ST_RESPOSTA_PER'   =>   $params['ST_RESPOSTA_PER'],
            'DT_UTIMOMOV_PER'  =>   $params['DT_UTIMOMOV_PER'],
        );

        $db->update($this->_name, $info, 'ID_PERGUNTA_PER = '.$params['ID_PERGUNTA_PER']);
    }
    
    function excluir($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
       
        $db->delete($this->_name, 'ID_PERGUNTA_PER = '.$params['ID_PERGUNTA_PER']);
    }
    
}
