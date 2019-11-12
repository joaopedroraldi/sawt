$(document).ready(function(){
    // with jQuery
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        // layout mode options
        masonry: {
            columnWidth: '.grid-sizer',
            percentPosition: true
        }
    });
    
    // filter functions
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan5: function () {
            var number = $(this).children().find('.number').text();
            //number = parseInt(number, 10) > 5;
            number = number.replace(/[^0-9]/gi, '');
            return parseInt(number, 10) > 5;
        },
        // show if name ends with -ium
        fodase: function () {
            var texto = $(this).children().find('.fodase').text();
            return texto.match(/fodase/gi);
        }
    };
    // bind filter button click
    $('.filters-button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        filterValue = filterFns[filterValue] || filterValue;
        $grid.isotope({
            filter: filterValue
        });
    });
    $('.empresas').change(function () {
        var filterValue = $(this).val();
        $.cookie('pegaId', filterValue) ;
        window.location.href=window.location.href;
        /*var filterValue = $(this).val();
        console.log(filterValue);
        filterValue = filterFns[filterValue] || filterValue;
        $grid.isotope({
            filter: filterValue
        });*/
    });
    // change is-checked class on buttons
    $('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function () {
            $buttonGroup.find('.btn-success').removeClass('btn-success').addClass('btn-primary');
            $(this).addClass('btn-success').removeClass('btn-primary');
        });
    });
    

    $.getJSON('php/servicos-tabela.php', function(data) {
        $.each(data, function(index) {
            var mensagem = data["mensagem"];
            var items = $(mensagem);
            $(".grid").append(items).isotope( 'appended', items, true );
            
            $('.contratoServico').click(function(){
                if($(this).prop('checked')) {
                    $(this).parents('.panel:eq(0)').addClass('panel-green').removeClass('panel-primary');
                } else {
                    $(this).parents('.panel:eq(0)').addClass('panel-primary').removeClass('panel-green');
                }
            });
            
            $('#servicos-selecionar').submit(function(e) {
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
                            $(".recebeTexto").html(retorno["mensagem"]+" <hr> <a href='?menu=clientes&submenu=contrato-cadastrar' class='btn btn-primary'>Ir para edição do contrato</a>");
                            $(".myModal").modal('show');
                            $btn.button('reset');
                            $('.form')[0].reset();
                            $('.panel-green').addClass('panel-primary').removeClass('panel-green');
                        }else{
                            console.log(retorno);
                            $(".recebeTexto").html(retorno["mensagem"]);
                            $(".myModal").modal('show');
                            $btn.button('reset');
                        }
                    }
                });
            });
            
        });
    });
    
});