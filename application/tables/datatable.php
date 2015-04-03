<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datatable
 *
 * @author Dell
 */
abstract class datatable_datatable {
    
    private $titulo;
    protected $header = array();
    
    public function __construct($titulo = 'Sem titulo') {
        $this->titulo = $titulo;
    }
    
    /*
     * Array com os titulos
     */
    abstract function headers();
    
    public function render() {
        $datatable = '<div class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">'.$this->titulo.'</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div role="grid" id="simpledatatable_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="DTTT btn-group"><a class="btn btn-default DTTT_button_copy" id="ToolTables_simpledatatable_0"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 53px; height: 31px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_1" src="assets/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="53" height="31" name="ZeroClipboard_TableToolsMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=53&amp;height=31" wmode="transparent"></div></a><a class="btn btn-default DTTT_button_csv" id="ToolTables_simpledatatable_1"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 47px; height: 31px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_2" src="assets/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="47" height="31" name="ZeroClipboard_TableToolsMovie_2" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=2&amp;width=47&amp;height=31" wmode="transparent"></div></a><a class="btn btn-default DTTT_button_xls" id="ToolTables_simpledatatable_2"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 51px; height: 31px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_3" src="assets/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="51" height="31" name="ZeroClipboard_TableToolsMovie_3" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=3&amp;width=51&amp;height=31" wmode="transparent"></div></a><a class="btn btn-default DTTT_button_pdf" id="ToolTables_simpledatatable_3"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 46px; height: 31px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_4" src="assets/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="46" height="31" name="ZeroClipboard_TableToolsMovie_4" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=4&amp;width=46&amp;height=31" wmode="transparent"></div></a><a class="btn btn-default DTTT_button_print" id="ToolTables_simpledatatable_4" title="View print view"><span>Print</span></a></div><div id="simpledatatable_filter" class="dataTables_filter"><label><input type="search" class="form-control input-sm" aria-controls="simpledatatable"></label></div><div class="dataTables_length" id="simpledatatable_length"><label><select name="simpledatatable_length" aria-controls="simpledatatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><table class="table table-striped table-bordered table-hover dataTable no-footer" id="simpledatatable" aria-describedby="simpledatatable_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                    
                                                " style="width: 29px;">
                                                    <div class="checker"><span class=""><input type="checkbox" class="group-checkable" data-set="#flip .checkboxes"></span></div>
                                                </th>';
                                                foreach ($this->header as $header) {
                                                    $datatable .= '<th class="sorting_asc" tabindex="0" aria-controls="simpledatatable" rowspan="1" colspan="1" aria-label="
                                                        '.$header.'
                                                    : activate to sort column ascending" style="width: 198px;" aria-sort="ascending">
                                                        '.$header.'
                                                    </th>';
                                                }
                                            
                                                /*<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                    Email
                                                " style="width: 387px;">
                                                    Email
                                                </th><th class="sorting" tabindex="0" aria-controls="simpledatatable" rowspan="1" colspan="1" aria-label="
                                                    Points
                                                : activate to sort column ascending" style="width: 134px;">
                                                    Points
                                                </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                    Joined
                                                " style="width: 222px;">
                                                    Joined
                                                </th>*/
                                                
                                                $datatable .= '</tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        <tr class="odd">
                                                <td class=" ">
                                                    <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                </td>
                                                <td class="sorting_1">
                                                    coop
                                                </td>
                                                <td class=" ">
                                                    <a href="mailto:userwow@gmail.com">good@gmail.com</a>
                                                </td>
                                                <td class=" ">
                                                    20
                                                </td>
                                                <td class="center  ">
                                                    19.11.2010
                                                </td>
                                            </tr><tr class="even">
                                                <td class=" ">
                                                    <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                </td>
                                                <td class="sorting_1">
                                                    foopl
                                                </td>
                                                <td class=" ">
                                                    <a href="mailto:userwow@gmail.com">good@gmail.com</a>
                                                </td>
                                                <td class=" ">
                                                    20
                                                </td>
                                                <td class="center  ">
                                                    19.11.2010
                                                </td>
                                            </tr><tr class="odd">
                                                <td class=" ">
                                                    <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                </td>
                                                <td class="sorting_1">
                                                    fop
                                                </td>
                                                <td class=" ">
                                                    <a href="mailto:userwow@gmail.com">good@gmail.com</a>
                                                </td>
                                                <td class=" ">
                                                    20
                                                </td>
                                                <td class="center  ">
                                                    13.11.2010
                                                </td>
                                            </tr><tr class="even">
                                                <td class=" ">
                                                    <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                </td>
                                                <td class="sorting_1">
                                                    goop
                                                </td>
                                                <td class=" ">
                                                    <a href="mailto:userwow@gmail.com">good@gmail.com</a>
                                                </td>
                                                <td class=" ">
                                                    20
                                                </td>
                                                <td class="center  ">
                                                    12.11.2010
                                                </td>
                                            </tr><tr class="odd">
                                                <td class=" ">
                                                    <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                                                </td>
                                                <td class="sorting_1">
                                                    kop
                                                </td>
                                                <td class=" ">
                                                    <a href="mailto:userwow@gmail.com">good@gmail.com</a>
                                                </td>
                                                <td class=" ">
                                                    20
                                                </td>
                                                <td class="center  ">
                                                    17.11.2010
                                                </td>
                                            </tr></tbody>
                                    </table><div class="row DTTTFooter"><div class="col-sm-6"><div class="dataTables_info" id="simpledatatable_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 5 of 25 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_bootstrap" id="simpledatatable_paginate"><ul class="pagination"><li class="prev disabled"><a href="#">Prev</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next</a></li></ul></div></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>';
                                                        echo $datatable;
    }
    
    public function titulos() {}
    
    public function dados() {}
}
