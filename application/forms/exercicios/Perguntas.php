<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perguntas
 *
 * @author Martin Dymenstein
 */
include APPLICATION_PATH.'/decorators/perguntas.php';
include APPLICATION_PATH.'/decorators/button.php';
class Forms_Exercicios_Perguntas extends Zend_Form {
    
    protected $_dados = array();
    
    /*
     * $perguntas[]['pergunta'];
     * $perguntas[]['nome'];
     */
    public function __construct($perguntas) {
        $this->_dados = $perguntas;
        parent::__construct();
    }
    
    public function init() {
        
        foreach ($this->_dados as $pergunta) {
            
            $dec = new Decorators_Perguntas();
            $p = new Zend_Form_Element_Text($pergunta['nome'], array('pergunta'=>$pergunta['pergunta'],'placeholder' => 'Resposta'));            
            $p->addDecorator($dec);
            
            $btnDec = new Decorators_Button();
            $btn = new Zend_Form_Element_Button('btnCorregir', array('value'=>'Corregir', 'class' => 'btn btn-success', 'type' => 'button'));
            $btn->addDecorator($btnDec);
            
            $btnDec1 = new Decorators_Button();
            $btn1 = new Zend_Form_Element_Button('btnRespostas', array('value'=>'Respostas', 'class' => 'btn', 'type' => 'button'));
            $btn1->addDecorator($btnDec1);            
         //   $btn = new Zend_Button
            
            $this->addElement($p);
            $this->addElement($btn);
            $this->addElement($btn1); 
        }
        
    }
}
