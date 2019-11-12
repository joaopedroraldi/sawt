<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST); 

$sqlinsere = "INSERT INTO templates_home (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_home_")){
		$sqlinsere .= "$key,";
	}
}
$sqlinsere .= ") VALUES (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_home_")){
		$sqlinsere .= "'$value',";
	}
}
$sqlinsere .= ")";
$sqlinsere = str_replace(',)', ')', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){	
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Home atualizada",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=templates_home';
		});
	});
	</script>
	<?php
}else{
	?>
	<script>	
	$(document).ready(function(){

		swal("Erro");

	});
	</script>

	<?php
}
?>﻿