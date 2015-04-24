<?php

//include APPLICATION_PATH.'/decorators/textarea.php';
//include APPLICATION_PATH.'/decorators/button.php';
class Forms_Pergunta extends Zend_Form {
    
    function init() {
        $root = ('http') . '://' . $_SERVER['HTTP_HOST'] . '/aulas/public';
        
        $this->setAction($root."/pergunta/adicionarpergunta")->setMethod("post");
        
        $idPergunta = new Zend_Form_Element_Hidden('ID_PERGUNTA_PER');
        $idCurso = new Zend_Form_Element_Hidden('ID_CURSO_CR');
        $idUsuario = new Zend_Form_Element_Hidden('ID_USUARIO_USU');
        
        $perguntaDecorator = new Decorators_Textarea();
        $pergunta = new Zend_Form_Element_Textarea('ST_PERGUNTA_PER', array('rows' => 3, 'placeholder' => 'Escreva a pergunta...'));
        $pergunta->addDecorator($perguntaDecorator);
        
        
        $botao = new Zend_Form_Element_Submit('Perguntar', array('value' => 'Perguntar', 'class' => 'btn btn-blue'));
        
        $this->addElement($idPergunta);
        $this->addElement($pergunta);
        $this->addElement($idCurso);
        $this->addElement($idUsuario);
        $this->addElement($botao);
    }
}
