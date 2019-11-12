<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);

$sqlinsere = "UPDATE cores SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"cor_")){
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE cor_id = 1";
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){
	?>
	<script type="text/javascript">
	$('.load').hide();
	swal({
		title: "Cores alteradas com sucesso",
		type: "success",
		confirmButtonColor: "#222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		window.location="?page=cores";
	});
	</script>
	<?php
}
?>﻿