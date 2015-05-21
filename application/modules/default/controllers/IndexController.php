<?php //

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
include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
class IndexController extends Zend_Controller_Action {

    public function phpinfoAction() {
        echo phpinfo();
        die('.');
        
    }
    
    public function clienteAction() {
        $this->_helper->layout->disableLayout();
        $this->getHelper('viewRenderer')->setNoRender(true);        
        $soap = new Zend_Soap_Client("http://127.0.0.1/aulas/public/index/soap?wsdl", array('encoding' => 'UTF-8'));
        $x = $soap->getLastRequest();
        echo $x;
        print_r($x);
        die('.');
    }
    
     public function wsdlAction() {
        include_once APPLICATION_PATH.'/Manager.php'; 

        $this->_helper->layout->disableLayout();
        $this->getHelper ( 'viewRenderer' )->setNoRender ( true );
        $wsdl = new Zend_Soap_AutoDiscover ();
        $wsdl->setClass ( 'Manager' );
        $wsdl->setUri ( 'http://localhost/aulas/public/index/soap' );
        $wsdl->handle ();
     }
    
    public function soapAction() { 
        $this->_helper->layout->disableLayout();
        ini_set('soap.wsdl_cache_enabled',0);
        $class = 'http://localhost/aulas/public/index/soap?wsdl';
        include_once APPLICATION_PATH.'/Manager.php';  
        $this->getHelper('viewRenderer')->setNoRender(true);
        header("Content-type: text/xml");
        
        if(isset($_GET['wsdl'])) {
            $server = new Zend_Soap_AutoDiscover();
            $server->setClass('Manager');
            $server->handle();           
        }else {
          $soap = new Zend_Soap_Server($class);
          $soap->setClass('Manager');
          $soap->handle();
        }

    }
    
    public function indexAction() {
        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();

        if (!empty($data)){        
            $data = get_object_vars($data);
            $cursos = new Models_Cursos();
           // $result = $cursos->countSlides();

            $usuario = new Models_Usuarios();

           // $this->view->cursos = $result;
            $this->view->perguntas = $usuario->dashboard($data);
            $this->view->cantCursos = $cursos->cantCursos();
        }
    }
    
    public function registerAction() {}
    
}
