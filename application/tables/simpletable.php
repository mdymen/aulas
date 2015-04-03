<?php

include APPLICATION_PATH.'/Elementoshtml/Alerts.php';
abstract class Tables_Simpletable {
    
    protected $_titulo;
    protected $_headers;
    protected $_dados;
    
    function __construct($dados) {
        $this->headers();
        $this->titulo();
        $this->dados($dados);
    }

    abstract function titulo();
    abstract function headers();
    abstract function dados($dados);
    
    function render() {
        
        $render =  '<div class="col-xs-12 col-md-6">
                            <div class="well with-header  with-footer">
                                <div class="header bg-blue">'.
                                 $this->_titulo.  
                                '</div>';
          if (count($this->_dados) > 0){
                $render .= '<table class="table table-hover table-striped table-bordered">
                                    <thead class="bordered-darkorange">';
                
                                        $render .= '<tr>';
                                            
        
        foreach ($this->_headers as $header) {
            $render .= '<th>'.$header.'</th>';
        }
        
                                    
                                            $render .= '
                                    </tr>
                                    </thead>
                                    <tbody>';
         foreach ($this->_dados as $dados) {
             
             $render .= '<tr>';
             foreach ($dados as $dado) {
                 $render .= '<td>
                                                '.$dado.'
                                            </td>';
             }
         }  
                    $render .= ' </tr>
                                    </tbody>
                                </table>
                            ';
       
         }
         else {
            $warning = new Elementoshtml_Alerts();
            $render .= $warning->warning();        
         }
         
        echo $render.'</div>

                        </div>';
    }
}
