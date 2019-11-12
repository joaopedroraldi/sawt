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
<h1>Formulário de Briefing para LOGOTIPO</h1>
Preencha todos os campos com o máximo de precisão e clareza possível, pois serão o nosso guia para desenvolver a arte perfeita para o seu Projeto!
<div class="clear30"></div>
<form id="enviar_briefing_logotipo" name="enviar_briefing_logotipo" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="Logotipo">
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
	
	<h3>Qual é o plano contratado?</h3>
	<select class="form-control" name="pergunta_1">
		<option value="SIMPLES">SIMPLES</option>
		<option value="INTERMEDIÁRIO">INTERMEDIÁRIO</option>
		<option value="IDEAL">IDEAL</option>
		<option value="PREMIUM">PREMIUM</option>
	</select>
	<br><br>Aqui precisamos que você fale sobre o seu negócio, pra gente te conhecer melhor e saber qual linha de raciocínio seguir :)
	<h3>O que é?</h3>
	<input type="text" class="form-control" name="br_pergunta_2">
	<h3>Tem site ou redes sociais? se sim, qual o link?</h3>
	<input type="text" class="form-control" name="br_pergunta_3">
	<h3>Qual nome e elementos deverão compor o logo? </h3>
	<input type="text" class="form-control" name="br_pergunta_4">
	<h3>Como você descreveria seus produtos e serviços?</h3>
	<textarea class="form-control" name="br_pergunta_5"></textarea>
	<h3>Quais as metas a longo prazo do seu projeto?</h3>
	<textarea class="form-control" name="br_pergunta_6"></textarea>
	<h3>Por quê busca um novo logotipo e quais as sensações deverão ser passadas através dele?</h3>
	<textarea class="form-control" name="br_pergunta_7"></textarea>
	<h3>Quais são os seus concorrentes e se eles tiverem site, liste-os</h3>
	<textarea class="form-control" name="br_pergunta_8"></textarea>
	<h3>Qual o seu diferencial perante seus concorrentes?</h3>
	<textarea class="form-control" name="br_pergunta_9"></textarea>
	<h3>Qual o perfil do seu público?</h3>
	<textarea class="form-control" name="br_pergunta_10"></textarea>
	<h3>Possui algum slogan?</h3>
	<input type="text" class="form-control" name="br_pergunta_11">
	<h3>Qual é a sua ideia ou algo que gostaria que tivesse no logotipo?</h3>
	<textarea class="form-control" name="br_pergunta_12"></textarea>
	<h3>Possui preferencia de cor?</h3>
	<input type="text" class="form-control" name="br_pergunta_13">
	<h3>Existe alguma cor que não gostaria?</h3>
	<input type="text" class="form-control" name="br_pergunta_14">
	<h3>Algum ícone gostaria de ter?</h3>
	<input type="text" class="form-control" name="br_pergunta_15">
	<h3>Quais são os adjetivos que melhor descrevem o seu logotipo?</h3>
	<input type="text" class="form-control" name="br_pergunta_16">
	<h3>Que mensagem e qual sensação quer que o logotipo transmita?</h3>
	<input type="text" class="form-control" name="br_pergunta_17">
	<h3>Cite pelo menos 5 logotipos que você gosta, independente que seja de outro segmento, e diga o que gosta em particular de cada um: </h3>
	<textarea class="form-control" name="br_pergunta_18"></textarea>
	<h3>Como você deseja que apareça a tipografia? ( negrito, itálico, manuscrita, informal, ligth, etc)</h3>
	<input type="text" class="form-control" name="br_pergunta_19">
	<h3>Onde usará o logotipo?</h3>
	<input type="text" class="form-control" name="br_pergunta_20">
	<h3>Informações adicionais: fale o que mais quiser a vontade e como deseja que a nossa equipe trabalhe (seriedade, compromisso, rápido, de vagar, criativo, conservador, entre outras formas)</h3>
	<textarea class="form-control" name="br_pergunta_21"></textarea>

	<div class="clear20"></div>
	Agradecemos pelas informações fornecidas! A nossa equipe já está com o seu projeto na pauta da Criação e nos esforçaremos para superar suas expectativas! Qualquer dúvida não deixe de entrar em contato conosco ok!<br>
	<b>MÃO NA MASSA!</b>
	<div class="clear20"></div>
	<div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
	<div class="clear20"></div>
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">

</script>