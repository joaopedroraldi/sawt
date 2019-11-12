<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");
extract($_POST);

$sqlinsere = "UPDATE templates SET templates_footer_ok = 0";
$inserir = mysqli_query($config, $sqlinsere);

$sqlinsere = "UPDATE templates SET templates_footer_ok = 1 WHERE templates_id = $templates_footer";
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){
	?>
	<script type="text/javascript">
	$('.load').hide();
	swal({
		title: "Footer alterado com sucesso",
		type: "success",
		confirmButtonColor: "#222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		window.location="?page=templates_home";
	});
	</script>
	<?php
}
?>﻿