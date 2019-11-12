$(document).ready(function(){
    
    $('#chat-enviar').submit(function(e) {
        e.preventDefault();
        
        var passou = 0;
        $(this).find('input.requerido').each(function(){
            if($(this).val() == ''){
                passou ++;
                $(this).parent().addClass("has-error").removeClass("has-success");
            }else{
                $(this).parent().addClass("has-success").removeClass("has-error");
            }
        });
        if(passou == 0){
            var $btn = $("button").button('loading');
            $.ajax({
                url: 'php/'+$(this).attr('id')+'.php',
                data: $(this).serialize(),
                type: 'POST',
                dataType: "json",
                success: function(retorno){
                    if(retorno["error"] == 0){
                        $btn.button('reset');
                        $('.form')[0].reset();
                        $('input.requerido').parent().removeClass("has-success");
                        
                        $(".chat").prepend(retorno["mensagem"]).slideDown("slow");
                        //$(".panel-body-chat").animate({ scrollTop: $(".panel-body-chat")[0].scrollHeight }, 1000);
                    }else{
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]);
                        $(".myModal").modal('show');
                        $btn.button('reset');
                    }
                }
            });
        }
    });
    
    setInterval(function(){
        $.getJSON('php/chat-mensagens.php', function(retorno) {
            $(".chat").html(retorno["mensagem"]).slideDown("slow");
        });
    }, 4000);
    
});