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
       
        $db->update($this->_name, array('FL_EXCLUIDA_PER' => 1), 'ID_PERGUNTA_PER = '.$params['ID_PERGUNTA_PER']);
    }
    
    function lida($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
       
        $db->update($this->_name, array('FL_LIDA_PER' => 1), 'ID_PERGUNTA_PER = '.$params['ID_PERGUNTA_PER']);
    }
    
    function perguntasUsuario($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $select = $db->select()->from($this->_name)
                ->joinLeft('CURSOS', 'CURSOS.ID_ID_CR = PERGUNTAS_CURSOS.ID_CURSO_CR ')
                ->where('ID_USUARIO_USU = ?', $params['ID_USUARIO_USU'])
                ->where('FL_EXCLUIDA_PER = 0');
        
        $query = $select->query();
                
        $res = $query->fetchAll();
        
        return $res;    
    }
    
    function perguntasUsuarioNaoLidas($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $select = $db->select()->from($this->_name)
                ->joinLeft('CURSOS', 'CURSOS.ID_ID_CR = PERGUNTAS_CURSOS.ID_CURSO_CR ')
                ->where('ST_RESPOSTA_PER <> ""')
                ->where('ID_USUARIO_USU = ?', $params['ID_USUARIO_USU'])
                ->where('FL_EXCLUIDA_PER = 0')
                ->where('FL_LIDA_PER = 0');
        
        $query = $select->query();
                
        $res = $query->fetchAll();
        
        return $res;    
    }    
    
    
}
