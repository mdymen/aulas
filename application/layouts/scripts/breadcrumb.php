<?php

function breadcrumb() {
        
    $uri = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
    $url  =   explode("/", $uri);

    $nivel1 = $url[3];

    if (!empty($url[4])) {
        $nivel2 = explode("?", $url[4]);    
        $nivel2 = $nivel2[0];
    } else {
        $nivel2 = "index";
    }
    
    switch ($nivel1) {
        case $nivel1 == "curso":
            $nivel1 = "Cursos";
            
            switch ($nivel2) {
                case $nivel2 == "adicionar":
                    $nivel2 = "Adicionar novo curso";
                    break;
            }
            
            
            break;
        case $nivel1 == "usuario";
            $nivel1 = "Usuario";
            switch ($nivel2) {
                case $nivel2 == "index":
                    $nivel2 = "Minha conta";
                    break;
                default:
                    break;
            }
            break;
        case $nivel1 == "slide":
            $nivel1 = "Slides";
            switch ($nivel2) {
                case $nivel2 == "adicionar":
                    $nivel2 = "Adicionar novo slide ao curso";
                    break;
                default:
                    break;
            }
            break;
        default:
            break;
    }
    
    switch ($nivel2){
        case $nivel2 == "index":
            switch ($nivel1) {
                case $nivel1 == "cursos":
                    $nivel1 = "Lista do cursos";
                    break;
                default:
                    $nivel1 = "index";
                    break;
            }
            $nivel2 = "Lista do cursos";
            break;        
        case $nivel2 == "cursos":
            $nivel2 = "Cursos disponiveis";
            break;
        case $nivel2 == "ficha":
            $nivel2 = "Ficha do curso";
            break;
        case $nivel2 == "vercurso":
            $nivel2 = "Fazer o curso";  
            break;
        default:
            
            break;
    }

    echo '<div class="header-title">
                <h1>
                    <span>'.$nivel1.'</span>
                    <small>
                        <i class="fa fa-angle-right"></i>
                        <span>'.$nivel2.'</span>
                    </small>
                </h1>
            </div>';  
}