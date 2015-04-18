<?php

include APPLICATION_PATH.'/decorators/textarea.php';
include APPLICATION_PATH.'/decorators/button.php';
class Forms_Verresposta extends Zend_Form {
    
    function init() {
        
        $idPergunta = new Zend_Form_Element_Hidden('ID_PERGUNTA_PER');
        
        $resposta = new Zend_Form_Element_Note('ST_RESPOSTA_PER');
        $botao = new Zend_Form_Element_Submit('Responder', array( 'value' => 'Perguntar', 'class' => 'btn btn-blue'));
        
        $this->addElement($idPergunta);     
        $this->addElement($resposta); 
        $this->addElement($botao);
    }
}
