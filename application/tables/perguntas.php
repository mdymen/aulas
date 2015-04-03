<?php

class Tables_Perguntas extends Tables_Simpletable {
    
    public function dados($dados) {
        $fc = Zend_controller_front::getInstance();
        $linha = array();
        $linhas = array();
        if (!empty($dados)) {
            foreach ($dados as $dado) {
                $linha[0] = '<a href="'.$fc->getBaseUrl().'/pergunta/pergunta?pergunta='.$dado['ID_PERGUNTA_PER'].'"'.'>'.$dado['ID_PERGUNTA_PER'].'</a>';
                $linha[1] = $dado['ID_CURSO_CR'];
                $linha[2] = $dado['ID_USUARIO_USU'];
                $linha[3] = $dado['DT_UTIMOMOV_PER'];
                $linha[4] = $dado['ST_PERGUNTA_PER'];
                $linha[5] = $dado['ST_RESPOSTA_PER'];

                array_push($linhas, $linha);
            }            
        }
        $this->_dados = $linhas;       
    }

    public function headers() {
        $this->_headers = array('Id','Curso','Usuario', 'Data','Pergunta', 'Resposta');
    }

    public function titulo() {
        $this->_titulo = "Perguntas";
    }

}
