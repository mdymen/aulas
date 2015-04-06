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

        $linha = array();
        $linhas = array();
        $i = 0;
        $id = 0;
        if (!empty($dados)) {
            foreach ($dados as $dado) {
                foreach ($dado as $d) {
                    if ($i == 0) { $id = $d; }  
                   //significa que la linha seguinte é o nome do curso
                   if ($i == 2) { $linha[$i] = '<a href="'.$fc->getBaseUrl().'/admin/curso/curso?curso='.$id.'"'.'>'.$d.'</a>'; }
                   else { $linha[$i] = $d; }
                   
                   if ($i == 4) {break;}
                   $i++;
                }
                $i = 0;
                array_push($linhas, $linha);
            }            
        }
        
        $this->_dados = $linhas;
    }

    public function headers() {
        $this->_headers = array('Id','Nome','Descripçao', 'Custo');
    }

    public function titulo() {
        $this->_titulo = "Cursos";
    }

}
