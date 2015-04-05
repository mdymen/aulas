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
class IndexController extends Zend_Controller_Action {

    public function indexAction() {
        $params = $this->_request->getParams();

//        $uri = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
//        $url  =   explode("/", $uri);
//
//        if (!empty($url[4]) && !empty($url[3])) {
//            if ($controller == 'index' && $action == 'index') {
//                 
//            }
//        }
    }
    
    public function registerAction() {}
}
