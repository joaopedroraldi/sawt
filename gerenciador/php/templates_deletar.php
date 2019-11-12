<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

$idreg = $_POST['idreg'];
$tabela = $_POST['tabela'];

$query = "SELECT * FROM templates WHERE templates_id = $idreg";
$templates = mysqli_query($config, $query) or die(mysqli_error());
$row_templates = mysqli_fetch_assoc($templates);
$templates_imagem = $row_templates['templates_imagem'];
if($templates_imagem != ""){	
	unlink('../uploads/templates/'.$templates_imagem);
}


$sqldeleta = "DELETE FROM $tabela WHERE templates_id = $idreg";
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
