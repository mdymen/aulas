<?php

include APPLICATION_PATH.'/models/cursos.php';
include APPLICATION_PATH.'/models/slides.php';
include APPLICATION_PATH.'/models/anotacoes.php';
include APPLICATION_PATH.'/models/perguntas.php';

class Admin_PerguntasController extends Zend_Controller_Action
{

    public function init()
    {
         $this->_helper->layout->setLayout('admin');
    }

    public function indexAction()
    {
        $perguntas = new Models_Perguntas();
        $this->view->perguntas = $perguntas->todasPerguntas();
    }
    
    public function respostaAction() { 
        $params = $this->_request->getParams();
        
        $fecha = date('d-m-Y H:i');
        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'd-m-Y H:i' , $nuevafecha );
        
        $params['DT_UTIMOMOV_PER'] = $nuevafecha;
        $perguntas = new Models_Perguntas();
        $perguntas->responder($params);
        
        $this->redirect('/admin/perguntas');
    }

}

