

var submeterUsandoAjax = function(botao){
    
        var url = window.location.href;
        url +='/comprar';

       // Notify('Creditos adicionados com sucesso', 'top-right', '5000', 'green', 'fa-ok', true);
        $('#FormCredito').submit();
        
        
        
//        var form = $('#FormCredito').submit(function(){
//        var dados = $(this).serialize();
//        
//        $.post(url,
//              {
//               'ID':dados.ID,
//               'VL_VALOR_CREDITO':dados.VL_VALOR_CREDITO}
//               ),function(){
//           
//                Notify('Creditos adicionados com sucesso', 'top-right', '5000', 'green', 'fa-home', true);
//               };
//
//   });
   
}