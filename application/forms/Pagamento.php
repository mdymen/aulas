<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagamento
 *
 * @author Martin Dymenstein
 */
class Forms_Pagamento extends Zend_Form {
    
    function init() {
        
        $dec = new Decorators_Decorator1();
        
        $nome = new Zend_Form_Element_Text('ST_NOME_USU', array('placeholder' => 'Nome completo'));
        $nome->addDecorator($dec);
        
        $agencia = new Zend_Form_Element_Text('ST_AGENCIA_USU', array('placeholder' => utf8_encode('N° de Agencia'), 'col' => 'col-md-4'));
         $agencia->addDecorator($dec);
         
        $banco = new Zend_Form_Element_Text('ST_BANCO_USU', array('placeholder' => 'Nome do banco', 'col' => 'col-md-5'));
        $banco->addDecorator($dec);
        
        $cpf = new Zend_Form_Element_Text('ST_CPF_USU', array('placeholder' => 'CPF', 'col' => 'col-md-5'));
        $cpf->addDecorator($dec);
        
        $conta = new Zend_Form_Element_Text('ST_CONTA_USU', array('placeholder' => utf8_encode('N° da conta'), 'col' => 'col-md-4'));
        $conta->addDecorator($dec);
        
        $decBtn = new Decorators_Button();
        $aceitar = new Zend_Form_Element_Button('btnGravarConta', array('value' => 'Gravar','type' => 'button', 'class' => 'btn btn-success'));
        $aceitar->addDecorator($decBtn);
        
        $x = new Zend_Form_Element_Text('d', array('placeholder' => utf8_encode('N° da conta')));
        $x->addDecorator($dec);
        
        $this->addElements(array($nome, $cpf, $banco, $agencia, $conta, $x, $aceitar));
        
    }
}
