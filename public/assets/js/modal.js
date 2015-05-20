$(function() {
    var modal = '<div class="modal-preview">\n\
                                            <div class="modal modal-primary">\n\
                                                <div class="modal-dialog">\n\
                                                    <div class="modal-content">\n\
                                                        <div class="modal-header">\n\
                                                            <button type="button" class="btnCancelar close" data-dismiss="modal" aria-hidden="true"><?php echo utf8_encode('×'); ?></button>\n\
                                                            <h4 class="modal-title"><?php echo utf8_encode('Confirmação'); ?></h4>\n\
                                                        </div>\n\
                                                        <div class="modal-body">\n\
                                                            <p>Certeza que deseja excluir o curso?</p>\n\
                                                        </div>\n\
                                                        <div class="modal-footer">\n\
                                                            <button type="button" class="btnCancelar btn btn-warning" data-dismiss="modal">Cancelar</button>\n\
                                                            <button type="button" id="btnExcluir" class="btn btn-primary">Aceitar</button>\n\
                                                        </div>\n\
                                                    </div><!-- /.modal-content -->\n\
                                                </div><!-- /.modal-dialog -->\n\
                                            </div><!-- /.modal -->\n\
                                        </div>';
                                                                
            $('#divModal').html(modal);
            $('#divModal').dialog({position: { my: "center", at: "center", of: $('#opcoes') }});
            fecharModal();
            excluirCurso();
           
});

