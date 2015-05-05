<?php

include APPLICATION_PATH.'/models/cursos.php';
include APPLICATION_PATH.'/models/slides.php';
include APPLICATION_PATH.'/models/anotacoes.php';
include APPLICATION_PATH.'/models/perguntas.php';

class Admin_CursoController extends Zend_Controller_Action
{

    public function init()
    {
         $this->_helper->layout->setLayout('admin');
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
        $this->view->arquivos = scandir(APPLICATION_PATH."/../public/recursos/");
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
        
        $this->redirect('admin/curso/index');
             
    }
    
    public function comprarAction() {
       
        
    }
    
    public function editarAction() {
        $params = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $cursos->update($params);
        
        $this->redirect('/admin/curso');
    
    }
    
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
    
        public function uploadfilesAction() {
        
        $params = $this->_request->getParams();
        
    
$uploaddir = APPLICATION_PATH."/../public/recursos/";

// The posted data, for reference
$file = $_POST['value'];
$name = $_POST['name'];

// Get the mime
$getMime = explode('.', $name);
$mime = end($getMime);

// Separate out the data
$data = explode(',', $file);

// Encode it correctly
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

// You can use the name given, or create a random name.
// We will create a random name!

$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;


if (is_file($uploaddir.$params['curso'].'-'.$name)) {
    $ok = false;
} else {
    $ok = true;
}

if(file_put_contents($uploaddir.$params['curso'].'-'.$name, $decodedData)) {
	$params =  $randomName.":uploaded successfully";
}
else {
	// Show an error message should something go wrong.
	$params = "Something went wrong. Check that the file isn't corrupted";
}        
//        require_once APPLICATION_PATH.'/forms/curso/recursos.php';
//       
//        $params = $this->_request->getParams();
//
//        $form = new Forms_Curso_Recursos();
//
//        if ($this->_request->isPost()) {
//            $formData = $this->_request->getPost();
//            
//            if ($form->isValid($formData)) {
//                
//                // success - do something with the uploaded file
//                $uploadedData = $form->getValues();
//                 
//            }
//        }
        
                 $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($ok);  
    }
}

