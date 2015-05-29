
function start_informacoes_editar_curso(desc,conteudo, e, caract) {
    
    $('#infoCompl').html($('#infoCompl').html()+'<div class="col-lg-4 col-sm-6 col-xs-12" style="right:55px">\n\
                                                <div class="popoverexample">\n\
                                                    <div class="popover right">\n\
                                                        <div class="arrow"></div>\n\
                                                        <h4 class="popover-title bordered-blueberry">\n\
<span class="badge badge-info">\n\
                    <i class="fa fa-info"></i>\n\
                </span>\n\
'+desc+'</h4>\n\
                                                        <div class="popover-content">\n\
                                                            <p>Explicar em que consiste o curso.</p>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>');
        $('#infoCompl').html($('#infoCompl').html()+'<div class="col-lg-4 col-sm-6 col-xs-12" style="right:55px">\n\
                                                <div class="popoverexample">\n\
                                                    <div class="popover right">\n\
                                                        <div class="arrow"></div>\n\
                                                        <h4 class="popover-title bordered-blueberry">\n\
<span class="badge badge-info">\n\
                    <i class="fa fa-info"></i>\n\
                </span>\n\
'+conteudo+'</h4>\n\
                                                        <div class="popover-content">\n\
                                                            <p>Qual e o '+conteudo+' do curso. Que ensina?. (;) para quebra de linha.</p>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>');

$('#infoCompl').html($('#infoCompl').html()+'<div class="col-lg-4 col-sm-6 col-xs-12" style="top:-15px;right:55px">\n\
                                                <div class="popoverexample">\n\
                                                    <div class="popover right">\n\
                                                        <div class="arrow"></div>\n\
                                                        <h4 class="popover-title bordered-blueberry">\n\
<span class="badge badge-info">\n\
                    <i class="fa fa-info"></i>\n\
                </span>\n\
Objetivo</h4>\n\
                                                        <div class="popover-content">\n\
                                                            <p>Por que '+e+' importante fazer este curso.</p>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>');
    
    $('#infoCompl').html($('#infoCompl').html()+'<div class="col-lg-4 col-sm-6 col-xs-12" style="top:-25px;right:55px">\n\
                                                <div class="popoverexample">\n\
                                                    <div class="popover right">\n\
                                                        <div class="arrow"></div>\n\
                                                        <h4 class="popover-title bordered-blueberry">\n\
<span class="badge badge-info">\n\
                    <i class="fa fa-info"></i>\n\
                </span>\n\
'+caract+'</h4>\n\
                                                        <div class="popover-content">\n\
                                                            <p>O curso tem texto? imagens? video?. (;) quebra de linha.</p>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>');
   }
