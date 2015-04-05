<?php


class  Models_Usuarios extends Zend_Db_Table {
    
    protected $_name = 'Usuarios';
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ST_USUARIO_USU' =>   $params['ST_USUARIO_USU'],
            'ST_SENHA_USU'   =>   $params['ST_SENHA_USU'],
            'ST_EMAIL_USU' => $params['ST_EMAIL_USU']
        );
        
        $db->insert($this->_name, $info);  
    }
    
    function getCursos($params) {
               
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;

        $select = $db->select($table)->from($table)
            ->joinLeft('Usuario_Curso', 'Usuarios.ID_ID_USU = Usuario_Curso.ID_USU_UC')
                ->joinLeft('Cursos','Usuario_Curso.ID_CUR_UC = Cursos.ID_ID_CR ')
            ->where('Usuarios.ID_ID_USU = '.$params['ID_ID_USU']);
             
        $query = $select->query();
             
        $cursos = $query->fetchAll();

        return $cursos;        
    }
    
    function getPerguntas($params) {
        $db = $this->_db;
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)
                ->joinLeft('perguntas_cursos', 'perguntas_cursos.ID_USUARIO_USU = usuarios.ID_ID_USU')
            ->where('Usuarios.ID_ID_USU = '.$params['ID_ID_USU']);
        
        $query = $select->query();
        
        $perguntas = $query->fetchAll();
        
        return $perguntas;
    }
    
    function getCursosSlidesDoUsuario($params) {
//        $db = $this->_db;
//        
//        $table = $this->_name;
//        
//        $select = $db->select
//            ->joinLeft('usuario_curso','usuarios.ID_ID_USU = usuario_curso.ID_ID_USU')
//            ->where('usuarios.ID_ID_USU = '.$params['ID_ID_USU'])
//            ->group('Usuarios.ID_ID_USU');
    }
}
