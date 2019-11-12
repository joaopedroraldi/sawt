<?php
include("../cn/config.php");
include("verifica_login.php");
foreach ($_POST as $key => $value) {
	mysqli_query($config, "UPDATE paginas SET paginas_ordem_menu = '$value' WHERE paginas_id = $key");
}
?>
