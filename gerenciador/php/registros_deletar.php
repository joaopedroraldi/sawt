<?php
include("../cn/config.php");
include("verifica_login.php");
include("funcoes.php");

$idreg = $_POST['idreg'];
$tabela = $_POST['tabela'];

$query = "SELECT * FROM registros WHERE registros_id = $idreg";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
$registros_imagem = $row_registros['registros_imagem'];
$registros_imagem2 = $row_registros['registros_imagem2'];
if($registros_imagem != ""){	
	unlink('../uploads/'.$registros_imagem);
	$pasta = "../uploads/fotos/".$idreg;
	if(file_exists($pasta)){
		delTree($pasta);
	}
}
if($registros_imagem2 != ""){	
	unlink('../uploads/'.$registros_imagem2);
	$pasta = "../uploads/fotos/".$idreg;
	if(file_exists($pasta)){
		delTree($pasta);
	}
}



$sqldeleta = "DELETE FROM $tabela WHERE registros_id = $idreg";
$deleta = mysqli_query($config, $sqldeleta);


if($deleta){

	$sqldeleta2 = "DELETE FROM registros_categorias WHERE registros_id = $idreg";
	$deleta2 = mysqli_query($config, $sqldeleta2);

	if($deleta2){

?>﻿
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		swal({
			title: "Registro deletado",
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
	}else{
		?>
	<script type="text/javascript">
		alert('erro');
	</script>
		<?php
	}
}
else{ ?>
<script type="text/javascript">
	alert('erro');
</script>
<?php } ?>
