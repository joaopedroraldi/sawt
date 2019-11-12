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
<h1>Formulário de Briefing para ARTE GRÁFICA</h1>
Preencha todos os campos com o máximo de precisão e clareza possível, pois serão o nosso guia para desenvolver a arte perfeita para o seu Projeto!
<div class="clear30"></div>
<form id="enviar_briefing_arte_grafica" name="enviar_briefing_arte_grafica" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="Arte gráfica">
	
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
	
	<h3>O que deverá ser feito?</h3>
	<input type="text" class="form-control" name="br_pergunta_1">
	<h3>Quais as medidas do material?</h3>
	<input type="text" class="form-control" placeholder="Ex: 1920px x 600px" name="br_pergunta_2">
	<h3>Onde será aplicado/colocado/utilizado?</h3>
	<input type="text" class="form-control" name="br_pergunta_3">
	<h3>Quais cores devem ser utilizadas?</h3>
	<input type="text" class="form-control" name="br_pergunta_4">
	<h3>Qual é a ideia da comunicação?</h3>
	<textarea class="form-control" name="br_pergunta_5"></textarea>
	<h3>Dê exemplos de como gostaria?</h3>
	<textarea class="form-control" name="br_pergunta_6"></textarea>

	Se deseja enviar materiais como fotos ou outros materiais, envie para o e-mail mkt@webthomaz.com.br
	<div class="clear20"></div>
	<div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">

</script>