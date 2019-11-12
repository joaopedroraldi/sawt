<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);

//UPLOAD DA IMAGEM
if($_FILES['categorias_imagem_nova']['name'] != ''){
	uploadImagem('../uploads/','categorias_imagem_nova');
	$_POST['categorias_imagem'] = $_FILES['categorias_imagem_nova']['name'];
	if($categorias_imagem != $_FILES['categorias_imagem_nova']['name']){	
		unlink('../uploads/'.$categorias_imagem);
	}
}

if($_FILES['categorias_imagem2_nova']['name'] != ''){
	uploadImagem('../uploads/','categorias_imagem2_nova');
	$_POST['categorias_imagem2'] = $_FILES['categorias_imagem2_nova']['name'];
	if($categorias_imagem2 != $_FILES['categorias_imagem2_nova']['name']){	
		unlink('../uploads/'.$categorias_imagem2);
	}
}



if($categorias_url == ""){
	$_POST['categorias_url'] = removeAcentos($categorias_titulo);
}

$sqlinsere = "UPDATE categorias SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"categorias_")){
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE categorias_id = $categorias_id";
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){
	?>
	<script type="text/javascript">
	$('.load').hide();
	swal({
		title: "Categoria alterada com sucesso",
		type: "success",
		confirmButtonColor: "#222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		window.location="?page=categorias&id=<?php echo $categorias_idpg ?>";
	});
	</script>
	<?php
}
?>﻿