<?php

include APPLICATION_PATH.'/models/cursos.php';
include APPLICATION_PATH.'/models/slides.php';
include APPLICATION_PATH.'/models/anotacoes.php';
include APPLICATION_PATH.'/models/perguntas.php';

class CursoController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $cursos = new Models_Cursos();
        $this->view->cursos = $cursos->cursos();
    }

    public function adicionarAction() {

        
    }
    
    public function cursosAction() {
        
        $cursos = new Models_Cursos();
        $this->view->cursos = $cursos->cursos();        
    }
    
    public function cursoAction() {
       
        $params = $this->_request->getParams();
        
        $model = new Models_Cursos();
        
        $curso = $model->curso($params['curso']);
              
        $this->view->curso = $curso;

        $slides =  new Models_Slides();
        $this->view->slides = $slides->slidesByCurso($params['curso']);
        
    }
    
    public function addcursoAction() {
        
        require_once APPLICATION_PATH.'/forms/curso/adicionar.php';
       
        $params = $this->_request->getParams();
        
        $form = new Forms_Curso_Adicionar();

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                
                // success - do something with the uploaded file
                $uploadedData = $form->getValues();
                 
            }
        }
        
        $course = new Models_Cursos();

        $course->save($uploadedData);
        
        $this->redirect('curso/index');
             
    }
    
    public function comprarAction() {
       
        
    }
    
    public function editarAction() {}
    
    public function vercursojsonAction() {
        $params = $this->_request->getParams();
            
        $slides = new Models_Slides();
        $slide = $slides->specificSlide($params['curso'], $params['slide']);
        
         $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($slide);    
    }
    
    public function gravaranotacoesAction() {
        $params = $this->_request->getParams();
                
        $fecha = date('d-m-Y H:i');
        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'd-m-Y H:i' , $nuevafecha );
        
        $params['DT_DATETIME_ANO'] = $nuevafecha;
        
        $anotacoes = new Models_Anotacoes();        
        
        $anotacoes->delete($params['ID_CURSO_CR'], $params['ID_USUARIO_USU']);
        
        $anotacoes->save($params);
        
         $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($nuevafecha);
    }
    
    public function vercursoAction() {
        $params = $this->_request->getParams();
     
        $slides = new Models_Slides();
        $slide = $slides->specificSlide($params['curso'], $params['slide']);
        
        $an = new Models_Anotacoes();
        $anotacoes = $an->anotacoes($params['curso'],1);
        
        $pergunta = new Models_Perguntas();
        $perguntas = $pergunta->perguntas($params['curso'],1);

        $this->view->slide = $slide; 
        $this->view->anotacoes = $anotacoes;
        $this->view->perguntas = $perguntas;
    }
    
    public function fichaAction() {
        $params = $this->_request->getParams();
        
        $curso = new Models_Cursos();
        $result = $curso->curso($params['curso']);
        
        $this->view->curso = $result;
    }
    
    public function respostasAction() {
        $params = $this->_request->getParams();
        
        $slides = new Models_Slides();
        $slide = $slides->specificSlide($params['curso'], $params['slide']);  

         $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $result['verdadeiras'] = $slide;
        $result['respostas'] = $this->_obterrespostas($params);
        
        $this->_helper->json($result);
        
    }
    
    private function _obterrespostas($params) {
        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        $dados = get_object_vars($data);
        
        $params['usuario'] = $dados['ID_ID_USU'];
     
        $slide = new Models_Slides();
        $result = $slide->obterRespostas($params);
        
        return $result;
    }
    
    public function enviarrespostasAction() {
        $params = $this->_request->getParams();
        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        $dados = get_object_vars($data);
        
        $params['ID_USUARIO_USC'] = $dados['ID_ID_USU'];
        
        $slide = new Models_Slides();
        $slide->saveRespostas($params);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($params);
    }   
    
}

