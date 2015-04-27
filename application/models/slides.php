<?php

class Models_Slides extends Zend_Db_Table_Abstract {
    
    protected $_name = 'Slides';
 
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_CURSO_CR'   =>   $params['ID_CURSO_CR'],
            'NM_SLIDE_SLI'  =>   $params['NM_SLIDE_SLI'],
            'ST_SLIDE_SLI'  =>   $params['ST_SLIDE_SLI'],
            'ST_DESCR_SLI' => $params['ST_DESCR_SLI'],
            'ST_TITULO_SLI' => $params['ST_TITULO_SLI'],
            'ST_RESPOSTAS_SLI' => $params['ST_RESPOSTAS_SLI']
        );
        $db->insert($this->_name, $info);   
    }
    
    function update($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_CURSO_CR'   =>   $params['ID_CURSO_CR'],
            'NM_SLIDE_SLI'  =>   $params['NM_SLIDE_SLI'],
            'ST_SLIDE_SLI'  =>   $params['ST_SLIDE_SLI'],
            'ST_DESCR_SLI' => $params['ST_DESCR_SLI'],
            'ST_TITULO_SLI' => $params['ST_TITULO_SLI'],
            'ST_RESPOSTAS_SLI' => $params['ST_RESPOSTAS_SLI']
        );
        
        $db->update($this->_name, $info, 'ID_SLIDE_SLI = '.$params['ID_SLIDE_SLI']);
    }

    function saveRespostas($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_RESPOSTAS_USC' => $params['ST_RESPOSTAS_USC'],
            'ID_USUARIO_USC' => $params['ID_USUARIO_USC'],
            'ID_SLIDE_USC' => $params['ID_SLIDE_USC'],
            'ID_CURSO_USC' => $params['ID_CURSO_USC']
        );
        
        $db->delete('usuarios_slides_cursos', 'ID_USUARIO_USC = '.$params['ID_USUARIO_USC'].' AND ID_SLIDE_USC = '.$params['ID_SLIDE_USC'].' AND ID_CURSO_USC = '.$params['ID_CURSO_USC']);
        $db->insert('usuarios_slides_cursos', $info);

    }
    
    function obterRespostas($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = 'usuarios_slides_cursos';
        
        $select = $db->select($table)->from($table)
                ->where('ID_SLIDE_USC = ?', $params['slide'])
                ->where('ID_CURSO_USC = ?', $params['curso'])
                ->where('ID_USUARIO_USC = ?', $params['usuario']);
        
        $query = $select->query();
        
        $resposta = $query->fetchAll();
        
        return $resposta;
    }
    
    
    function slide($id) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)->where('ID_SLIDE_SLI = ?', $id);
        
        $query = $select->query();
        
        $curso = $query->fetchAll();
        
        return $curso;
    }
    
    function slides() {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table);
  
        $query = $select->query();
                
        $slides = $query->fetchAll();
        
        return $slides;         
    }
    
    function slidesByCurso($idCurso) {
        $db = Zend_Db_Table::getDefaultAdapter();

        $table = $this->_name;

        $select = $db->select($table)->from($table)->where('ID_CURSO_CR = ?', $idCurso);
  
        $query = $select->query();
                
        $slides = $query->fetchAll();
        
        return $slides;        
    }
    
    function slide_com_respostas($idCurso, $numSlide, $usuario) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)
            ->joinLeft('Cursos', 'Slides.ID_CURSO_CR = Cursos.ID_ID_CR') 
            ->joinLeft('usuarios_slides_cursos','slides.ID_CURSO_CR = usuarios_slides_cursos.ID_CURSO_USC AND slides.ID_SLIDE_SLI = usuarios_slides_cursos.ID_SLIDE_USC',array('ST_RESPOSTAS_USC'))
            ->where('NM_SLIDE_SLI = '.$numSlide.' AND ID_CURSO_CR = '.$idCurso )
                ->where('ID_USUARIO_USC = ?',$usuario);
        
        $query = $select->query();
        
        $slide = $query->fetchAll();
        
        return $slide;        
    }
    
    function specificSlide($idCurso, $numSlide) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $table = $this->_name;
        
        $select = $db->select($table)->from($table)
            ->joinLeft('Cursos', 'Slides.ID_CURSO_CR = Cursos.ID_ID_CR') 
            ->where('NM_SLIDE_SLI = '.$numSlide.' AND ID_CURSO_CR = '.$idCurso );

        $query = $select->query();
        
        $slide = $query->fetchAll();
        
        return $slide;
    }
    
    function updateUtimaLida($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'NM_UTIMAVIU_UC' => $params['NM_UTIMAVIU_UC']
        );
        
        $db->update('usuario_curso',$info,'ID_USU_UC = '.$params['ID_USU_UC'].' AND ID_CUR_UC = '.$params['ID_CUR_UC']);
    }
    
    function getTotalSlides($curso) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $select = $db->select($this->_name)->from($this->_name, array('quantidade' => 'count(*)'))
                ->where('ID_CURSO_CR = ?', $curso);
        
        return $select->query()->fetch();
    }
}