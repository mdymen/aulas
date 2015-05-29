<?php

include APPLICATION_PATH.'/models/cursos.php';
include APPLICATION_PATH.'/models/slides.php';
include_once APPLICATION_PATH.'/models/anotacoes.php';
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
    
    public function cursosjsonAction() {
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $cursos = new Models_Cursos();
        
        $this->_helper->json($cursos->cursos());     
    }
    
    public function cursoAction() {
       
        $params = $this->_request->getParams();
        
        $model = new Models_Cursos();
        
        $curso = $model->curso($params['curso']);
              
        $this->view->curso = $curso;

        $slides =  new Models_Slides();
        $this->view->slides = $slides->slidesByCurso($params['curso']);
        
    }
    
    public function editarAction() {
        require_once APPLICATION_PATH.'/forms/curso/editarslides.php';

        $params = $this->_request->getParams();

        $form = new Forms_Curso_EditarSlides();

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            
            if ($form->isValid($formData)) {
                
                // success - do something with the uploaded file
                $uploadedData = $form->getValues();
                 
            }
        }
        
        $course = new Models_Cursos();
        $course->atualizarSlide($uploadedData);
        
        $this->redirect('curso/cursoslideedit?curso='.$params['ID_ID_CR']);
    }
    
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
    
    public function vercursoslideAction() {
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());  

        $params = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $usuario_curso = (array('ID_USU_UC' => $data['ID_ID_USU'] ,'ID_CUR_UC' => $params['curso'], 'NM_UTIMAVIU_UC' => 1));
        $usuario_curso_retorno = $cursos->estaMatriculado($usuario_curso);

        $an = new Models_Anotacoes();
        $anotacoes = $an->anotacoes($params['curso'],1);
        
        $pergunta = new Models_Perguntas();
        $perguntas = $pergunta->perguntas($params['curso'],1);

        $this->view->anotacoes = $anotacoes;
        $this->view->perguntas = $perguntas;
        $this->view->idcurso = $this->_request->getParam('curso');
        $this->view->idslide = $this->_request->getParam('slide');
        $this->view->idusuario = $data['ID_ID_USU'];
        $this->view->usuario_curso = $usuario_curso_retorno;
        $this->view->curso = $cursos->curso($this->_request->getParam('curso'));
    }
    
    public function vercursoAction() {
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());  

        $params = $this->_request->getParams();
        
        if ($params['tipo'] == 1 ) {
            $this->redirect('curso/vercursoslide?curso='.$params['curso']);
        }
        
        $cursos = new Models_Cursos();
        $usuario_curso = (array('ID_USU_UC' => $data['ID_ID_USU'] ,'ID_CUR_UC' => $params['curso'], 'NM_UTIMAVIU_UC' => 1));
        $usuario_curso_retorno = $cursos->estaMatriculado($usuario_curso);

        $slides = new Models_Slides();
        $slide = $slides->specificSlide($params['curso'], $usuario_curso_retorno['NM_UTIMAVIU_UC']);

        $this->view->respostas = '';
        if ($this->_tieneExercicios($slide[0])) {
            $respostas = $this->_obterrespostas(array('curso' => $params['curso'],'slide' => $usuario_curso_retorno['NM_UTIMAVIU_UC']));
            $this->view->respostas = '';
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
        $this->view->usuario_curso = $usuario_curso_retorno;
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
    
    private function _calcularNuevosResultados($params) {
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        $dados = get_object_vars($data);        
        
        $slides = new Models_Slides();
        $slide = $slides->slideByNumber($params['ID_SLIDE_USC'], $params['ID_CURSO_USC']);
        
        $respostas_corretas = $slide['ST_RESPOSTAS_SLI'];
        
        $respostas_corretas_object = json_decode($respostas_corretas,true);
        $respostas_object = json_decode($params['ST_RESPOSTAS_USC'], true);
        
        $corretas = 0;
        $totales = 0;
        foreach ($respostas_object as $pergunta => $resposta) {
            if ($respostas_corretas_object[$pergunta] == $resposta) {
                $corretas++;
            }
            $totales++;
        }
        
        $cursos = new Models_Cursos();
        $curso = $cursos->usuario_curso($params['ID_CURSO_USC'], $dados['ID_ID_USU']);
        
        $curso['NM_ACERTOS_UC'] = $curso['NM_ACERTOS_UC'] + $corretas;
        $curso['NM_TOTALEXERC_UC'] = $curso['NM_TOTALEXERC_UC'] + $totales;
        
        $cursos->usuario_cursos_update($curso);
        
        return $curso;
    }
    
    public function tAction() {
        
        $array = array('ST_RESPOSTAS_USC' =>'{"pergunta1":"mine","pergunta2":"his","pergunta3":"yours","pergunta4":"his","pergunta5":"yours"}',
            'ID_SLIDE_USC' => 1,
            'ID_CURSO_USC' => 1
            );
        
                $array['ID_USUARIO_USC'] = 1;
        
        $slide = new Models_Slides();
        $slide->saveRespostas($array);
        
        
        $this->_calcularNuevosResultados($array);
//        $json = '{"Nome":"Martin", "Sobenome" : "Dymenstein"}';
//        
//        $array = json_decode($json,true);
//        
//        foreach ($array as $pergunta => $resposta) {
//            print_r($pergunta." ".$resposta."<br>");
//        }
//        die('.');
        
    }
    
    /*
     * ST_RESPOSTAS_USC: json com as respostas, 
     * ID_SLIDE_USC: id_slide, 
     * ID_CURSO_USC: id_curso 
     */
    public function enviarrespostasAction() {
        $params = $this->_request->getParams();
        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        $dados = get_object_vars($data);
        
        $params['ID_USUARIO_USC'] = $dados['ID_ID_USU'];
        
        $slide = new Models_Slides();
        $slide->saveRespostas($params);
        
        $this->_calcularNuevosResultados($params);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($params);
    }   
    
    
    function novoAction() {
        
    }
    
    function criarAction() {
        require_once APPLICATION_PATH.'/forms/curso/slides.php';
        
        
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read()); 
        
        $params = $this->_request->getParams();
        
        $form = new Forms_Curso_Slides();

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            
            if ($form->isValid($formData)) {
                
                // success - do something with the uploaded file
                $uploadedData = $form->getValues();
                 
            }
        }
        
        $course = new Models_Cursos();

        $uploadedData['ST_AUTOR_CR'] = $data['ST_USUARIO_USU'];
        $uploadedData['FL_TIPO_CR'] = 1;
        $course->save($uploadedData);
        
        $this->redirect('curso/meuscursos');
        
    }
    
    function meuscursosAction() {
        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read()); 
        
        $cursos = new Models_Cursos();
        $this->view->cursos = $cursos->cursosByUser($data['ST_USUARIO_USU']);
    }
    
    function cursoslideeditAction() {
        $param = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $curso = $cursos->curso($param['curso']);
        
        $this->view->curso = $curso;
    }
    
    function excluirslideAction() {
        $params = $this->_request->getParams();
        $cursos = new Models_Cursos();
        $cursos->excluir($params);
        
        $this->redirect('curso/meuscursos');
    }
    
    function mudarvisibilidadeAction() {
        $params = $this->_request->getParams();
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $cursos = new Models_Cursos();
        $cursos->setVisibilidade($params);
    }
    
    function comprarAction() {
        $params = $this->_request->getParams();

        $storage = new Zend_Auth_Storage_Session();
        $data = get_object_vars($storage->read());         
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        if ($data['NM_CREDITO_USU'] >= $params['valor']) {
            $cursos = new Models_Cursos();
            $result = $cursos->comprar($data,$params['curso'],$params['valor']);
            if ($result) {
                $user = Zend_Auth::getInstance()->getIdentity();
                $user->NM_CREDITO_USU = $data['NM_CREDITO_USU'] - $params['valor'];
                Bobby_Sessao::addCurso(array('ID_USU_UC' => $data['ID_ID_USU'],'ID_CUR_UC' => $params['curso']));
            }
            $this->_helper->json(true);
        } else {
            $this->_helper->json(false);    
        }      
    }
    
    function atualizarslidecompAction() {
        $params = $this->_request->getParams();
        $cursos = new Models_Cursos();
        $result = $cursos->atualizarslidecomp($params);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($params); 
    }
    
    function ventasAction() {
        $params = $this->_request->getParams();
        $curso = $params['curso'];
        
        $compras = new Models_Cursos();
        $result = $compras->ventas($curso);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');     
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);       
    }
    
    function usuariosdelcursoAction() {
        $params = $this->_request->getParams();
        $curso = $params['curso'];
        
        $compras = new Models_Usuarios();
        $result = $compras->usuarios_curso($curso);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');     
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);         
    }
    
    function dadosgraficacomprascursosmesAction() {
         $params = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $curso = $cursos->comprasMes($params['curso']);
        
        $meses = array();
        foreach ($curso as $c) {
            $meses[$c['Mes']] = $c['Suma'];
        }
        for ($i = 1; $i <= 12; $i++) {
            if (empty($meses[$i])) {
                $meses[$i] = 0;
            }
        }
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');     
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($meses);         
    }
    
    function dadosgraficacomprascursosAction() {
        $params = $this->_request->getParams();
        
        $cursos = new Models_Cursos();
        $curso = $cursos->compras($params['curso']);

        $meses = array();
        foreach ($curso as $c) {
            $meses[$c['Mes']] = $c['Qant'];
        }
        for ($i = 1; $i <= 12; $i++) {
            if (empty($meses[$i])) {
                $meses[$i] = 0;
            }
        }
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');     
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($meses);        
    }
}

