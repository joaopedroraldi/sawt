<?php 
	include('../cn/config.php');
	extract($_POST);

	$query = "UPDATE $table SET visualizada = 0 WHERE Id = $mensagemId";
	mysqli_query($config, $query);
?>
