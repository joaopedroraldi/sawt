<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);

$query = "SELECT * FROM paginas WHERE paginas_id = $registros_idpg";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);

if($row_paginas['paginas_data'] == 1){
	if($_POST['registros_data'] == ""){}else{
		$registros_data = explode('/', $registros_data);
		$_POST['registros_data'] = $registros_data[2] . "-" . $registros_data[1] . "-" . $registros_data[0];
	}
}

if($row_paginas['paginas_categoria'] == 1){
	$query = "SELECT (select c.categorias_titulo from categorias as c where r.categorias_id = c.categorias_id) as categorias_titulo, categorias_id FROM registros_categorias as r WHERE r.registros_id = $registros_id";
	$categorias = mysqli_query($config, $query) or die(mysqli_error());
	
	while($row_categorias = mysqli_fetch_assoc($categorias)){
		$sqldeleta = "DELETE FROM registros_categorias WHERE registros_id = $registros_id";
		$deleta = mysqli_query($config, $sqldeleta);
	}

	// $_POST['registros_cat'] = "";
	if(isset($multiescolha)){
		foreach ($multiescolha as $valor) {
			// $_POST['registros_cat'] .= $value . ", ";
			$sqlcat = "INSERT INTO registros_categorias (registros_id, categorias_id) VALUES ('$registros_id', '$valor')";
			$atualizacat = mysqli_query($config, $sqlcat);
		}
	}
}

if($registros_url == ""){
	$_POST['registros_url'] = removeAcentos($registros_titulo);
}

//UPLOAD DA IMAGEM
if($row_paginas['paginas_imagem'] == 1){
	if($_FILES['registros_imagem_nova']['name'] != ''){
		uploadImagem('../uploads/','registros_imagem_nova', '../uploads/');
		$_POST['registros_imagem'] = $_FILES['registros_imagem_nova']['name'];
		if(isset($registros_imagem)){
			if($registros_imagem != $_FILES['registros_imagem_nova']['name']){	
				unlink('../uploads/'.$registros_imagem);
			}
		}
	}
}

//UPLOAD DA IMAGEM
if($row_paginas['paginas_imagem2'] == 1){
	if($_FILES['registros_imagem2_nova']['name'] != ''){
		uploadImagem('../uploads/','registros_imagem2_nova', '../uploads/');
		$_POST['registros_imagem2'] = $_FILES['registros_imagem2_nova']['name'];
		if(isset($registros_imagem2)){
			if($registros_imagem2 != $_FILES['registros_imagem2_nova']['name']){	
				unlink('../uploads/'.$registros_imagem2);
			}
		}
	}
}

$sqlinsere = "UPDATE registros SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"registros_")){
		$value = addslashes($value);
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE registros_id = $registros_id";
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
		window.location="?page=registros&id=<?php echo $registros_idpg ?>";
	});
	</script>
	<?php
}
?>﻿