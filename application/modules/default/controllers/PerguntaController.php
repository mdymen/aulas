<?php

include APPLICATION_PATH.'/models/perguntas.php';

class PerguntaController extends Zend_Controller_Action {
    
    function indexAction() {
        $pergunta = new Models_Perguntas();
        $perguntas = $pergunta->todasPerguntas();

        $this->view->perguntas = $perguntas;
    }
    
    function perguntaAction() {
        $params = $this->_request->getParams();
        
        $perguntas = new Models_Perguntas();
        $pergunta = $perguntas->pergunta($params['pergunta']);
        
        $this->view->pergunta = $pergunta;
    }
    
    public function adicionarperguntaAction() {
        $params = $this->_request->getParams();
        $pergunta = new Models_Perguntas();
        
        $fecha = date('Y-m-d H:i');
        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d H:i' , $nuevafecha );
        
        $params['DT_UTIMOMOV_PER'] = $nuevafecha;
        $pergunta->save($params);
        
        $this->redirect('/curso/vercurso?slide=1&curso='.$params['ID_CURSO_CR']);
    }
    
    function deleteAction() {}
    
    function respostaAction() {
        $params = $this->_request->getParams();
        
        $fecha = date('Y-m-d H:i');
        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d H:i' , $nuevafecha );
        
        $params['DT_UTIMOMOV_PER'] = $nuevafecha;
        
        $pergunta = new Models_Perguntas();
        $pergunta->responder($params);
        
        
        
        $this->redirect('pergunta/index');
    }
    

    
}
