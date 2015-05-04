<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sugestoes
 *
 * @author Martin Dymenstein
 */
class Models_Sugestoes extends Zend_Db_Table {
    protected $_name = "Sugestoes";
    
    public function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_TEXTO_SUG' => $params['ST_TEXTO_SUG'],
            'ID_USUARIO_SUG' => $params['ID_USUARIO_SUG'],
            'DT_DATA_SUG' => $params['DT_DATA_SUG']
        );
        
        $db->insert($this->_name, $info);
    }
}
