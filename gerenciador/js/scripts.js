$(document).ready(function(){

    $('#header .fa-bars').click(function(){
        $('.navegacao-mobile').slideToggle(200);
    });

    $('.menu > li').click(function(){
        $(this).children('ul').slideToggle();
    });

    $('#multiescolha').on('change', function(e) {
        e.preventDefault();
        escolha = $(this).val();
        escolha_titulo = $('option:selected', this).attr('titulo');
        conteudoescolha = $('#multiescolhas').html();
        $('#multiescolhas').html(conteudoescolha + '<div class="checkEscolha">' + escolha_titulo+' <input type="checkbox" name="multiescolha[]" value="'+escolha+'" checked="checked"></div>')

        $('.checkEscolha').click(function(){
            $(this).html('');
            $(this).fadeOut();
        });
    });


    $('.checkEscolha').click(function(){
        $(this).html('');
        $(this).fadeOut();
    });

    //FORM
    $('.form').submit(function(e){
        $('.load').show();
        e.preventDefault();
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

    //CONFIGURAÇÕES
    $('.bt-deletar').click(function(e){
        tabela = $(this).attr('tabela');
        idreg = $(this).attr('idreg');
        arquivo = $(this).attr('arquivo');
        swal({
            title: "Deseja mesmo deletar?",
            type: "warning",
            confirmButtonColor: "#D9534F",
            confirmButtonText: "Sim, quero deletar",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },function(){
            $('.load').show();
            e.preventDefault();
            $.ajax({
                url: 'php/'+arquivo+'.php',
                data: {idreg:idreg,tabela:tabela},
                type: 'POST',
                dataType: "html",
                success:function(retorno){
                   $('#retorno').html(retorno);
                }
            });
        });
    });


    $('.foto-deletar').click(function(e){
        e.preventDefault();
        foto = '../'+$(this).attr('endereco');
        $.ajax({
            url: 'php/foto_deletar.php',
            data: {foto:foto},
            type: 'POST',
            dataType: 'html',
            success:function(retorno){
               window.location.reload();
            }
        });
    });


    $('#uploader_start').click(function(){
        setInterval(function(){
            porcentagem = $('span.plupload_total_status').text();
            if(porcentagem == '100%'){
               window.location.reload();
            }
        },100);
    });

    $('.registrodata').mask('00/00/0000');


    $('.btn-ordem').click(function(){
        $("#paginas_ordem").stop().fadeToggle(100);
    })
    $("#sortable").sortable();
    $("#sortable").disableSelection();



    $('#paginas_ordem').submit(function(e){
        e.preventDefault();

        cont = 0;
        $('#sortable li').each(function(){
            cont++;
            $(this).find('input').val(cont);
        });

        $.ajax({
            url: 'php/ordem_alterar.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: 'html',
            success:function(retorno){
               window.location.reload();
            }
        });
    });

    $('#enviar_suporte').submit(function(e) {
        $('.load').show();
        e.preventDefault();
        var passou = 0;
        $(this).find('.requerido').each(function(){
            if($(this).val() == ''){
                passou ++;
                $(this).parent().addClass("has-error").removeClass("has-success");
            }else{
                $(this).parent().addClass("has-success").removeClass("has-error");
            }
        });
        if(passou == 0){
            $.ajax({
                url: 'php/enviar_suporte.php',
                data: $(this).serialize(),
                type: 'POST',
                dataType: "html",
                success:function(retorno){
                    $('.load').hide();
                    swal({
                        title: "Mensagem enviada com sucesso!",
                        type: "success",
                        confirmButtonColor: "#222",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false
                    },function(){
                        window.location='?page=home';
                    });
                }
            });
        }
    });

    $('.visualizar').click(function(){
        // e.preventDefault();
        table = $(this).attr('table');
        mensagemId = $(this).attr('mensagemId');
        $.ajax({
            url: 'php/visualizar.php',
            data: {mensagemId:mensagemId, table:table},
            type: 'POST',
            dataType: 'html'
        });
        $(this).parent('h4').parent('.panel-heading').removeClass('opacity1').addClass('opacity05');
        $(this).find('.icone').html('<i class="fa fa-envelope-open"></i>');
    });

    $('.naolida').click(function(){
        // e.preventDefault();
        table = $(this).attr('table');
        mensagemId = $(this).attr('mensagemId');
        $.ajax({
            url: 'php/naolida.php',
            data: {mensagemId:mensagemId, table:table},
            type: 'POST',
            dataType: 'html',
            success:function(retorno){
               window.location.reload();
            }
        });
    });

    $('.mensagemDeletar').click(function(){
        // e.preventDefault();
        table = $(this).attr('table');
        mensagemId = $(this).attr('mensagemId');
        $.ajax({
            url: 'php/mensagem-deletar.php',
            data: {mensagemId:mensagemId, table:table},
            type: 'POST',
            dataType: 'html',
            success:function(retorno){
               window.location.reload();
            }
        });
    });


    //FORM
    $('#notificar').submit(function(e){
        $('.load').show();
        e.preventDefault();
        $.ajax({
            url: 'php/notificar.php',
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

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $(".rua").val("");
        $(".bairro").val("");
        $(".estado").val("");
        $(".endereco").val("");
    }

    //Quando o campo cep perde o foco.
    $(".cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        var input = $(this);

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                // $("#rua").val("...");
                // $("#bairro").val("...");
                $('.autocom').text('Buscando informações...');

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $(".cidade").val(dados.localidade);
                        $(".bairro").val(dados.bairro);
                        $(".estado").val(dados.uf);
                        $(".rua").val(dados.logradouro);
                        $('.autocom').text('');
                        cep_valido(input);
                    } else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        cep_naoEncontrado(input);
                    }
                });
            } else {
                //cep é inválido.
                limpa_formulário_cep();
                cep_invalido(input);
            }
        } else {
            limpa_formulário_cep();
            cep_invalido(input);
        }
    });

    function cep_invalido(input) {
        console.clear();
        console.log("Cep inválido /!\ ");
        $('.autocom').text("Cep inválido!");
        input.removeClass('is-valid');
        input.addClass('is-invalid');
    }
    function cep_valido(input) {
        console.clear();
        console.log("Cep válido :)");
        $('.autocom').text("");
        input.removeClass('is-invalid');
        input.addClass('is-valid');
    }
    function cep_naoEncontrado(input) {
        console.clear();
        console.log("Cep não encontrado :(");
        $('.autocom').text("Cep não encontrado!");
        input.removeClass('is-valid');
        input.addClass('is-invalid');
    }

    $('.fixo').mask('(99) 9999-9999');
    $('.cel').mask('(99) 99999-9999');
    $('.cep').mask('00.000-000');
    $('.valor').mask('000.000.000.000.000,00', {reverse: true});
});
