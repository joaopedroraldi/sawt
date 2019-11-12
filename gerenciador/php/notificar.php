<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST);
$query_contrato = "SELECT * FROM registros WHERE registros_id = $idcontrato";
$contrato = mysqli_query($config, $query_contrato);
$row_contrato = mysqli_fetch_assoc($contrato);
$idplano = $row_contrato['registros_plano'];
$idcliente = $row_contrato['registros_cliente'];

$query = "SELECT registros_titulo, registros_texto FROM registros WHERE registros_id = $idplano";
$plano = mysqli_query($config, $query) or die(mysqli_error());
$row_plano = mysqli_fetch_assoc($plano);
$plano = $row_plano['registros_titulo'];

$query = "SELECT registros_titulo, registros_email FROM registros WHERE registros_id = $idcliente";
$cliente = mysqli_query($config, $query) or die(mysqli_error());
$row_cliente = mysqli_fetch_assoc($cliente);
$cliente_nome = $row_cliente['registros_titulo'];
$cliente_email = $row_cliente['registros_email'];

	$assunto = "Contrato de Prestação de serviços #$idcontrato | $plano";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

	// Additional headers
	$headers .= "To: $cliente_nome <$cliente_email>" . "\r\n";
	$headers .= "From: Web Thomaz Negócios Digitais <financeiro@webthomaz.com.br>" . "\r\n";
	$inserir = mail("$cliente_email", "$assunto", "$contrato_texto", $headers);

	
if($inserir){
	$nNotificacao = $row_contrato['registros_notificacao'] + 1;
	$query = "UPDATE registros SET registros_notificacao = $nNotificacao WHERE registros_id = '$idcontrato'";
	mysqli_query($config, $query);
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Cliente notificado!",
			type: "success",
			confirmButtonColor: "#222222"
		});
	});
	</script>
	<?php
}else{
	?>
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		swal("Erro");

	});
	</script>

	<?php
}
?>﻿
