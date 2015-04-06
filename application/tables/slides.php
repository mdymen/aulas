<?php

class Tables_Slides extends Tables_Simpletable {
        
    public function dados($dados) {
        $fc = Zend_controller_front::getInstance();

        $linha = array();
        $linhas = array();
        $i = 0;
        $id = 0;
        foreach ($dados as $dado) {
            $linha[1] = '<a href="'.$fc->getBaseUrl().'/admin/slide/slide?slide='.$dado['ID_SLIDE_SLI'].'"'.'>'.$dado['ID_SLIDE_SLI'].'</a>';
            $linha[2] = $dado['NM_SLIDE_SLI'];
            $linha[3] = $dado['ST_DESCR_SLI'];
           
            array_push($linhas, $linha);
        }
 
        $this->_dados = $linhas;
    }

    public function headers() {
        $this->_headers = array('Id','Nº Slide','Descripçao');
    }

    public function titulo() {
        $this->_titulo = "Slides";
    }

}
