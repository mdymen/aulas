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
            'ST_MINIDESCR_CR' => $params['ST_MINIDESCR_CR'],
            'ST_SUBTITULO_CR' => $params['ST_SUBTITULO_CR']
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
