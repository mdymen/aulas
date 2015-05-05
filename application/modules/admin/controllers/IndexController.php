<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author Martin Dymenstein
 */
class Admin_IndexController extends Zend_Controller_Action {
    
    public function init()
    {
        $this->_helper->layout->setLayout('admin');
    }

    public function indexAction()
    {
        $usuarios = new Models_Usuarios();
        $quantidade = $usuarios->quantidade();
        
        include_once APPLICATION_PATH.'/models/creditosPendentes.php';
        $creditos = new Application_Model_Creditos_Pendentes();
        $countCreditos = $creditos->countPendentes();
        
        include_once APPLICATION_PATH.'/models/perguntas.php';
        $perguntas = new Models_Perguntas();
        $countPerguntas = $perguntas->perguntasNaoLidas();
        
        
        $this->view->quantidade = $quantidade;
        $this->view->creditosPendentes = $countCreditos;
        $this->view->countPerguntas = $countPerguntas;
    }
    
    public function loginAction() {}

    public function cadastrarAction() {
        $params = $this->_request->getParams();
        
        $params['ST_LOGIN_USU'] = $params['ID_USUARIO_USU'];
        $params['FL_ADMIN_USU'] = false;
        
        $model = new Models_Usuarios();
        $model->save($params);
        
        $login = Models_Login::logar($params['ID_USUARIO_USU'], $params['ST_SENHA_USU']);
        if ($login) {
            $this->indexAction();
        }
    }
    
    public function cadastroAction() {}
    
    public function filesAction() {
        
    }
    
    public function filetestingAction() {
        
        $curso = $this->_request->getParam('curso');
        
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


if(file_put_contents($uploaddir.$curso.'-'.$randomName, $decodedData)) {
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
        
        $this->_helper->json($params);  
    }

}
