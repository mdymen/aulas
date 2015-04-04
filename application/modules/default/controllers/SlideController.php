<?php

include APPLICATION_PATH.'/models/slides.php';
include APPLICATION_PATH.'/models/cursos.php';

class SlideController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $cursos = new Models_Cursos();
        $this->view->cursos = $cursos->cursos();
    }

    public function adicionarAction() {

        
    }
    
    public function comprarAction() {
       
        
    }
    
    public function addslideAction() {
        $params = $this->_request->getParams();
        
        $slide = new Models_Slides();
        $slide->save($params);
        
        $this->redirect('slide/index'); 
    }
    
    public function editslideAction() {
        $params = $this->_request->getParams();
        
        $slide = new Models_Slides();
        $slide->update($params);
        
        
    }
    
    public function slideAction() {
        $params = $this->_request->getParams();
        
        $slide = new Models_Slides();
        
        $slide = $slide->slide($params['slide']);

        $this->view->slide = $slide;
    }
}

