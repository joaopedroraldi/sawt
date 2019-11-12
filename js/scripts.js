$(document).ready(function(){
    //ROLAGEM
    jQuery(document).ready(function($) { 
        $(".scroll").click(function(event){        
            event.preventDefault();
            window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
            $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
       });
    });
    
    timetoscroll = "";
    $(window).scroll(function(e){
          clearTimeout(timetoscroll);
          var posY = (document.documentElement.scrollTop) ? document.documentElement.scrollTop : window.pageYOffset;
      timetoscroll = setTimeout(function(){
        if(posY > 200){
          $('#header2').fadeIn();
        }
        if(posY < 200){
          $('#header2').fadeOut();      
        }
      },100);
    });
    $('#slideshow').lightSlider({
        item:1,
        thumbItem:0,
        slideMargin: 0,
        speed:500,
        pause:5000,
        pauseOnHover:true,
        pager: false,
        auto:true,
        // loop:true,
        onAfterSlide: function (el) {
            $('.texto').removeClass('textoActive');
            $('.active').find('.texto').addClass('textoActive');
        }
    });
    $('#slideshow .active').find('.texto').addClass('textoActive');
    //FORM
    $('.form').submit(function(e){
        e.preventDefault();
        // alert('teste');
        $('.btn-padrao').attr('type','button');
        textoBotao = $(this).find('.btn-padrao').text();
        $('.btn-padrao').text('enviando...');
        $('.load').show();
        name = $(this).attr('id');
        $.ajax({
            url: 'php/'+name+'.php',
            data: new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: "html",
            success:function(retorno){
               $('#retorno').html(retorno);
            }
        });
    });

    //FORM
    $('.form2').submit(function(e){
        e.preventDefault();
        // alert('teste');
        $('.btn-padrao').attr('type','button');
        textoBotao = $(this).find('.btn-padrao').text();
        $('.btn-padrao').text('enviando...');
        $('.load').show();
        name = $(this).attr('id');
        $.ajax({
            url: '../php/'+name+'.php',
            data: new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: "html",
            success:function(retorno){
               $('#retorno').html(retorno);
            }
        });
    });

     //ADICIONA PRODUTO CARRINHO
    $('.adiciona_carrinho').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '../php/carrinho_funcoes.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: "html"
        }).done(function(data){
            $('#myModalAdd').modal()
            $('#myModalAdd .modal-body').html(data);
        });
    });

    //REMOVER PRODUTO CARRINHO
    $('.remove-produto').click(function(){
        idproduto = $(this).attr('id');
        $.ajax({
            url: 'php/carrinho_funcoes.php',
            data:{id:idproduto, acao:"del"},
            type: 'POST',
            dataType: "html"
        }).done(function(data){
            location.reload();
        })
    });

    //ATUALIZAR PRODUTO CARRINHO
    $('.atualiza-produto').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'php/carrinho_funcoes.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: "html"
        }).done(function(data){
            location.reload();
        })
    });

    $('.finaliza-orcamento').click(function(){
        var hcarrinho = $('.carrinho').height();
        var hcarrinho = hcarrinho + 400;
        $('body').animate({scrollTop:hcarrinho}, '500');
        $("#formulario-orcamento").slideDown();
    });

    $('.texto').summernote({height: 300});

    $('.fixo').mask('(99) 9999-9999');
    $('.cel').mask('(99) 99999-9999');
    $('.cep').mask('00000-000');
    $('.loja_cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.data_nascimento').mask('00/00/0000');
    $('.valor').mask('000.000.000.000.000,00', {reverse: true});
});
