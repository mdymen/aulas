<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios
 *
 * @author Dell
 */
class  Models_Usuarios extends Zend_Db_Table_Abstract {
    
    protected $_name = 'Usuarios';
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_USUARIO_USU' =>   $params['ID_USUARIO_USU'],
            'ST_SENHA_USU'   =>   $params['ST_SENHA_USU'],
            'ST_LOGIN_USU'   =>   $params['ST_LOGIN_USU'],
            'FL_ADMIN_USU'   =>   $params['FL_ADMIN_USU'],
        );
        $db->insert($this->_name, $info);  
    }
}
