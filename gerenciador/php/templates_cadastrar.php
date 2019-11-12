<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST); 

if($_FILES['templates_imagem']['name'] == ""){}else{	
	uploadImagem('../uploads/templates/','templates_imagem');
	$_POST['templates_imagem'] = $_FILES['templates_imagem']['name'];
}

$sqlinsere = "INSERT INTO templates (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_")){
		$sqlinsere .= "$key,";
	}
}
$sqlinsere .= ") VALUES (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_")){
		$value = addslashes($value);
		$sqlinsere .= "'$value',";
	}
}
$sqlinsere .= ")";
$sqlinsere = str_replace(',)', ')', $sqlinsere);

// echo $sqlinsere;
// exit();
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){	
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Template cadastrado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=templates';
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