<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";

extract($_POST); 

$sqlinsere = "UPDATE templates_home SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"templates_home_")){
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE templates_home_id = ". $templates_home_id;
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){	
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Template Atualizado",
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