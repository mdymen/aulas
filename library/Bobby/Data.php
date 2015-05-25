<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author Martin Dymenstein
 */
class Bobby_Data {
    
    public static function Agora() {
//        $fecha = date('d-m-Y H:i');
//        $nuevafecha = strtotime ( '-4 hour' , strtotime ( $fecha ) ) ;
//        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        return date ( 'Y-m-d' );
    }
    
    public static function MySqlFormatToLatin($date) {
        $date1_ = explode(" ",$date);
        $date_t = $date1_[0];
        
        $date_fim = explode("-", $date_t);
        return $date_fim[2].'-'.$date_fim[1].'-'.$date_fim[0];   
    }
}
