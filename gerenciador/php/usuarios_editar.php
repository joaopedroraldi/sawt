<?php
include("../cn/config.php");
include("verifica_login.php");

extract($_POST); 
$id = $_POST['id_usuario'];
if($senha_usuario == ""){
$sqedita = "UPDATE usuarios SET nome = '$nome_usuario', email = '$email_usuario', usuario = '$usuario_usuario', admin = '$usuario_admin' WHERE id_usuario = '$id'"; 
}else{
$senha = md5($senha_usuario);
$sqedita = "UPDATE usuarios SET nome = '$nome_usuario', email = '$email_usuario', usuario = '$usuario_usuario', admin = '$usuario_admin', senha = '$senha' WHERE id_usuario = '$id'"; 
}
$editar = mysqli_query($config, $sqedita);
if($editar){	
	?>
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		swal({
			title: "Usuário editado",
			type: "success",
			confirmButtonColor: "#222222",
			confirmButtonText: "Ok",
			<?php if($admin > 0){ ?>
			closeOnConfirm: false
			<?php }else{ ?>
			closeOnConfirm: true
			<?php } ?>
		},function(){
			<?php if($admin > 0){ ?>
			window.location='?page=usuarios';
			<?php } ?>
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