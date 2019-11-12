<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

$idreg = $_POST['idreg'];
$tabela = $_POST['tabela'];

$sqldeleta = "DELETE FROM $tabela WHERE templates_home_id = $idreg";
$deleta = mysqli_query($config, $sqldeleta);


if($deleta){
?>﻿
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		swal({
			title: "Template deletado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			location.reload();
		});
	});
	</script>
<?php 
}
else{ ?>
<script type="text/javascript">
	alert('erro');
</script>
<?php } ?>
