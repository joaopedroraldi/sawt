<?php 
	$query = "SELECT registros_id FROM registros WHERE registros_cliente_key = '{$_GET['c']}'";
	$cliente = mysqli_query($config, $query);
	$row_cliente = mysqli_fetch_assoc($cliente);
?>
<style type="text/css">
	h3{margin-top:60px; font-weight: bold; color: #000}
	.label_radio{width: 100%; float: left; padding: 15px; border-bottom:solid 1px #eee;}
	.label_radio p{font-weight: normal;}
	/*.label_radio input{opacity: 0;}*/
</style>
<h1>Formulário de Briefing para WEBSITE</h1>
Preencha todos os campos com o máximo de precisão e clareza possível, pois serão o nosso guia para desenvolver o Web Site perfeito para o seu Projeto! Seja bem-vindo a Web Thomaz Negócios Digitais! Vamos em frente, vamos Juntos!
<div class="clear30"></div>
<form id="enviar_briefing_website" name="enviar_briefing_website" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="Website">
	<h3>Qual é o nome do seu negócio?</h3>
	<input type="text" class="form-control" name="br_nome">
	
	<h3>Dados de contato que deverão constar no site</h3>
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
		<div class="col-sm-6">
			<label>Telefone</label>
			<input type="text" class="form-control" name="br_telefone">
		</div>
		<div class="col-sm-6">
			<label>E-mail</label>
			<input type="text" class="form-control" name="br_email">
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

	<h3>Já tem um site? Se sim, qual é o link?</h3>
	<input type="text" class="form-control" name="br_pergunta_1">
	<h3>Já tem um domínio? Se não, qual será o domínio?</h3>
	<input type="text" class="form-control" placeholder="ex: suaempresa.com.br" name="br_pergunta_2">
	<h3>Fale sobre seu negócio:</h3>
	<textarea class="form-control" placeholder="Descreva desde a atividade do negócio até produtos e serviços" name="br_pergunta_3"></textarea>
	<h3>Qual é o seu objetivo com o site?</h3>
	<textarea class="form-control" placeholder="" name="br_pergunta_4"></textarea>
	<h3>Cite alguns concorrentes, se possível liste os sites deles:</h3>
	<textarea class="form-control" placeholder="" name="br_pergunta_5"></textarea>
	<h3>Qual é o perfil do seu público?</h3>
	<input type="text" class="form-control" name="br_pergunta_6">

	<h3>Selecione o tipo de site</h3>
	<label class="label_radio">
		<input type="radio" name="br_tipo_site" required="required" value="Institucional">
		<b>Institucional</b><br>
		<p>Site que visa a autoridade da marca, mostrar serviços e/ou produtos, falar sobre a empresa.</p>
		</label>
	</label>
	<label class="label_radio">
		<input type="radio" name="br_tipo_site" required="required" value="Blog">
		<b>Blog</b><br>
		<p>Site para postagens de artigos e notícias tendo o objetivo de divulgação de conteúdo.</p>
	</label>
	<label class="label_radio">
		<input type="radio" name="br_tipo_site" required="required" value="Catálogo">
		<b>Catálogo</b><br>
		<p>Site que tem além das características do site institucional, tem também o diferencial de mostrar todo o catálogo de produtos de sua empresa de forma mais detalhada, separando todos os produtos em categorias, subcategorias, foto, referência, descrição e um buscador para facilitar.</p>
	</label>
	<label class="label_radio">
		<input type="radio" name="br_tipo_site" required="required" value="Orçamentário">
		<b>Orçamentário</b><br>
		<p>Um site orçamentário tem todas as funcionalidades do site instucional e catálogo, porém tem a funcionalidade de fornecer um carrinho de orçamento, onde o usuário que acessa o seu site pode escolher os produtos do catálogo separando-os em um carrinho e enviando um orçamento diretamente no seu e-mail ou painel administrativo, com a relação dos produtos e quantidade de cada um.</p>
	</label>
	<label class="label_radio">
		<input type="radio" name="br_tipo_site" required="required" value="Personalizado">
		<b>Personalizado</b><br>
		<p>Caso seu site tenha outro modelo e funcionalidades que não se encaixam em nenhuma das opções acima, descreva por favor abaixo como o seu site precisa ser.</p>
	</label>
	<div class="clear20"></div>
	<h3>Que páginas o site deverá ter?</h3>
	<textarea class="form-control" placeholder="Ex: Home / Empresa / Serviços / Produtos / Contato" name="br_pergunta_7"></textarea>
	

	<h3>Qual será o estilo e cores?</h3>
	<input type="text" class="form-control" name="br_pergunta_8">

	<h3>Existe algum ou alguns sites que você tem como referência? Liste os links.</h3>
	<input type="text" class="form-control" name="br_pergunta_9">

	<h3>Descreva abaixo qualquer informação adicional que queria nos passar para que seu site fique completo.</h3>
	<textarea class="form-control" name="br_pergunta_10"></textarea>
	Envie todo o material e conteúdo do site no e-mail desenvolvimento@webthomaz.com.br
	<div class="clear20"></div>
	<div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">
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
</script>