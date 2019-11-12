<?php
include("../cn/config.php");
include("verifica_login.php");
extract($_POST);
$senha = md5($senha_usuario);

$sqlinsere = "INSERT INTO usuarios (nome, email, usuario, admin, senha) VALUES('$nome_usuario', '$email_usuario', '$usuario_usuario', '$usuario_admin', '$senha')"; 
$inserir = mysqli_query($config, $sqlinsere);

if($inserir){	
	?>
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		swal({
			title: "Usuário cadastrado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		},function(){
			window.location='?page=usuarios';
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