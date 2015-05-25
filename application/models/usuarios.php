<?php


class  Models_Usuarios extends Zend_Db_Table {
    
    protected $_name = 'Usuarios';
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function usuarios_curso($curso) {
        $db = $this->_db;
        
        $result = $db->select()->from('usuario_curso')
                ->joinInner('usuarios','usuario_curso.ID_USU_UC = usuarios.ID_ID_USU', array('ST_USUARIO_USU'))
                ->where('ID_CUR_UC = ?', $curso)
                ->query()
                ->fetchAll();
        
        $db->closeConnection();
        return $result;
    }
    
    function quantidade() {
        $db = $this->_db;
        
        $select = $db->select()->from($this->_name, array('count' => 'count(*)'));

        return $select->query()->fetch();
                
    }
    
    function dashboard($params) {
        
        $select = $this->_db->select()->from($this->_name, array('perguntas' => 'COUNT(perguntas_cursos.ID_PERGUNTA_PER)','perguntas_cursos.ID_USUARIO_USU'))
                ->join('perguntas_cursos','perguntas_cursos.ID_USUARIO_USU = usuarios.ID_ID_USU','')
                ->where('usuarios.ID_ID_USU = ?',$params['ID_ID_USU'])
                ->group('perguntas_cursos.ID_USUARIO_USU');
        
        $perguntas = $select->query();
        
        return $perguntas->fetchAll();
    }
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ST_USUARIO_USU' =>   $params['ST_USUARIO_USU'],
            'ST_SENHA_USU'   =>   $params['ST_SENHA_USU'],
            'ST_EMAIL_USU' => $params['ST_EMAIL_USU'],
            'ST_CONFIRMADO_USU' => $params['ST_CONFIRMADO_USU']
        );
        
        $db->insert($this->_name, $info);  
    }
    
    function update($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_SENHA_USU' => $params['ST_SENHA_USU'],
            'ST_EMAIL_USU' => $params['ST_EMAIL_USU']
        );
        
        $db->update($this->_name, $info,'ID_ID_USU = '.$params['ID_ID_USU']);
        
        $usuario = $db->select($this->_name)->from($this->_name)->where('ID_ID_USU = ?',$params['ID_ID_USU']);
        $result = $usuario->query();
        return $result->fetchAll();
    }
    
    function getIdCursosDoUsuario($usuario) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $select = $db->select()->from('usuario_curso')
                ->where('ID_USU_UC = ?',$usuario);
        
        $result =  $select->query()->fetchAll();
      
        $db->closeConnection();
        
        return $result;
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
                ->joinInner('perguntas_cursos', 'perguntas_cursos.ID_USUARIO_USU = usuarios.ID_ID_USU')
            ->where('Usuarios.ID_ID_USU = '.$params['ID_ID_USU']);
        
        $query = $select->query();
        
        $perguntas = $query->fetchAll();
        
        return $perguntas;
    }
    
    function getCursosSlidesDoUsuario($params) {
        $db = $this->_db;
        
        $table = $this->_name;
        
        $select = $db->select()->from($table, array('cantidades' => 'count(*)', 'slides.ID_CURSO_CR', 'cursos.ST_IMAGEM_CR','cursos.ST_NOME_CR','cursos.ST_DESCR_CR'))
            ->joinInner('usuario_curso','usuarios.ID_ID_USU = usuario_curso.ID_USU_UC', array('NM_UTIMAVIU_UC'))
                ->joinInner('slides', 'usuario_curso.ID_CUR_UC = slides.ID_CURSO_CR', array())
                ->joinInner('cursos', 'slides.ID_CURSO_CR = ID_ID_CR', array())
            ->where('usuarios.ID_ID_USU = '.$params['ID_ID_USU'])
            ->group('cursos.ID_ID_CR');
        
        $query = $select->query();
        
        $cantidade = $query->fetchAll();
  
        return $cantidade;        
        
    }
    
    function confirmar($params) {
        $db = $this->_db;
        
        $select = $db->select()->from($this->_name)
                ->where('ST_CONFIRMADO_USU = ?', $params['conf']);
        $query = $select->query();
        $result = $query->fetch();
        
        if (is_array($result)) {
            $db->update($this->_name, array('ST_CONFIRMADO_USU' => ''), 'ST_USUARIO_USU = "'.$result['ST_USUARIO_USU'].'"');           
            return $result;
        }
        return false;
    }
    
    function trocarSenhaEsquecida($params) {
        $db = $this->_db;

        $select = $db->select()->from($this->_name)->where('ST_SENHA_USU = "'.$params['esqueceu'].'"');
        $usuario = $select->query()->fetch();

        $result = $db->update($this->_name, array('ST_SENHA_USU' => $params['nova']), 'ST_SENHA_USU = "'.$params['esqueceu'].'"');
        
        if ($result) {
            return array('ST_USUARIO_USU' => $usuario['ST_USUARIO_USU'], 'ST_SENHA_USU' => $params['nova']);
        }
        
        return false;
    }
    
    function getUserByEmail($email) {
        $db = $this->_db;
        
        $query = $db->select()->from($this->_name)->where('ST_EMAIL_USU = ?',$email);
        
        return $query->query()->fetch();
    }
    
    function getUserByUser($user) {
        $db = $this->_db;
        
        $query = $db->select()->from($this->_name)->where('ST_USUARIO_USU = ?',$user);
        
        return $query->query()->fetch();        
    }
    
    function mudarSenhaMd5($md5, $email) {
        $db = $this->_db;
        
        $db->update($this->_name,array('ST_SENHA_USU' => $md5), 'ST_EMAIL_USU = "'.$email.'"');
    }
    
    public function getAll($id = ''){
        
        $db = $this->_db;
        $where = 1;
        if($id){
            $where = $db->quoteInto('ID_ID_USU = (?)', $id);
        }
        
        
      $dados = $db->select()
                ->from(array('usu'=>$this->_name))   
                ->joinLeft(array('cred'=>'creditos'), 'cred.ID_USUARIO = usu.ID_ID_USU')
                ->where($where)
                ->query()
                ->fetchAll();   
        return $dados; 
    }
}
