<?php

class Bobby_Sessao {
    
    private static $sessao;
    private $_var_sessao;
    
    private function __construct(){
        $this->_var_sessao = new Zend_Auth_Storage_Session();
    }
    
    static function value($key) {
        $bobby = self::getInstance();
        return $bobby->_value($key);
    }
    
    static function addCurso($curso) {
        $user = Zend_Auth::getInstance()->getIdentity();
        array_push($user->CURSOS, $curso);
    }
    
    static function mudarEmail($email) {
        $user = Zend_Auth::getInstance()->getIdentity(); 
        $user->ST_EMAIL_USU = $email;
    }
    
    static function temCurso($idCurso) {
        $cursos = self::value('CURSOS');

        foreach ($cursos as $curso) {
            if ($curso['ID_CUR_UC'] == $idCurso) {
                return true;
            }
        }
        return false;
    }
    
    static function getInstance() {
        if (!self::$sessao) {
            self::$sessao = new Bobby_Sessao();
        }
        return self::$sessao;
    }
    
    private function _value($key) {
        $dados = $this->dados();
        return $dados[$key];
    }
    
    function dados() {
        return get_object_vars($this->_var_sessao->read());
    }
    
    
}
