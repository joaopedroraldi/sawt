<?php 
	$query = "SELECT registros_id FROM registros WHERE registros_cliente_key = '{$_GET['c']}'";
	$cliente = mysqli_query($config, $query);
	$row_cliente = mysqli_fetch_assoc($cliente);
?>
<style type="text/css">
	h3{margin-top:60px; font-weight: bold; color: #000}
	.label_radio{width: 100%; float: left; padding: 15px; border-bottom:solid 1px #eee;}
	.label_radio p{font-weight: normal;}
	/*.contap{display: none;}*/
	/*.label_radio input{opacity: 0;}*/
</style>
<h1>Formulário de Briefing para E-commerce</h1>
Preencha com atenção as informações solicitadas nesse formulário para início de desenvolvimento do e-commerce.
As informações são necessárias para que a sua loja virtual possa ser desenvolvida o mais rápido possível e estar online de acordo com o Decreto Federal 7.962/13 – A Lei do E-commerce. Eventuais informações adicionais serão combinadas e negociadas.
<div class="clear30"></div>
<form id="enviar_briefing_ecommerce" name="enviar_briefing_ecommerce" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="E-commerce">
	<h3>Dados de contato do responsável</h3>
	Esses dados não serão divulgados necessariamente dentro do E-commerce, são dados apenas para cadastros.
	<div class="clear10"></div>
	<div class="row">
		<div class="col-sm-6">
			<label>Nome completo:</label>
			<input type="text" class="form-control" name="br_nome_completo">
		</div>
		<div class="col-sm-6">
			<label>CPF:</label>
			<input type="text" class="form-control cpf" name="br_cpf">
		</div>
		<div class="col-sm-4">
			<label>Data de nascimento:</label>
			<input type="text" class="form-control data_nascimento" name="br_data_nascimento">
		</div>
		<div class="col-sm-4">
			<label>Celular</label>
			<input type="text" class="form-control cel" name="br_celular">
		</div>
		<div class="col-sm-4">
			<label>E-mail</label>
			<input type="text" class="form-control" name="br_email">
		</div>
	</div>
	<h3>Endereço do responsável</h3>
	Endereço residencial, ou endereço da empresa desde que tenha comprovante de residência no nome do responsável
	<div class="clear10"></div>
	<div class="row">
		<div class="col-sm-12">
			<label>CEP</label>
			<input type="text" class="form-control cep" name="br_cep">
			<div class="autocom"></div>
		</div>
		<div class="col-sm-6">
			<label>Cidade</label>
			<input type="text" class="form-control cidade" name="br_cidade">
		</div>
		<div class="col-sm-6">
			<label>Estado</label>
			<input type="text" class="form-control estado" name="br_estado">
		</div>
		<div class="col-sm-4">
			<label>Bairro</label>
			<input type="text" class="form-control bairro" name="br_bairro">
		</div>
		<div class="col-sm-4">
			<label>Endereço</label>
			<input type="text" class="form-control rua" name="br_endereco">
		</div>
		<div class="col-sm-4">
			<label>Número</label>
			<input type="text" class="form-control" name="br_numero">
		</div>
	</div>
	<h3>Documentos do responsável</h3>
	<div class="row">
		<div class="col-sm-6">
			<label>
				CNH ou RG Frente
			</label>
			<input type="file" class="form-control" name="br_doc">
		</div>
		<div class="col-sm-6">
			<label>
				CNH ou RG Verso
			</label>
			<input type="file" class="form-control" name="br_doc_verso">
		</div>
		<div class="col-sm-12">
			<label>
				Selfie do responsável segurando o documento
			</label>
				<input type="file" class="form-control" name="br_doc_selfie">
		</div>
		<div class="col-sm-12">
			<label>
				Comprovante de residência
			</label><br>
			Comprovante deve estar no nome e endereço do responsável
			<input type="file" class="form-control" name="br_doc_cresidencia">
		</div>
	</div>
	
	<h3>Dados de contato que deverão constar no site</h3>
	<label>
	<input type="hidden" name="br_contatos_site" value="0">
	<input id="contatos_site_check" type="checkbox" name="br_contatos_site" value="1">
	Quero usar os mesmos dados do responsável
	</label>
	<div class="clear20"></div>

	<div id="contatos_site" class="row">
		<div class="col-sm-6">
			<label>Razão social</label>
			<input type="text" class="form-control" name="br_loja_razao_social">
		</div>
		<div class="col-sm-6">
			<label>CNPJ</label>
			<input type="text" class="form-control cnpj" name="br_loja_cnpj">
		</div>
		<div class="col-sm-4">
			<label>CEP</label>
			<input type="text" class="form-control loja_cep" name="br_loja_cep">
			<div class="loja_autocom"></div>
		</div>
		<div class="col-sm-4">
			<label>Cidade</label>
			<input type="text" class="form-control loja_cidade" name="br_loja_cidade">
		</div>
		<div class="col-sm-4">
			<label>Estado</label>
			<input type="text" class="form-control loja_estado" name="br_loja_estado">
		</div>
		<div class="col-sm-4">
			<label>Bairro</label>
			<input type="text" class="form-control loja_bairro" name="br_loja_bairro">
		</div>
		<div class="col-sm-4">
			<label>Endereço</label>
			<input type="text" class="form-control loja_rua" name="br_loja_endereco">
		</div>
		<div class="col-sm-4">
			<label>Número</label>
			<input type="text" class="form-control" name="br_loja_numero">
		</div>
		<div class="col-sm-6">
			<label>Telefone</label>
			<input type="text" class="form-control" name="br_loja_telefone">
		</div>
		<div class="col-sm-6">
			<label>E-mail</label>
			<input type="text" class="form-control" name="br_loja_email">
		</div>
	</div>

	<h3>Redes sociais</h3>
	<div class="row">
		<div class="col-sm-6">
			<label>Facebook</label>
			<input type="text" placeholder="Coloque o link caso tenha facebook" class="form-control" name="br_facebook">
		</div>
		<div class="col-sm-6">
			<label>Instagram</label>
			<input type="text" placeholder="Coloque o link caso tenha instagram" class="form-control" name="br_instagram">
		</div>
		<div class="col-sm-6">
			<label>Whatsapp</label>
			<input type="text" placeholder="Coloque o número caso tenha whatsapp" class="form-control" name="br_whatsapp">
		</div>
		<div class="col-sm-6">
			<label>Linkedin</label>
			<input type="text" placeholder="Coloque o link caso tenha linkedin" class="form-control" name="br_linkedin">
		</div>
		<div class="col-sm-6">
			<label>Youtube</label>
			<input type="text" placeholder="Coloque o link caso tenha youtube" class="form-control" name="br_youtube">
		</div>
	</div>

	<h3>Qual é o nome do seu negócio?</h3>
	<input type="text" class="form-control" name="br_nome">

	<h3>Que produtos serão vendidos na loja virtual?</h3>
	<input type="text" class="form-control" name="br_pergunta_1">

	<h3>Já tem um domínio? Se não, qual será o domínio?</h3>
	<input type="text" class="form-control" name="br_pergunta_2">

	<h3>Se possível, informe os departamentos que serão divididos os produtos</h3>
	Ex: Para uma loja de informática:(Computadores, Monitores, Impressoras, Acessórios, etc
	<input type="text" class="form-control" name="br_pergunta_3">

	<h3>Forma de pagamento (Mercado Pago)</h3>			
	<label><input required="required" type="radio" name="temcontamp" value="1"> Eu tenho conta no mercado pago</label><br>
	<label><input required="required" type="radio" name="temcontamp" value="2"> Eu não tenho conta no mercado pago, mas autorizo a Web Thomaz a criar uma com meus dados</label><br>
	<label><input required="required" type="radio" name="temcontamp" value="3"> Eu não tenho conta no mercado pago e quero usar outro gatway de pagamento</label><br>
	<div class="clear20"></div>

	<div class="contap" id="contamp">
		<textarea placeholder="Digite aqui o login e senha do mercado pago:" class="form-control" name="br_conta_mp"></textarea>
	</div>
	<div class="contap" id="contaoutra">
		<textarea placeholder="Digite aqui qual outro gatway de pagamento deseja usar, e se já tem, digite o login e senha:" class="form-control" name="br_conta_outra"></textarea>
		Iremos analizar se o gatway solicitado tem suporte e compatibilidade com a sua loja.
	</div>

	<h3>Política de entrega</h3>
	<textarea class="form-control texto" name="br_politica_entrega" placeholder="A política de entrega adotada pelo seu e-commerce precisa ser clara e os prazos bem explicados."></textarea>

	<h3>Contrato de compra</h3>
	<textarea class="form-control texto" name="br_contrato_de_compra" placeholder="Termos e condições, tudo o que o cliente precisa estar ciente ao fazer a compra"></textarea>
	<h3>Condições de troca e devolução</h3>
	<textarea class="form-control texto" name="br_condicoes_de_troca" placeholder="Termos e condições, tudo o que o cliente precisa estar ciente ao fazer a compra"></textarea>
	<h3>Dúvidas Frequentes (FAQ)</h3>
	<textarea class="form-control texto" name="br_duvidas_frequentes" ></textarea>


	<h3>Descreva abaixo qualquer informação adicional que queria nos passar para que sua loja virtual fique completa.</h3>
	<textarea class="form-control" name="br_pergunta_10"></textarea>
	Envie todo o material como logo e fotos para o e-mail suporte2@webthomaz.com.br
	<div class="clear20"></div>
	<div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">
	$('.contap').hide();
	$('input[name="temcontamp"]').change(function(){
		$('.contap').hide();
		// alert($(this).val());
		if($(this).val() == 1){
			$('#contamp').slideDown();
		}else if($(this).val() == 3){
			$('#contaoutra').slideDown();
		}
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

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                // $("#rua").val("...");
                // $("#bairro").val("...");
                $('.autocom').text('  ...Buscando informações');

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $(".cidade").val(dados.localidade);
                        $(".bairro").val(dados.bairro);
                        $(".estado").val(dados.uf);
                        $(".rua").val(dados.logradouro);
                        $('.autocom').text('');
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

	function loja_limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $(".loja_rua").val("");
        $(".loja_bairro").val("");
        $(".loja_estado").val("");
        $(".loja_endereco").val("");
    }
    
    //Quando o campo cep perde o foco.
    $(".loja_cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                // $("#rua").val("...");
                // $("#bairro").val("...");
                $('.loja_autocom').text('  ...Buscando informações');

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $(".loja_cidade").val(dados.localidade);
                        $(".loja_bairro").val(dados.bairro);
                        $(".loja_estado").val(dados.uf);
                        $(".loja_rua").val(dados.logradouro);
                        $('.loja_autocom').text('');
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            loja_limpa_formulário_cep();
        }
    });

	$('#contatos_site_check').click(function(){
		if ($(this).is(':checked')){
			$('#contatos_site').slideUp();
		}else{
			$('#contatos_site').slideDown();
		}
	});

	
</script>