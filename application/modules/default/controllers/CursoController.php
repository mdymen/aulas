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
    

    
    public function comprarAction() {
       
        
    }
    
    public function editarAction() {}
    
    public function vercursojsonAction() {
        $params = $this->_request->getParams();
            
        $slides = new Models_Slides();
        
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read()); 
        
        $slide = $slides->specificSlide($params['curso'], $params['slide']);
        
        $slides->updateUtimaLida(array('ID_USU_UC' => $data['ID_ID_USU'],'ID_CUR_UC' => $params['curso'],'NM_UTIMAVIU_UC' => $params['slide']));
       
        $respostas = $this->_obterrespostas(array('curso' => $params['curso'],'slide' => $params['slide']));
        $respostas = !empty($respostas) ? $respostas : '';
        
         $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $slide['ST_RESPOSTAS_USC'] = $respostas;
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
    
    private function _tieneExercicios($slide) {
        return !empty($slide['ST_RESPOSTAS_SLI']) ? true : false; 
    }
    
    public function vercursoAction() {
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());  

        $params = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $usuario_curso = (array('ID_USU_UC' => $data['ID_ID_USU'] ,'ID_CUR_UC' => $params['curso'], 'NM_UTIMAVIU_UC' => 1));
        $numslide = $cursos->estaMatriculado($usuario_curso);

        $slides = new Models_Slides();
        $slide = $slides->specificSlide($params['curso'], $numslide);

        $this->view->respostas = '';
        if ($this->_tieneExercicios($slide[0])) {
            $respostas = $this->_obterrespostas(array('curso' => $params['curso'],'slide' => $numslide));
            $this->view->respostas = 0;
            if (!empty($respostas)) {
                $this->view->respostas = $respostas[0]['ST_RESPOSTAS_USC'];
            }
        }
         
        $an = new Models_Anotacoes();
        $anotacoes = $an->anotacoes($params['curso'],1);
        
        $pergunta = new Models_Perguntas();
        $perguntas = $pergunta->perguntas($params['curso'],1);

        $quantidade_slides = $slides->getTotalSlides($params['curso']);
        
        $this->view->slide = $slide; 
        $this->view->anotacoes = $anotacoes;
        $this->view->perguntas = $perguntas;
        $this->view->idcurso = $this->_request->getParam('curso');
        $this->view->idslide = $this->_request->getParam('slide');
        $this->view->idusuario = $data['ID_ID_USU'];
        $this->view->quantidade_slides = $quantidade_slides['quantidade'];
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
    
//        $params['slide'];
//        $params['curso'];
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

