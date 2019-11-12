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


if($row_paginas['paginas_imagem'] == 1){
	if($_FILES['registros_imagem']['name'] == ""){}else{	
		uploadImagem('../uploads/','registros_imagem');
		$_POST['registros_imagem'] = $_FILES['registros_imagem']['name'];
	}
}

if($row_paginas['paginas_imagem2'] == 1){
	if($_FILES['registros_imagem2']['name'] == ""){}else{	
		uploadImagem('../uploads/','registros_imagem2');
		$_POST['registros_imagem2'] = $_FILES['registros_imagem2']['name'];
	}
}


if($registros_url == ""){
	$_POST['registros_url'] = removeAcentos($registros_titulo);
}

$sqlinsere = "INSERT INTO registros (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"registros_")){
		$sqlinsere .= "$key,";
	}
}
$sqlinsere .= ") VALUES (";
foreach ($_POST as $key => $value) {
	if(strstr($key,"registros_")){
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

	if($row_paginas['paginas_categoria'] == 1){
		$query = "SELECT registros_id FROM registros ORDER BY registros_id DESC";
		$registros = mysqli_query($config, $query) or die(mysqli_error());
		$row_registros = mysqli_fetch_assoc($registros);
		$registros_id = $row_registros['registros_id'];

		if(isset($multiescolha)){
			// $_POST['registros_cat'] = "";
			foreach ($multiescolha as $key => $value) {
				// $_POST['registros_cat'] .= $value . ", ";
				$sqlinsere = "INSERT INTO registros_categorias (registros_id, categorias_id) VALUES ('$registros_id', '$value')";
				mysqli_query($config, $sqlinsere);
			}
		}
	}

	if($registros_idpg == 55){
		$query = "SELECT registros_id FROM registros WHERE registros_idpg = $registros_idpg ORDER BY registros_id DESC";
		$registro = mysqli_query($config, $query);
		$row_registro = mysqli_fetch_assoc($registro);
		$ultimo = $row_registro['registros_id'];
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Registro cadastrado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=contrato&id=<?php echo $ultimo ?>';
		});
	});
	</script>
	<?php
	}else{ ?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Registro cadastrado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=registros&id=<?php echo $registros_idpg ?>';
		});
	});
	</script>
	<?php 
	}
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