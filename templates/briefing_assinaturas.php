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
	#opcoes input{opacity: 0}
	#opcoes label:hover img{transform:scale(1.05);}
	#opcoes label{cursor: pointer;}

</style>
<h1>Formulário de Assinaturas</h1>
Escolha uma assinatura e preencha os dados abaixo
<div class="clear30"></div>
<form id="enviar_briefing_assinaturas" name="enviar_briefing_assinaturas" enctype="multipart/form-data" role="form" class="form" method="post">
	<input type="hidden" name="cliente_id" value="<?php echo $row_cliente['registros_id'] ?>">
	<input type="hidden" name="briefing_nome" value="E-commerce">
	<h3>Dados de contato do responsável</h3>
	Esses dados não serão divulgados necessariamente dentro do E-commerce, são dados apenas para cadastros.
	<div class="clear10"></div>
	<div class="row">
		<div class="col-sm-4">
			<label>Nome do responsável pela solicitação</label>
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

	<h3>Escolha um modelo</h3>
</div>
<center>
	<div id="opcoes">
	<label>
		<input type="radio" name="br_modelo" value="opcao1">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao1.jpg">
	</label>
	<label>
		<input type="radio" name="br_modelo" value="opcao2">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao2.jpg">
	</label>
	<label>
		<input type="radio" name="br_modelo" value="opcao3">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao3.jpg">
	</label>
	<label>
		<input type="radio" name="br_modelo" value="opcao4">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao4.jpg">
	</label>
	<label>
		<input type="radio" name="br_modelo" value="opcao5">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao5.jpg">
	</label>
	<label>
		<input type="radio" name="br_modelo" value="opcao6">
		<img class="transition" src="<?php echo RAIZ ?>img/opcao6.jpg">
	</label>
	</div>
</center>

<div class="container">
	<h3>Adicione quantas assinaturas desejar</h3>
	<div class="row">
		<div class="col-sm-3">
			<input type="text" placeholder="Nome" class="form-control" name="ass_nome">
			<input type="text" placeholder="Cargo" class="form-control" name="ass_cargo">
			<input type="text" placeholder="E-mail" class="form-control" name="ass_email">
			<input type="text" placeholder="Celular" class="form-control" name="ass_celular">
			<input type="text" placeholder="Telefone" class="form-control" name="ass_telefone">
			<input type="text" placeholder="Endereço" class="form-control" name="ass_endereco">
			<div class="text-right">
			<button type="button" class="btn btn-success" id="addAss"><i class="fa fa-plus"></i> Adicionar</button>
			</div>
		</div>
		<div class="col-sm-9">
			<div style="float:left; width:100%; min-height:400px; border:solid 1px #eee;">
			<table id="assinaturas" class="table table_assinaturas" >

			</table>
			<textarea style="display:none" name="br_assinaturas" id="br_assinaturas">
			</textarea>
			</div>
		</div>
	</div>
	<div class="clear30"></div>
	Se a assinatura tiver imagem renomear o nome das imagens de acordo com o nome de cada funcionário e enviar as imagens para o e-mail suporte@webthomaz.com.br
	<div class="clear20"></div>
	<!-- <div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div> -->
	<div class="clear20"></div>
	<button class="btn btn-padrao">Enviar formulário</button>
</form>
<div id="retorno"></div>
<script type="text/javascript">
	cont = 0;
	$('#addAss').click(function(){
		cont++;
		ass_nome = $('input[name="ass_nome"]').val();
		ass_cargo = $('input[name="ass_cargo"]').val();
		ass_email = $('input[name="ass_email"]').val();
		ass_celular = $('input[name="ass_celular"]').val();
		ass_telefone = $('input[name="ass_telefone"]').val();
		ass_endereco = $('input[name="ass_endereco"]').val();
		tr_assinatura = "<tr id='ass"+cont+"'>";
		campo_ass_nome = "<td>"+ass_nome+"</td>";
		campo_ass_cargo = "<td>"+ass_cargo+"</td>";
		campo_ass_email = "<td>"+ass_email+"</td>";
		campo_ass_celular = "<td>"+ass_celular+"</td>";
		campo_ass_telefone = "<td>"+ass_telefone+"</td>";
		campo_ass_endereco = "<td>"+ass_endereco+"</td>";
		tr2_assinatura ="<td><i class='fa fa-times' onclick='removeAss("+cont+")'></i></td>";
		tr3_assinatura ="</tr>";

		assinatura = tr_assinatura+campo_ass_nome+campo_ass_cargo+ass_email+campo_ass_celular+campo_ass_telefone+campo_ass_endereco+tr2_assinatura
		$('.table_assinaturas').append(assinatura);
		$('#br_assinaturas').val('<table border="1">'+$('.table_assinaturas').html()+'</table>');
	});

	function removeAss(id){
		$('#ass'+id).remove();
	}

	$('input[name="br_modelo"]').change(function(){
		$('#opcoes label').css({'opacity':'0.1'});
		$(this).parent('label').css({'opacity':'1'});
	});

</script>