


 function alterarPendentes(botao){
    
       var opcao = botao.name;
       var idC = botao.dataset.id;
       var idU = botao.dataset.idUsu;
       var fl_pendente = botao.dataset.pendente;
        var url = window.location.pathname;
        var host = window.location.hostname;
        var urlMod = url.split('/');
        var tam = urlMod.length;
        urlMod[tam-1]="creditopendente";
        url = urlMod.join("/");  

       if(opcao == 'pendente'){
           
           
          $.post(url,
                {idCredito:idC, idUser:idU},
                function(){
                    Notify('Credito liberaado com sucesso', 'bottom-right', '5000', 'green', 'fa-check', true);
                }
         );  
       }
};
function confirmDialog(botao,usuario){

    var pendente = botao.dataset.pendente;
 
            bootbox.confirm("Tem certeza que deseja excluir o crédito do usuario "+usuario.toUpperCase()+" ?", function (result) {
                if (result) {
                    
                }
            });
    }