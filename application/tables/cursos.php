<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cursos
 *
 * @author Dell
 */
class Tables_Cursos extends Tables_Simpletable {
    
    /*public function __construct($dados, $titulo = 'Sem titulo') {
        parent::__construct($titulo, $dados);
        $this->headers();
    }
    
    public function headers() {
        $this->header = array('Id','Nome','Custo');
    }*/
    
    
    public function dados($dados) {
        $fc = Zend_controller_front::getInstance();

        $linhas = array();
        if (!empty($dados)) {
            foreach ($dados as $dado) {   
                $linha = array();
                $linha[0] = $dado['ID_ID_CR'];
                $linha[1] = $dado['ST_IDENT_CR'];
                $linha[2] = '<a href="'.$fc->getBaseUrl().'/admin/curso/curso?curso='.$dado['ID_ID_CR'].'"'.'>'.$dado['ST_NOME_CR'].'</a>'; 
                $linha[3] = $dado['VL_CUSTO_CR'];
                array_push($linhas, $linha);
            }            
        }
        
        $this->_dados = $linhas;
    }

    public function headers() {
        $this->_headers = array('Id','Ident','Nome', 'Custo');
    }

    public function titulo() {
        $this->_titulo = "Cursos";
    }

}
