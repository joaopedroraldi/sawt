<?php 
	include('../cn/config.php');
	extract($_POST);

	$query = "UPDATE $table SET visualizada = 1 WHERE Id = $mensagemId";
	mysqli_query($config, $query);
?>
