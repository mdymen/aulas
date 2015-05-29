<?php

class Models_Cursos extends Zend_Db_Table_Abstract {
    protected $_name = 'Cursos';
 
    function atualizarSlide($params) {
        $db = Zend_Db_Table::getDefaultAdapter();

        $info = array
        (
            'ST_NOME_CR'   =>   $params['ST_NOME_CR'],
            'VL_CUSTO_CR'  =>   $params['VL_CUSTO_CR'],
            'ST_MINIDESCR_CR' => $params['ST_MINIDESCR_CR'],
            'ST_SUBTITULO_CR' => $params['ST_SUBTITULO_CR'],
        );
        
        if (!empty($params['ST_IDENT_CR'])) {
            $info['ST_IDENT_CR'] = $params['ST_IDENT_CR'];
        }
        if(!empty($params['ST_IMAGEM_CR'])) {
            $info['ST_IMAGEM_CR'] = $params['ST_IMAGEM_CR'];
        }
        
        $result = $db->update($this->_name, $info, 'ID_ID_CR = '.$params['ID_ID_CR']);
        
        $db->closeConnection();
        
        return $result;
    }
    
    function atualizarslidecomp($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_OBJETIVO_CR' => $params['ST_OBJETIVO_CR'],
            'ST_DESCR_CR' => $params['ST_DESCR_CR'],
            'ST_CONTEUDO_CR' => $params['ST_CONTEUDO_CR'],
            'ST_CARACT_CR' => $params['ST_CARACT_CR']
        );
        
        return $db->update($this->_name, $info, 'ID_ID_CR ='.$params['curso']);
    }
    
    function compras($curso) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $result = $db->select()->from('compras', array('Qant'=>'COUNT(*)', 'MONTH(DT_DATA_COM) as Mes'))
                ->where('ID_CURSO_COM = ?', $curso)
                ->group('MONTH(DT_DATA_COM)')
                ->query()
                ->fetchAll();
        
        $db->closeConnection();
        
        return $result;
    }
    
    function ventas($curso) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        return $db->select()->from('compras')
                ->joinInner('usuarios', 'compras.ID_USUARIO_COM = usuarios.ID_ID_USU', array('ST_USUARIO_USU'))
                ->where('ID_CURSO_COM = ?',$curso)
                ->query()
                ->fetchAll();
    }
    
    function comprar($usuario,$curso,$valor) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $credito = $usuario['NM_CREDITO_USU'] - $valor;
        
        $db->beginTransaction();
        try {
            
            $db->update('usuarios',array('NM_CREDITO_USU' => $credito ),'ID_ID_USU = '.$usuario['ID_ID_USU'] );
            $db->insert('usuario_curso', array(
                'ID_USU_UC' => $usuario['ID_ID_USU'],
                'ID_CUR_UC' => $curso,
                'NM_UTIMAVIU_UC' => 0,
                'NM_ACERTOS_UC' => 0,
                'NM_TOTALEXERC_UC' => 0
            ));
            $info = array(
                'ID_USUARIO_COM' => $usuario['ID_ID_USU'],
                'ID_CURSO_COM' => $curso,
                'DT_DATA_COM' => Bobby_Data::Agora(),
                'VL_PRECO_COM' => $valor,
            );
            
            $db->insert('compras',$info);
            
            $db->commit();
            
        } catch (Exception $ex) {
            $db->rollBack();   
            return false;
        }

        $db->closeConnection();
        return true;
    }
    
    function setVisibilidade($params) {
        $db = Zend_Db_Table::getDefaultAdapter();        
        $db->update($this->_name, array('FL_DISPONIVEL_CR' => $params['visibilidade']), 'ID_ID_CR = '.$params['id']);
    }
    
    function excluir($params) {
        $db = Zend_Db_Table::getDefaultAdapter();        
        $db->update($this->_name, array('FL_EXCLUIDO_CR' => 1), 'ID_ID_CR = '.$params['ID_ID_CR']);
    }
    
    function cursosByUser($usuario) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $select = $db->select()->from($this->_name)->where('ST_AUTOR_CR = ?', $usuario)
                ->where('FL_EXCLUIDO_CR <> 1');
        return $select->query()->fetchAll();
    }
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        if (empty($params['ST_AUTOR_CR'])) { $params['ST_AUTOR_CR'] = ''; }
        if (empty($params['FL_TIPO_CR'])) { $params['FL_TIPO_CR'] = 0; }
            
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
            'ST_MINIDESCR_CR' => $params['ST_MINIDESCR_CR'],
            'ST_SUBTITULO_CR' => $params['ST_SUBTITULO_CR'],
            'ST_AUTOR_CR' => $params['ST_AUTOR_CR'],
            'FL_TIPO_CR' => $params['FL_TIPO_CR']
            
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

        $select = $db->select($table)->from($table)->where('FL_DISPONIVEL_CR = 1');
  
        $query = $select->query();
                
        $cursos = $query->fetchAll();
        
        return $cursos;         
    }
    
    function countSlides() {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($this->_name)
                ->join('Slides', 'Cursos.ID_ID_CR = Slides.ID_CURSO_CR',array('Quantidade'=> 'count(*)'))
                ->group('Cursos.ID_ID_CR');
  
        $query = $select->query();
                
        $cursos = $query->fetchAll();
        
        return $cursos;           
    }
    
    function cantCursos() {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $select = $db->select($this->_name)->from($this->_name, array('cursos' => 'COUNT(*)'));
        $resultado = $select->query();
        
        return $resultado->fetchAll();
        
    }
    
    //retorna o slide atual
    function estaMatriculado($params) {
        $db = Zend_Db_Table::getDefaultAdapter();

        $select = $db->select()->from('usuario_curso')
                ->where('ID_USU_UC = ?', $params['ID_USU_UC'])
                ->where('ID_CUR_UC = ?', $params['ID_CUR_UC']);
        $result = $select->query();
        $res = $result->fetchAll();
        
        if (count($res) == 0) {
            $db->insert('usuario_curso', $params);
            return array('NM_UTIMAVIU_UC' => 1);
        } else {
            $select = $db->select()->from('usuario_curso')
                    ->where('ID_USU_UC = ?', $params['ID_USU_UC'])
                    ->where('ID_CUR_UC = ?', $params['ID_CUR_UC' ]);
            $result = $select->query();
            $res = $result->fetch();
            return $res;
        }
    }
    
    public function update($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_IDENT_CR' => $params['ST_IDENT_CR'],
            'ST_NOME_CR' => $params['ST_NOME_CR'],
            'ST_DESCR_CR' => $params['ST_DESCR_CR'],
            'VL_CUSTO_CR' => $params['VL_CUSTO_CR'],
            'ST_CONTEUDO_CR' => $params['ST_CONTEUDO_CR'],
            'ST_OBJETIVO_CR' => $params['ST_OBJETIVO_CR'],
            'ST_CARACT_CR' => $params['ST_CARACT_CR'],
            'ST_MINIDESCR_CR' => $params['ST_MINIDESCR_CR'],
            'ST_SUBTITULO_CR' => $params['ST_SUBTITULO_CR']
        );
        
        $db->update($this->_name, $info, 'ID_ID_CR = '.$params['ID_ID_CR']);
        
    }

    function usuario_curso($curso, $usuario) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $select = $db->select()->from('usuario_curso')
                ->where('ID_USU_UC = ?',$usuario)
                ->where('ID_CUR_UC = ?', $curso);
        
        $query = $select->query();
        
        $db->closeConnection();
        
        return $query->fetch();
    }
    
    function usuario_cursos_update($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
 
        $db->update('usuario_curso', $params, 'ID_USU_UC = '.$params['ID_USU_UC'].' AND ID_CUR_UC = '.$params['ID_CUR_UC']);
    }
}
