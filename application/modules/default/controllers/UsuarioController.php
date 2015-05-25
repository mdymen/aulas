<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Dell
 */
class UsuarioController extends Zend_Controller_Action {

    private $storage;
    private $data;  
    
    function init() {
         $this->storage = new Zend_Auth_Storage_Session();
         $this->data = get_object_vars($this->storage->read());  
    }
    
    function indexAction() {
        $usuario = new Models_Usuarios();
        $credito = new Application_Model_Creditos();
        
        $creditos = $credito->retornarCreditos($this->data['ID_ID_USU']);

        $perguntas = $usuario->getPerguntas($this->data);
        
        $this->view->perguntas = $perguntas;
        
        $cursos = $usuario->getCursosSlidesDoUsuario($this->data);
        $cursosslides = $usuario->getCursosSlides($this->data);
        $compras = $usuario->getCompras($this->data,'','');
        $acreditados = $usuario->getComprasCredito($this->data,'','');
        
        $this->view->cursos = $cursos;
        $this->view->cursosslides = $cursosslides;
        $this->view->compras = $compras;        
        $this->view->acreditados = $acreditados;
        
        $this->view->creditos = $creditos;
        
        $this->view->usuario = $this->data;
        $this->view->usuario_conta = $usuario->getUsuarioConta($this->data);
        
    }
    
    function atualizarAction() {
        $params = $this->_request->getParams();
        
        $this->data['ST_EMAIL_USU'] = $params['ST_EMAIL_USU'];
        
        $usuario = new Models_Usuarios();
        $result = $usuario->update($params);

    //    $result = (object)$result;
    
        // $this->storage->write($result);  
        
        $this->redirect('usuario/index');
    }
    
    function cursosAction() {
  
    }
    
    function perfilAction() {
        include_once APPLICATION_PATH.'/forms/FotoPerfil.php';
        $form = new Forms_FotoPerfil();
        
        $base = APPLICATION_PATH."/../public/img/perfil/";
        
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            
            if ($form->isValid($formData)) {
                $name = $form->getValues();
                $ext = explode('.',$name['imgPerfil']);
                $data = $this->data;
                $new_name = $data['ST_USUARIO_USU'].'.'.$ext[1];
                // success - do something with the uploaded file
                rename($base.$name['imgPerfil'], $base.$new_name);
                $this->redirect('usuario/index');
                    
            }
        }
    }
    
    public function addsugestaoAction() {
        $params = $this->_request->getParams();
        
        include_once APPLICATION_PATH.'/Models/Sugestoes.php';
        
        $fecha = date('d-m-Y H:i');
        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'd-m-Y H:i' , $nuevafecha );
        
        $params['ID_USUARIO_SUG'] = $this->data['ID_ID_USU'];
        $params['DT_DATA_SUG'] = $nuevafecha;
        
        $sugestao = new Models_Sugestoes();
        $sugestao->save($params);
        
        $this->redirect();
    }
    
    function gravarcontaAction() {
        $params = $this->_request->getParams();
        
        $data = $this->data;
        
        $params['ID_ID_USU'] = $data['ID_ID_USU'];
        
        $usuarios = new Models_Usuarios();
        $result = $usuarios->gravarconta($params);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');     
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);    

    }
      
}
