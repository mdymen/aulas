<?php


class  Models_Usuarios extends Zend_Db_Table {
    
    protected $_name = 'Usuarios';
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array
        (
            'ID_USUARIO_USU' =>   $params['ID_USUARIO_USU'],
            'ST_SENHA_USU'   =>   $params['ST_SENHA_USU'],
            'FL_ADMIN_USU'   =>   $params['FL_ADMIN_USU'],
        );
        $db->insert($this->_name, $info);  
    }
}
