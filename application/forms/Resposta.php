<?php

include APPLICATION_PATH.'/decorators/textarea.php';
include APPLICATION_PATH.'/decorators/button.php';
include APPLICATION_PATH.'/decorators/decorator1.php';
class Forms_Resposta extends Zend_Form {
    
    function init() {
        $root = 'http' . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/admin/perguntas/resposta")->setMethod("post");
        
        $idPergunta = new Zend_Form_Element_Hidden('ID_PERGUNTA_PER');

       // $nome_pergunta_dec = new Decorators_Decorator1();
        $nome_pergunta = new Zend_Form_Element_Note('Pergunta');
       // $nome_pergunta->addDecorator($nome_pergunta_dec);
        
        $respostaDecorator = new Decorators_Textarea();
        $resposta = new Zend_Form_Element_Textarea('ST_RESPOSTA_PER', array('rows' => 3));
        $resposta->addDecorator($respostaDecorator);        
        
        $botao = new Zend_Form_Element_Submit('Responder', array( 'value' => 'Perguntar', 'class' => 'btn btn-blue'));
        
        $this->addElement($idPergunta);
        $this->addElement($nome_pergunta);
        $this->addElement($resposta);        
        
        $this->addElement($botao);
    }
}
