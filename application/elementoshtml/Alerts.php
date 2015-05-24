<?php

class Elementoshtml_Alerts {
    
    static function warning($msg = "Nao existe nenhum elemento.", $warning = 'Aviso') {
        return '<div class="col-lg-12  col-xs-12 col-md-6">
                    <div class="alert alert-warning fade in">
                        <button class="close" data-dismiss="alert">
                           '.utf8_encode('×').'
                        </button>
                        <i class="fa-fw fa fa-warning"></i>
                        <strong>'.$warning.'</strong> '.$msg.'
                    </div>
                </div>';
    }
    
    static function info($msg, $info = 'Info') {
        echo '<div class="col-lg-12  col-xs-12 col-md-6">
        <div class="alert alert-info fade in">
                                                <button class="close" data-dismiss="alert">
                                                    '.utf8_encode('×').'
                                                </button>
                                                <i class="fa-fw fa fa-info"></i>
                                                <strong>'.$info.'!</strong> '.$msg.'
                                            </div></div>';
    }
}
