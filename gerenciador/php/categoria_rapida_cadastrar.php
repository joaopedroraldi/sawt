<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST); 

if($_FILES['categorias_imagem']['name'] == ""){}else{	
	uploadImagem('categorias_imagem');
	$_POST['categorias_imagem'] = time()."_".$_FILES['categorias_imagem']['name'];
}

if($categorias_url == ""){
	$_POST['categorias_url'] = removeAcentos($categorias_titulo);
}

$sqlinsere = "INSERT INTO categorias (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"categorias_")){
		$sqlinsere .= "$key,";
	}
}
$sqlinsere .= ") VALUES (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"categorias_")){
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
		swal("Categoria cadastrada!");
		$('.form')[1].reset();
		$('.note-editable.panel-body').html('');
		$('.modal').modal('hide');
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