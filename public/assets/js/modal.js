 
 function fecharModal(modal) {
        $('.btnCancelar').bind('click', function() {
            modal.dialog('destroy');
        });
    }
    
    function mudar(atual,curso,classe, modal) {
        $('#btnMudar').bind('click', function() {
            var icone = 'lock';
            var vis = 0;
            var msg = "Seu curso NAO esta disponivel.";
            if (atual === 0) {
                icone = 'unlock';
                vis = 1;
                msg = "Seu curso esta disponivel.";
            }
           $.post('mudarvisibilidade',{id: curso, visibilidade:vis}, function() {
               $('#mudarVisibilidade').data('visibilidade',vis);
               classe.children('#iconeVis').attr('class','stat-icon icon-lg fa fa-'+icone+'');
               modal.dialog('destroy');
               Notify(msg, 'bottom-right', '3000', 'palegreen', 'fa fa-'+icone, true);
           }) 
        });
    }
    
    $(function() {
        var divModal = $('#divModal');
        
        
       $('.mudarVisibilidade').bind('click', function() {
           var atual = $(this).data('visibilidade');
           var modal = '<div class="modal-preview">\n\
                                            <div class="modal modal-primary">\n\
                                                <div class="modal-dialog">\n\
                                                    <div class="modal-content">\n\
                                                        <div class="modal-header">\n\
                                                            <button type="button" class="btnCancelar close" data-dismiss="modal" aria-hidden="true"><?php echo utf8_encode("×"); ?></button>\n\
                                                            <h4 class="modal-title"><?php echo utf8_encode("Confirmação"); ?></h4>\n\
                                                        </div>\n\
                                                        <div class="modal-body">\n\
                                                            <p>Deseja mudar a visibilidade do curso?</p>\n\
                                                        </div>\n\
                                                        <div class="modal-footer">\n\
                                                            <button type="button" class="btnCancelar btn btn-warning" data-dismiss="modal">Cancelar</button>\n\
                                                            <button type="button" id="btnMudar" class="btn btn-primary">Aceitar</button>\n\
                                                        </div>\n\
                                                    </div><!-- /.modal-content -->\n\
                                                </div><!-- /.modal-dialog -->\n\
                                            </div><!-- /.modal -->\n\
                                        </div>';
                                                                
            $('#divModal').html(modal);
            divModal.dialog({position: { my: "left", at: "right", of: $(this) }});
            fecharModal(divModal);
            mudar(atual,$(this).data('curso'),$(this),divModal);
            $('.ui-icon-closethick').hide();
       });
    });
