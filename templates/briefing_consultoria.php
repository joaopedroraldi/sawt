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
<h1>Formulário de Briefing para CONSULTORIA</h1>
Preencha todos os campos com o máximo de precisão e clareza possível, pois serão o nosso guia para desenvolver a Consultoria perfeita para o seu Projeto! Seja bem-vindo a Web Thomaz Negócios Digitais! Vamos em frente, vamos Juntos!
<div class="clear30"></div>
<form id="enviar_briefing_consultoria" name="enviar_briefing_consultoria" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="Consultoria">
	<h3>Responsável pelo projeto</h3>
	<div class="row">
		<div class="col-sm-4">
			<label>Nome</label>
			<input type="text" class="form-control" name="br_nome_responsavel">
		</div>
		<div class="col-sm-4">
			<label>Telefone</label>
			<input type="text" class="form-control" name="br_telefone">
		</div>
		<div class="col-sm-4">
			<label>E-mail</label>
			<input type="text" class="form-control" name="br_email">
		</div>
	</div>
	<br>
	<h3>Qual é o tipo de consultoria contratado?</h3>
	<label><input type="checkbox" value="Facebook" name="br_tipo_consultoria[]"> Facebook</label> <br>
	<label><input type="checkbox" value="Instagram" name="br_tipo_consultoria[]"> Instagram</label> <br>
	<label><input type="checkbox" value="Google" name="br_tipo_consultoria[]"> Google</label> <br>
	<label><input type="checkbox" value="E-mails" name="br_tipo_consultoria[]"> E-mails</label> <br>
	<label><input type="checkbox" value="Produto Digital" name="br_tipo_consultoria[]"> Produto Digital</label> <br>
	<label><input type="checkbox" value="Presença online" name="br_tipo_consultoria[]"> Presença online</label> <br>
	<label><input type="checkbox" value="Copywriter" name="br_tipo_consultoria[]"> Copywriter</label> <br>
	<label><input type="checkbox" value="Vendas" name="br_tipo_consultoria[]"> Vendas</label> <br>
	<label><input type="checkbox" value="Atendimento" name="br_tipo_consultoria[]"> Atendimento</label> <br>
	<label><input type="checkbox" value="Anúncios Patrocinados" name="br_tipo_consultoria[]"> Anúncios Patrocinados</label> <br>
	
	<h3>O que é o seu negócio?</h3>
	Descreva com o máximo de detalhes possível
	<input type="text" class="form-control" name="br_pergunta_1">
	<h3>Já tem site ou redes sociais? se sim, qual o link?</h3>
	<input type="text" class="form-control" name="br_pergunta_2">
	<h3>Quantos anos tem a sua empresa?</h3>
	<input type="text" class="form-control" name="br_pergunta_3">
	<h3>Quantos funcionários?</h3>
	<input type="text" class="form-control" name="br_pergunta_4">
	<h3>Seu negócio é online, físico ou você vai até o cliente?</h3>
	<textarea class="form-control" name="br_pergunta_5"></textarea>
	<h3>Como você descreveria seus produtos e serviços?</h3>
	<textarea class="form-control" name="br_pergunta_6"></textarea>
	<h3>Quais as metas a longo prazo do seu projeto? </h3>
	<textarea class="form-control" name="br_pergunta_7"></textarea>
	<h3>Por quê busca a consultoria e qual é a sua expectativa?</h3>
	<textarea class="form-control" name="br_pergunta_8"></textarea>
	<h3>Quais são os seus concorrentes e se eles tiverem site ou redes sociais, liste-os</h3>
	<textarea class="form-control" name="br_pergunta_9"></textarea>
	<h3>Qual o seu diferencial perante seus concorrentes? </h3>
	<textarea class="form-control" name="br_pergunta_10"></textarea>
	<h3>Qual o perfil do seu público? </h3>
	Especialista, pragmático, seguidor, fã, oportunista, inseguro, certeiro, pesquisador, curioso, barateiro, gosta de qualidade, rapidez, garantia, prazo, durabilidade, resultados, entre outros
	<textarea class="form-control" name="br_pergunta_11"></textarea>
	<h3>Como é o seu cliente?</h3>
	Es sexo, idade, região, comportamento, religião, politica, gostos, estilo de vida, classe social, estado civil, pais, filhos, mora em casa, apartamento, entre outros
	<textarea class="form-control" name="br_pergunta_12"></textarea>
	<h3>Quais são as categorias/departamentos de produtos ou serviços que você pretende desenvolver?</h3>
	<input type="text" class="form-control" name="br_pergunta_13">
	<h3>Liste quais são os conteúdos que deveremos desenvolver?</h3>
	<input type="text" class="form-control" name="br_pergunta_14">
	<h3>Como você vende hoje?</h3>
	<input type="text" class="form-control" name="br_pergunta_15">
	<h3>Você tem uma equipe de vendas?</h3>
	<input type="text" class="form-control" name="br_pergunta_16">
	<h3>Quais serão as formas de contato para o seu cliente chegar até você?</h3>
	<input type="text" class="form-control" name="br_pergunta_17">
	<h3>Qual é a sua ideia e como gostaria de vender com a nossa consultoria?</h3>
	<input type="text" class="form-control" name="br_pergunta_18">
	<h3>Quanto está disposto a investir em anúncios mensalmente?</h3>
	<input type="text" class="form-control" name="br_pergunta_19">
	<h3>Quais são os adjetivos que melhor descrevem a sua empresa?</h3>
	<input type="text" class="form-control" name="br_pergunta_20">
	<h3>Que mensagem e qual sensação quer que os nossos conteúdos devem transmitir?</h3>
	<input type="text" class="form-control" name="br_pergunta_21">
	<h3>Cite pelo menos 5 empresas que você gosta, independente que seja de outro segmento, e diga o que gosta em particular de cada um:</h3>
	<textarea class="form-control" name="br_pergunta_22"></textarea>
	<h3>INFORMAÇÕES ADICIONAIS: FALE O QUE MAIS QUISER A VONTADE E COMO DESEJA QUE A NOSSA EQUIPE TRABALHE?</h3>
	Seriedade, compromisso, rápido, de vagar, criativo, conservador, entre outras formas
	<textarea class="form-control" name="br_pergunta_23"></textarea>

	<br>
	Agradecemos pelas informações fornecidas! A nossa equipe já está com o seu projeto na pauta dos  nossos especialistas e nos esforçaremos para superar suas expectativas! Qualquer dúvida não deixe de entrar em contato conosco ok!

	<b>MÃO NA MASSA!</b>
	<div class="clear20"></div>
	<div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">

</script>