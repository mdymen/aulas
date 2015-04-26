<?php

/*
 * EXEMPLO
 * 
 *     $mail = Bobby_Mail::getInstance();

       $mail->addTo('msn@dymenstein.com');
       $mail->setSubject('Testing 2');
       $mail->setBodyText('prueba framework bobby!!!');
       $mail->setFrom('msn@dymenstein.com', 'Martin Dymenstein');

       print_r($mail->send());
 */

class Bobby_Mail {
    
    private static $mail = null;
    private $_send_mail;
    
    private function __construct() {
        $config = array(
            'auth' => 'login',
            'username' => 'bobbyaulas@gmail.com',
            'password' => 'Bobby2015',
            'ssl' => 'tls',
            'port' => 587
        );
        $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
        Zend_Mail::setDefaultTransport($mailTransport);
     
        $this->_send_mail = new Zend_Mail();
    }
    
    public static function getInstance() {
        if (self::$mail == null) {
            self::$mail = new Bobby_Mail();
        }
        return self::$mail;
    }
    
    public function addTo($mail) {
        $this->_send_mail->addTo($mail);
        return $this;
    }
    
    public function setSubject($subject) {
        $this->_send_mail->setSubject($subject);
        return $this;
    }
    
    public function setBodyText($body) {
        $this->_send_mail->setBodyText($body);
        return $this;
    }
    
    public function setFrom($mail,$name) {
        $this->_send_mail->setFrom($mail,$name);
        return $this;
    }
    
    public function send() {
        return $this->_send_mail->send();
    }
}
