<?php

//include APPLICATION_PATH.'/decorators/textarea.php';
//include APPLICATION_PATH.'/decorators/button.php';
class Forms_Pergunta extends Zend_Form {
    
    function init() {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/bobby/public';
        
        $this->setAction($root."/curso/adicionarpergunta")->setMethod("post");
        
        $idPergunta = new Zend_Form_Element_Hidden('ID_PERGUNTA_PER');
        
        $perguntaDecorator = new Decorators_Textarea();
        $pergunta = new Zend_Form_Element_Textarea('ST_PERGUNTA_PER', array('rows' => 3, 'placeholder' => 'Escreva a pergunta...'));
        $pergunta->addDecorator($perguntaDecorator);
        
        
        $botao = new Zend_Form_Element_Button('Perguntar', array('value' => 'Perguntar', 'class' => 'btn btn-blue'));
        
        $this->addElement($idPergunta);
        $this->addElement($pergunta);
        $this->addElement($botao);
    }
}
