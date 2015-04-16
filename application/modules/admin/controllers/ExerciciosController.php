<?php

include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
include APPLICATION_PATH.'/Decorators/Exercicios.php';
include APPLICATION_PATH.'/decorators/Form.php';
include APPLICATION_PATH.'/forms/slide/adicionar.php';
class Admin_ExerciciosController extends Zend_Controller_Action {
    
    public function init() {}
    
    public function indexAction() {
        $this->view->perguntas = $this->verbotobe4();
    }

    public function verbotobe4() {
        $p[0]['pergunta'] = "Joanna and I are in the same class.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Are Joanna and I in the same class?';
        
        $p[1]['pergunta'] = "This egg is rotten.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Is this egg rotten?';
        
        $p[2]['pergunta'] = "Those horses are calm.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Are those horses calm?';
     
        return $p;        
    }    
    
    public function verbotobe3() {
        $p[0]['pergunta'] = "You're from Argentina.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Are you from Argentina?';
        
        $p[1]['pergunta'] = "They're in school now.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Are they in school?';
        
        $p[2]['pergunta'] = "They're good with Maths.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Are they good with Maths?';
        
        $p[3]['pergunta'] = 'Joanna and I are in the same class.';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'Are Joanna and I in the same class?';
     
        return $p;        
    }
    
    public function verbotobe2() {
        $p[0]['pergunta'] = 'You (plural) (are, am, is)';
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'are';
        
        $p[1]['pergunta'] = 'He (am, are, is)';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'am';
        
        $p[2]['pergunta'] = 'She (am, are, is)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        $p[3]['pergunta'] = 'They (am, are, is)';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'are';
     
        return $p;
    }
    
    public function verbotobe1() {
        $p[0]['pergunta'] = 'You (singular) (are, am, is)';
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'are';
        
        $p[1]['pergunta'] = 'I (am, are, is)';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'am';
        
        $p[2]['pergunta'] = 'It (am, are, is)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        $p[3]['pergunta'] = 'We (am, are, is)';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'are';
     
        return $p;
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
