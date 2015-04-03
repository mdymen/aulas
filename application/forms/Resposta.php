<?php

include APPLICATION_PATH.'/decorators/textarea.php';
include APPLICATION_PATH.'/decorators/button.php';
class Forms_Resposta extends Zend_Form {
    
    function init() {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/bobby/public';
        
        $this->setAction($root."/pergunta/resposta")->setMethod("post");
        
        $idPergunta = new Zend_Form_Element_Hidden('ID_PERGUNTA_PER');
        
        $perguntaDecorator = new Decorators_Textarea();
        $pergunta = new Zend_Form_Element_Textarea('ST_PERGUNTA_PER', array('rows' => 3));
        $pergunta->addDecorator($perguntaDecorator);
        
        $respostaDecorator = new Decorators_Textarea();
        $resposta = new Zend_Form_Element_Textarea('ST_RESPOSTA_PER', array('rows' => 3));
        $resposta->addDecorator($respostaDecorator);        
        
        $botao = new Zend_Form_Element_Submit('Responder', array( 'value' => 'Perguntar', 'class' => 'btn btn-blue'));
        
        $this->addElement($idPergunta);
        $this->addElement($pergunta);
        $this->addElement($resposta);        
        $this->addElement($botao);
    }
}
