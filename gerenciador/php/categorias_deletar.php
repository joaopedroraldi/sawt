<?php
include("../cn/config.php");
include("verifica_login.php");

$idreg = $_POST['idreg'];
$tabela = $_POST['tabela'];

$query = "SELECT * FROM categorias WHERE categorias_id = $idreg";
$categorias = mysqli_query($config, $query) or die(mysqli_error());
$row_categorias = mysqli_fetch_assoc($categorias);
$categorias_imagem = $row_categorias['categorias_imagem'];
if($categorias_imagem != ""){	
	unlink('../uploads/'.$categorias_imagem);
}
$categorias_imagem2 = $row_categorias['categorias_imagem2'];
if($categorias_imagem2 != ""){	
	unlink('../uploads/'.$categorias_imagem2);
}


$sqldeleta = "DELETE FROM $tabela WHERE categorias_id = $idreg";
$deleta = mysqli_query($config, $sqldeleta);


if($deleta){

?>﻿
<script>	
$(document).ready(function(){
	$('.load').hide();
	swal({
		title: "Categoria deletada",
		type: "success",
		confirmButtonColor: "#222222",
		confirmButtonText: "Ok",
		closeOnConfirm: false
	},function(){
		location.reload();
	});
});
</script>
<?php }else{ ?>
<script type="text/javascript">
	alert('erro');
</script>
<?php } ?>
