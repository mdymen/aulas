<?php


class  Models_Usuarios extends Zend_Db_Table {
    
    protected $_name = 'Usuarios';
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function atualizarDados($email, $senha, $usuario) {
        $db = $this->_db;
        
        $result = $db->update($this->_name, array('ST_EMAIL_USU' => $email, 'ST_SENHA_USU' => $senha), 'ID_ID_USU = '.$usuario);
        
        $db->closeConnection();
        
        return $result;
    }
    
    function updateFace($params) {
        $db = $this->_db;
        
        $result = $db->update($this->_name, array('ST_EMAIL_USU' => $params['email']), 'ID_FACEBOOK_USU = "'.$params['id'].'"');
        
        $db->closeConnection();
        
        return $result;       
    }
    
    function checkIdFacebook($id) {
        $db = $this->_db;
        
        $result = $db->select()->from($this->_name)
                ->where('ID_FACEBOOK_USU = ?', $id)
                ->query()
                ->fetch();
        
        $db->closeConnection();
        
        return $result;
    }

    function checkEmailFacebook($email) {
        $db = $this->_db;
        
        $result = $db->select()->from($this->_name)
                ->where('ST_EMAIL_USU = ?', $email)
                ->query()
                ->fetch();

        $db->closeConnection();
        
        return $result;
    }    
    
    function save_face_parcial($params) {
        $db = $this->_db;
        
        $info = array(
            'ID_FACEBOOK_USU' => $params['id'],
            'ST_USUARIO_USU' => $params['name'],
            'ST_SENHA_USU' => md5($params['id']),
        );
                
        try {        
            $result = $db->insert($this->_name, $info);
        }
        catch (Exception $e) {
            return '';
        }
        
        $db->closeConnection();
        
        return $result;            
    }
    
    function save_email_face($params) {
        $db = $this->_db;
        
        $info = array(
            'ST_EMAIL_USU' => $params['email'],
            'ID_FACEBOOK_USU' => $params['id'],
            'ST_USUARIO_USU' => $params['id'],
            'ST_SENHA_USU' => md5($params['id'])
        );
                
        try {        
            $result = $db->insert($this->_name, $info);
        }
        catch (Exception $e) {
            return '';
        }
        
        $db->closeConnection();
        
        return $result;    
    }
    
    function getComprasCredito($usuario, $data_inicio, $data_fim) {
        $db = $this->_db;
        
        $result = $db->select()->from('credito_pendentes')
                ->where('ID_USUARIO = ?', $usuario['ID_ID_USU'])
                ->where('DT_DATA_CREDITO_PEN >= ?', $data_inicio)
                ->where('DT_DATA_CREDITO_PEN <= ?', $data_fim)
                ->where('FL_PENDENTE = 0')
                ->query()
                ->fetchAll();
        
        $db->closeConnection();
        return $result;
    
    }

    function gravarconta($params) {
        $db = $this->_db;
        
        $info = array(
            'ID_ID_USU' => $params['ID_ID_USU'],
            'ST_NOME_USU' => $params['ST_NOME_USU'],
            'ST_CPF_USU' => $params['ST_CPF_USU'],
            'ST_BANCO_USU' => $params['ST_BANCO_USU'],
            'ST_AGENCIA_USU' => $params['ST_AGENCIA_USU'],
            'ST_CONTA_USU' => $params['ST_CONTA_USU']
            );
        
        $result = $db->update('usuario_dados',$info,'ID_ID_USU = '.$params['ID_ID_USU']);
        
        if (!$result) {
            $result = $db->insert('usuario_dados', $info);
        }
                
        $db->closeConnection();
        
        return $result;
    }
    
    function getUsuarioConta($usuario) {
        $db = $this->_db;
        
        $result = $db->select()->from('usuario_dados')
                ->where('ID_ID_USU = ?',$usuario['ID_ID_USU'])
                ->query()
                ->fetch();
        
        $db->closeConnection();
        
        return $result;
    }
    
    function getCompras($usuario, $data_inicio, $data_fim) {
        $db = $this->_db;
        
        $result = $db->select()->from('compras')
                ->joinInner('cursos', 'cursos.ID_ID_CR = compras.ID_CURSO_COM', array('ST_NOME_CR'))
                ->where('ID_USUARIO_COM = ?', $usuario['ID_ID_USU'])
                ->where('DT_DATA_COM >="'. $data_inicio.'"')
                ->where('DT_DATA_COM <="'.$data_fim.'"')
                ->query()
                ->fetchAll();
        
        $db->closeConnection();
        
        return $result;
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
    
    function getCursosSlides($usuario) { 
        $db = $this->_db;
        
        $result = $db->select()->from('cursos')
                ->joinInner('usuario_curso', 'usuario_curso.ID_CUR_UC = cursos.ID_ID_CR')
                ->where('usuario_curso.ID_USU_UC = ?',$usuario['ID_ID_USU'])
                ->where('FL_TIPO_CR = 1')
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
