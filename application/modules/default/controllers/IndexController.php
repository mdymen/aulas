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

    public function indexAction() {
    }
    
    public function registerAction() {}
    
    public function testAction() {
        
        $x[0]['pergunta'] = 'PERGUNTA??';
        $x[0]['nome'] = 'pergunta1';
        
        $x[1]['pergunta'] = 'y ahora que pergunta?';
        $x[1]['nome'] = 'pergunta2';
        
        $form = new Forms_Exercicios_Perguntas($x);
        $this->view->form = $form;
    }
}
