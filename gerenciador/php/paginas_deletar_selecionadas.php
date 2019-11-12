<?php
include("../cn/config.php");
include("verifica_login.php");

if($admin == 0){
	exit();
}

foreach ($_POST['paginasMarcadas'] as $key => $value) {
	$sqldeleta = "DELETE FROM paginas WHERE paginas_id = $value";
	$deleta = mysqli_query($config, $sqldeleta);
}


if($deleta){
?>﻿
<script>	
$(document).ready(function(){
	$('.load').hide();
	swal({
		title: "Páginas deletadas",
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
