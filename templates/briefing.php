<style type="text/css">
	#obrigado{display: none;}
</style>
<div class="clear40"></div>
<div id="briefing">
<div class="container">
<?php
if($_GET['c']){ 
	$query = "SELECT registros_cliente_key, registros_cliente FROM registros WHERE registros_cliente_key = '{$_GET['c']}'";
	$cliente = mysqli_query($config, $query);
	$row_cliente = mysqli_fetch_assoc($cliente);
	if(mysqli_num_rows($cliente) > 0){
?>
<?php 
	if($_GET['form']){
		switch ($_GET['form']) {
			case 'website':
				include('templates/briefing_website.php');
				break;
			case 'e-commerce':
				include('templates/briefing_ecommerce.php');
				break;
			case 'arte-grafica':
				include('templates/briefing_arte_grafica.php');
				break;
			case 'logotipo':
				include('templates/briefing_logotipo.php');
				break;
			case 'consultoria':
				include('templates/briefing_consultoria.php');
				break;
			case 'assinaturas':
				include('templates/briefing_assinaturas.php');
				break;
			
			default:
				echo "FORMULARIO WEBSITE";
				break;
		}
	}else{
 ?>
 <center>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=website&c=<?php echo $_GET['c'] ?>">WebSite</a>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=e-commerce&c=<?php echo $_GET['c'] ?>">E-commerce</a>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=arte-grafica&c=<?php echo $_GET['c'] ?>">Arte Gráfica</a>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=logotipo&c=<?php echo $_GET['c'] ?>">Logotipo</a>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=consultoria&c=<?php echo $_GET['c'] ?>">Consultoria</a>
		<a class="btn btn-default" href="<?php echo RAIZ ?>briefing?form=assinaturas&c=<?php echo $_GET['c'] ?>">Assinaturas</a>
 </center>
<?php	
}
}else{
	echo "Solicite um formulário de briefing após ter o contrato de prestação de serviço definido.";
}
}else{
	echo "Solicite um formulário de briefing após ter o contrato de prestação de serviço definido.";
}
?>
</div>
</div>
<div class="container text-center" id="obrigado">
	<div class="clear60"></div>
	<h1>Recebemos as suas informações</h1>
	<h3>Agora é só aguardar...</h3>
	<div class="clear60"></div>
</div>