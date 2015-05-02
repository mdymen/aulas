<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Credito
 *
 * @author Junqueira
 */
include APPLICATION_PATH.'/decorators/Form.php';
include APPLICATION_PATH.'/decorators/Decorator1.php';

class Forms_Credito extends Zend_Form{

    protected $titulo = 'Adicionar créditos';

    
    public function init(){
            $this->setAction("Credito/comprar")->setMethod("post");
            $this->setAttrib('titulo','Adicionar créditos');
            $this->setAttrib('onSubmit', 'submitUsandoAjax();');
            $this->setAttrib('id', 'credito');
            
                    $decCpt = new Decorators_Decorator1();
            
        $agencia = new Zend_Form_Element_Text('NOSSO_AGENCIA',
                    array(
                          'nomeCampo'=>'Nossa agência',
                          'disabled'=>'disabled',
                          'icono'=>'',
                          'placeholder'=>'2200-4'
                         
                    )); 
        $contaCorrente = new Zend_Form_Element_Text('NOSSA_CONTA',
                    array(
                          'nomeCampo'=>'Nossa conta corrente',
                          'disabled'=>'disabled',
                          'placeholder'=>'22643-2'
                         
                    )); 
        $contaCorrente->addDecorator($decCpt);
        $agencia->addDecorator($decCpt);

        
       $valor = new Zend_Form_Element_Text('VL_VALOR_CREDITO',
                    array(
                          'nomeCampo'=>'Valor'
                    )); 
       $valor->addDecorator($decCpt);
        
        $btnSubmit = new Zend_Form_Element_Submit('CREDITAR',
                   array(
                          'label'=>'Comprar',
                          'class'=>'btn btn-blue'
                   ));
        
                    $this->addElements(
                            array(
                                $agencia,
                                $contaCorrente,
                                $valor,
                                $btnSubmit
                            ));  
        $decoratorForm = new Decorators_Form();

        $this->addDecorator($decoratorForm);
        
        
    }
    
    
}
