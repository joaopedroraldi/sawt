<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST); 

if($_FILES['categorias_imagem']['name'] == ""){}else{	
	uploadImagem('../uploads/','categorias_imagem');
	$_POST['categorias_imagem'] = $_FILES['categorias_imagem']['name'];
}
if($_FILES['categorias_imagem2']['name'] == ""){}else{	
	uploadImagem('../uploads/','categorias_imagem2');
	$_POST['categorias_imagem2'] = $_FILES['categorias_imagem2']['name'];
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
		$(document).ready(function(){
			swal({
				title: "Categoria cadastrada!",
				type: "success",
				confirmButtonColor: "#222222",
				confirmButtonText: "Voltar as categorias",
				showCancelButton: true,
				cancelButtonText: "Continuar",
				closeOnConfirm: false
			},function(){
				window.location='?page=categorias&id=<?php echo $categorias_idpg; ?>';
			});

			$('.form')[0].reset();
			$('.note-editable.panel-body').html('');
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