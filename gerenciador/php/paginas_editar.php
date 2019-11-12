<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

extract($_POST); 

$sqlinsere = "UPDATE paginas SET ";
foreach ($_POST as $key => $value) {
	if(strstr($key,"paginas_")){
		$sqlinsere .= "$key = '$value', ";
	}
}

$sqlinsere .= "WHERE paginas_id = ". $paginas_id;
$sqlinsere = str_replace(', WHERE', ' WHERE', $sqlinsere);
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){	
	?>
	<script>	
	$('.load').hide();
	$(document).ready(function(){
		swal({
			title: "Página editada",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=paginas';
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