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
    
    public static function MySqlToLatin($date) {
        
        $date1 = explode('-',$date);        
        return $date1[2].'/'.$date1[1].'/'.$date1[0];
    }
    
    public static function LatinToMysql($date) {
        $date1_ = explode("/",$date);
        return $date1_['2'].'-'.$date1_[1].'-'.$date1_[0];
    }

}
