<?php


class  Models_Usuarios extends Zend_Db_Table {
    
    protected $_name = 'Usuarios';
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ST_USUARIO_USU' =>   $params['ST_USUARIO_USU'],
            'ST_SENHA_USU'   =>   $params['ST_SENHA_USU'],
            'ST_EMAIL_USU' => $params['ST_EMAIL_USU']
        );
        
        $db->insert($this->_name, $info);  
    }
}
