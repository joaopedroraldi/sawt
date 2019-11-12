<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);


//UPLOAD DA IMAGEM

if($_FILES['templates_imagem_nova']['name'] != ''){
	uploadImagem('../uploads/templates/','templates_imagem_nova');
	$_POST['templates_imagem'] = $_FILES['templates_imagem_nova']['name'];
	if(isset($templates_imagem)){
		unlink('../uploads/templates/'.$templates_imagem);
	}
}


$sqlinsere = "UPDATE templates SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_")){
		$value = addslashes($value);
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE templates_id = $templates_id";
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){
	?>
	<script type="text/javascript">
	$('.load').hide();
	swal({
		title: "Registro alterado com sucesso",
		type: "success",
		confirmButtonColor: "#222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		window.location="?page=templates";
	});
	</script>
	<?php
}
?>﻿