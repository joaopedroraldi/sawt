<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);

//UPLOAD DA IMAGEM
if($_FILES['configuracoes_logo_nova']['name'] != ''){
	uploadImagem('../uploads/','configuracoes_logo_nova');
	$_POST['configuracoes_logo'] = $_FILES['configuracoes_logo_nova']['name'];
	if($configuracoes_logo != $_FILES['configuracoes_logo_nova']['name']){	
		unlink('../uploads/'.$configuracoes_logo);
	}
}

//UPLOAD DA IMAGEM
if($_FILES['configuracoes_favicon_nova']['name'] != ''){
	uploadImagem('../uploads/','configuracoes_favicon_nova');
	$_POST['configuracoes_favicon'] = $_FILES['configuracoes_favicon_nova']['name'];
	if($configuracoes_favicon != $_FILES['configuracoes_favicon_nova']['name']){	
		unlink('../uploads/'.$configuracoes_favicon);
	}
}


$sqlinsere = "UPDATE configuracoes SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"configuracoes_")){
		$value = addslashes($value);
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE configuracoes_id = '1'";
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){
	?>
	<script type="text/javascript">
	$('.load').hide();
	swal({
		title: "Configurações alteradas com sucesso",
		type: "success",
		confirmButtonColor: "#222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		window.location='?page=home';
	});
	</script>
	<?php
}
?>﻿