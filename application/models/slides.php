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
}
