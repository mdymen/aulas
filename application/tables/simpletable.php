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
    
    function render2() {
     $render =  '<div class="col-xs-12 col-md-6">
                            <div class="widget">
                                <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">'.$this->_titulo.'</span>  
                                
<div class="widget-buttons">
                                                <a href="#" data-toggle="collapse">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                <a href="#" data-toggle="dispose">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
</div>';
          if (count($this->_dados) > 0){
                $render .= '<div class="widget-body" class="display: block;"><table class="table table-hover table-striped table-bordered">
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
                                </table></div>
                            ';
       
         }
         else {
            $warning = new Elementoshtml_Alerts();
            $render .= $warning->warning();        
         }
         
        echo $render.'</div>

                        </div>';
    }       
    
    
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
