<?php

include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
include APPLICATION_PATH.'/Decorators/Exercicios.php';
include APPLICATION_PATH.'/decorators/Form.php';
include APPLICATION_PATH.'/forms/slide/adicionar.php';
class Admin_ExerciciosController extends Zend_Controller_Action {
    
    public function init() {}
    
    public function indexAction() {
        $this->view->perguntas = $this->possesives();
    }
    
    public function completeadverbsAction() {
        $p[0]['pergunta'] = 'They laughed (happy)';
        $p[0]['nome'] = 'pergunta1';
        
        $p[1]['pergunta'] = 'The dog run (quick)';
        $p[1]['nome'] = 'pergunta2';
        
        $p[2]['pergunta'] = 'He solved the problem (easy)';
        $p[2]['nome'] = 'pergunta3';
        
        $p[3]['pergunta'] = 'You are writing too (slow)';
        $p[3]['nome'] = 'pergunta4';

        return $p;
    }

    public function possesives() {
        $p[0]['pergunta'] = "This book is not Paul's, it's ... (my, hers, mine)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'mine';
        
        $p[1]['pergunta'] = 'Yours car is more expensive than...(yours, hers, his) ';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'his';
        
        $p[2]['pergunta'] = 'Our teachers are so much older than...(mine, yours, my)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'yours';
        
        $p[3]['pergunta'] = "Whose notebook is this? - It's ...(her, their, his)";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'his';

        $p[4]['pergunta'] = "- Is this your pen? - No, it's ...(yours, their, my)";
        $p[4]['nome'] = 'pergunta5';
        $p[4]['resposta'] = 'yours';
        return $p;
    }    
 //   public function 
    
//        public function testAction() {
//        
//        $x[0]['pergunta'] = 'PERGUNTA??';
//        $x[0]['nome'] = 'pergunta1';
//        
//        $x[1]['pergunta'] = 'y ahora que pergunta?';
//        $x[1]['nome'] = 'pergunta2';
//        
//        $form = new Forms_Exercicios_Perguntas($x);
//        $this->view->form = $form;
//    }
}
