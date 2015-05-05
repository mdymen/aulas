<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Html
 *
 * @author Martin Dymenstein
 */
class Decorators_Html {
    
    public static function baseHtml($html, $col, $titulo) {
        return   '<div class="'.$col.'">
                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-blue">
                                    <span class="widget-caption" id="tituloForm">'.
                                 $titulo.'  
                                     </span>
                                    <div class="widget-buttons" >
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div><div class="widget-body" style="display:block; overflow: hidden;">'.$html.'</div></div>';
        
    }
    
}
