$(document).ready(function(){

    $('#login-admin').submit(function (e) {
        e.preventDefault();
        var $btn = $("button").button('loading');
        $.ajax({
            url: 'php/'+$(this).attr('id')+'.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: "json",
            success: function(retorno){
                if(retorno["error"] == 1){
                    $(".recebeTexto").html(retorno["mensagem"]);
                    $(".myModal").modal('show');
                    $btn.button('reset');
                }else{
                    window.location.href = "admin.php";
                }
            }
        });
        return false;
    });
    $('#logout-admin').click(function (){
        $.ajax({
            url: 'php/'+$(this).attr('id')+'.php',
            success: function(retorno){
                window.location.href = "login.php";
            }
        });
    });
    
    //Verifica se os campos com a classe requerido estão preenchidos
    $('input.requerido').change(function() {
        if($(this).val() == ''){
            $(this).parent().addClass("has-error").removeClass("has-success");
        }else{
            $(this).parent().addClass("has-success").removeClass("has-error");
        }
    });

    $('#usuario-cadastrar').submit(function(e) {
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
                //data: $(this).serialize(),
                
                data: new FormData(this),
                processData: false,
                contentType: false,
                
                type: 'POST',
                dataType: "json",
                success: function(retorno){
                    if(retorno["error"] == 0){
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=usuarios&submenu=usuario-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de usuários</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('.form')[0].reset();
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#usuario-alterar').submit(function(e) {
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
                //data: $(this).serialize(),
                
                data: new FormData(this),
                processData: false,
                contentType: false,
                
                type: 'POST',
                dataType: "json",
                success: function(retorno){
                    if(retorno["error"] == 0){
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=usuarios&submenu=usuario-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de usuários</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#responsavel-cadastrar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=responsavel-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de responsáveis</a> <a href='admin.php?menu=clientes&submenu=empresa-tabela' class='btn btn-primary'>Tabela de empresas <span class='fa fa-arrow-circle-right fa-fw'></span></a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('.form')[0].reset();
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#responsavel-alterar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=responsavel-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de responsáveis</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#empresa-cadastrar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=empresa-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de empresas</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('.form')[0].reset();
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#empresa-alterar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=empresa-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de empresas</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
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
    
    $('#exclusividade-cadastrar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=empresa-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de empresas</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
                        window.setTimeout('location.reload()', 2000); //Reloads after three seconds
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
    
    $('#exclusividade-alterar').submit(function(e) {
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
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=empresa-tabela' class='btn btn-primary'><span class='fa fa-arrow-circle-left fa-fw'></span> Tabela de empresas</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
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
    
    //Adicionar classe para mostrar checkbox em destaque
    $('input[type="checkbox"]:checked').parent().addClass('selecionado');
    $('input[type="checkbox"]').click(function(){
        if($(this).prop('checked')) {
            $(this).parent().addClass('selecionado');
            $(this).parents('.ul-principal:eq(0)').children().eq(0).children().eq(0).addClass('selecionado');
            $(this).parents('.ul-principal:eq(0)').children().eq(0).children().eq(0).children().eq(0).attr( 'checked', true );
        } else {
            $(this).parent().removeClass('selecionado');
        }
    });
    
    //Botão info ?
    $('.info').click(function(){
        var recebeTexto = $(this).children().html();
        $(".recebeTexto").html(recebeTexto);
        $(".myModal").modal('show');
    });
    
    $('#webdesign-cadastrar').submit(function(e) {
        e.preventDefault();
        
        var $btn = $("button").button('loading');
        $.ajax({
            url: 'php/'+$(this).attr('id')+'.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: "json",
            success: function(retorno){
                if(retorno["error"] == 0){
                    console.log(retorno);
                    $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=servicos-relatorio' class='btn btn-primary'><span class='fa fa-arrow-circle-right fa-fw'></span> Relatório de serviços</a>");
                    $(".myModal").modal('show');
                    $btn.button('reset');
                    $('.form')[0].reset();
                    $('input[type="checkbox"]').parent().removeClass('selecionado');
                }else{
                    console.log(retorno);
                    $(".recebeTexto").html(retorno["mensagem"]);
                    $(".myModal").modal('show');
                    $btn.button('reset');
                }
            }
        });
    });
    
    $('#publicidade-cadastrar').submit(function(e) {
        e.preventDefault();
        
        var $btn = $("button").button('loading');
        $.ajax({
            url: 'php/'+$(this).attr('id')+'.php',
            data: $(this).serialize(),
            type: 'POST',
            dataType: "json",
            success: function(retorno){
                if(retorno["error"] == 0){
                    console.log(retorno);
                    $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='admin.php?menu=clientes&submenu=servicos-relatorio' class='btn btn-primary'><span class='fa fa-arrow-circle-right fa-fw'></span> Relatório de serviços</a>");
                    $(".myModal").modal('show');
                    $btn.button('reset');
                    $('.form')[0].reset();
                    $('input[type="checkbox"]').parent().removeClass('selecionado');
                }else{
                    console.log(retorno);
                    $(".recebeTexto").html(retorno["mensagem"]);
                    $(".myModal").modal('show');
                    $btn.button('reset');
                }
            }
        });
    });
    
    //limpar COOKIE com o id guardado
    $('.limpar-selecao').click(function(){
        $.removeCookie('pegaId');
        window.location.href=window.location.href;
    });
    
    $('.contrato-valores').focusout(function() {
        
        var valorTotal = $("input[name=valorTotal]").val();
        if(valorTotal == ''){ valorTotal = '0,00'; }
        valorTotal = valorTotal.replace('.', '');
        valorTotal = valorTotal.replace(',', '.');
        valorTotal = parseFloat(valorTotal);
        
        var parcelas = $("input[name=parcelas]").val();
        if(parcelas == ''){ parcelas = 0; }
        parcelas = parseFloat(parcelas);
        
        var valorEntrada = $("input[name=valorEntrada]").val();
        if(valorEntrada == ''){ valorEntrada = '0,00'; }
        valorEntrada = valorEntrada.replace('.', '');
        valorEntrada = valorEntrada.replace(',', '.');
        valorEntrada = parseFloat(valorEntrada);
        
        var valorPrimeira = $("input[name=valorPrimeira]").val();
        if(valorPrimeira == ''){ valorPrimeira = '0,00'; }
        valorPrimeira = valorPrimeira.replace('.', '');
        valorPrimeira = valorPrimeira.replace(',', '.');
        valorPrimeira = parseFloat(valorPrimeira);
        if(valorPrimeira > 0){
            parcelas -= 1;
        }
        
        $("input[name=valorParcelas]").val($.number( ((valorTotal)-(valorEntrada+valorPrimeira))/parcelas , 2, ',', '.' ));
    });
    
    $('#contrato-cadastrar').submit(function(e) {
        e.preventDefault();
        
        var passou = 0;
        $(this).find('input.requerido').each(function(){
            if($(this).val() == ''){
                passou ++;
                $(this).parent().addClass("has-error").removeClass("has-success");
                $(this).focus();
            }else{
                $(this).parent().addClass("has-success").removeClass("has-error");
            }
        });
        valor = parseInt($("input[name=valorTotal]").val());
        if(valor == 0){
            $(".recebeTexto").html("O valor total deve ser maior que 0");
            $(".myModal").modal('show');
            return false;
        }
        if(passou == 0){
            var $btn = $("button").button('loading');
            $.ajax({
                url: 'php/'+$(this).attr('id')+'.php',
                data: $(this).serialize(),
                type: 'POST',
                dataType: "json",
                success: function(retorno){
                    if(retorno["error"] == 0){
                        console.log(retorno);
                        $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='contrato.php"+retorno["data"]+"' class='btn btn-primary'>Visualizar contrato</a>");
                        $(".myModal").modal('show');
                        $btn.button('reset');
                        $('input.requerido').parent().removeClass("has-success");
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
    
});