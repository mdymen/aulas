<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rangodata
 *
 * @author Martin Dymenstein
 */
class Forms_Rangodata extends Zend_Form {
    
    function init() {
        
        $data = new Zend_Form_Element_Text('Data', array('placeholder' => 'Data'));
        
        $this->addElement($data);
        
    }
    
}
