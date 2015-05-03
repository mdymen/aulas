


 function alterarPendentes(botao){
    
       var opcao = botao.name;
       var idC = botao.dataset.id;
       var idU = botao.dataset.idUsu;
       var fl_pendente = botao.dataset.pendente;
       var urlTemp = $(location).attr('href').toString();
       var url = urlTemp.substring(0,46)+'creditopendente';
    
       if(opcao == 'pendente'){
           
          $.post(url,
                {idCredito:idC, idUser:idU},
                function(){
                    Notify('Creditos adicionados com sucesso', 'bottom-right', '5000', 'green', 'fa-home', true);
                }
         );  
       }
};