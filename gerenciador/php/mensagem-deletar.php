<?php 
	include('../cn/config.php');
	extract($_POST);

	$query = "UPDATE $table SET apagada = 1 WHERE Id = $mensagemId";
	mysqli_query($config, $query);
?>
